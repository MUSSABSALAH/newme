<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Walim;

use App\Modules\Addresses\DTOs\AddressSnapshot;
use App\Modules\Delivery\Distance\DeliveryDistance;
use App\Modules\Delivery\DTOs\SubscriptionStop;
use App\Modules\Orders\Models\Order;
use App\Modules\Payments\Enums\PaymentStatus;
use App\Modules\Settings\Services\SettingsService;
use App\Support\Money\Money;
use Illuminate\Support\Carbon;

/**
 * Turns an order or a subscription day into the fields Walim expects.
 *
 * Every task is pickup-and-delivery: the courier collects from the New Me
 * branch and hands over at the customer's address. Times are sent in the
 * store's local time along with its UTC offset, as Walim requires.
 */
final class WalimTaskFactory
{
    private const DATETIME = 'Y-m-d H:i:s';

    public function __construct(
        private readonly SettingsService $settings,
        private readonly DeliveryDistance $distance,
    ) {}

    /**
     * Cash the courier collects on hand-over, in minor units; 0 when paid.
     */
    public static function collectMinor(Order $order): int
    {
        return $order->payment_method?->isDeferred() && $order->payment_status === PaymentStatus::Pending
            ? (int) $order->total_minor
            : 0;
    }

    /**
     * @throws WalimException
     */
    public function orderParcel(Order $order, string $reference): WalimParcel
    {
        $order->loadMissing('user')->loadCount('items');
        $address = $this->requireAddress($order->deliveryAddress());
        $pickupAt = $this->now()->addMinutes($this->pickupLead());
        $collect = self::collectMinor($order);

        $description = (string) __('deliveries.walim.task.order', [
            'reference' => $order->reference(),
            'items' => $order->items_count,
        ], 'ar');
        $description .= ' · '.($collect > 0
            ? __('deliveries.walim.task.collect', ['amount' => Money::fromMinor($collect)->format()], 'ar')
            : __('deliveries.walim.task.paid', [], 'ar'));

        if (is_string($order->note) && trim($order->note) !== '') {
            $description .= ' · '.trim($order->note);
        }

        return new WalimParcel(
            reference: $reference,
            description: $description,
            recipientName: $order->user?->name ?? $address->recipientName,
            phone: self::phone($address->phone !== '' ? $address->phone : (string) $order->user?->phone),
            email: $order->user?->email,
            address: $this->addressLine($address),
            lat: $address->lat,
            lng: $address->lng,
            pickupAt: $pickupAt,
            deliverBy: $pickupAt->copy()->addMinutes($this->deliveryWindow()),
        );
    }

    /**
     * @throws WalimException
     */
    public function stopParcel(SubscriptionStop $stop, string $reference): WalimParcel
    {
        $address = $this->requireAddress($stop->address());
        $pickupAt = $this->stopPickupAt($stop->date);

        $description = (string) __('deliveries.walim.task.subscription', [
            'reference' => $stop->subscription->reference(),
            'date' => $stop->date->toDateString(),
        ], 'ar');

        if ($stop->mealLines() !== []) {
            $description .= ' · '.implode('، ', $stop->mealLines());
        }

        return new WalimParcel(
            reference: $reference,
            description: $description,
            recipientName: $stop->customerName(),
            phone: self::phone((string) $stop->phone()),
            email: $stop->subscription->user?->email,
            address: $this->addressLine($address),
            lat: $address->lat,
            lng: $address->lng,
            pickupAt: $pickupAt,
            deliverBy: $pickupAt->copy()->addMinutes($this->deliveryWindow()),
        );
    }

    /**
     * Body for create_task (single pickup-and-delivery task).
     *
     * @return array<string, mixed>
     */
    public function task(WalimParcel $parcel): array
    {
        $pickup = $this->pickup();

        return array_filter([
            'order_id' => $parcel->reference,
            'barcode' => $parcel->reference,
            'team_id' => $this->teamId(),
            'auto_assignment' => $this->autoAssignment(),
            'job_description' => $parcel->description,
            'job_pickup_name' => $pickup['name'],
            'job_pickup_phone' => $pickup['phone'],
            'job_pickup_address' => $pickup['address'],
            'job_pickup_latitude' => $pickup['latitude'],
            'job_pickup_longitude' => $pickup['longitude'],
            'job_pickup_datetime' => $parcel->pickupAt->format(self::DATETIME),
            'customer_username' => $parcel->recipientName,
            'customer_phone' => $parcel->phone,
            'customer_email' => $parcel->email,
            'customer_address' => $parcel->address,
            'latitude' => self::coordinate($parcel->lat),
            'longitude' => self::coordinate($parcel->lng),
            'job_delivery_datetime' => $parcel->deliverBy->format(self::DATETIME),
            'timezone' => $this->timezoneOffset(),
            'has_pickup' => '1',
            'has_delivery' => '1',
            'layout_type' => '0',
            'tracking_link' => 1,
            'notify' => 1,
            'geofence' => 0,
            'ignore_customer_lat_long' => $parcel->lat !== null ? 1 : null,
        ], static fn (mixed $value): bool => $value !== null && $value !== '');
    }

    /**
     * Body for create_multiple_tasks: one pickup and one delivery per parcel,
     * paired by position and by order_id.
     *
     * @param  list<WalimParcel>  $parcels
     * @return array<string, mixed>
     */
    public function batch(array $parcels): array
    {
        $pickup = $this->pickup();
        $pickups = [];
        $deliveries = [];

        foreach ($parcels as $parcel) {
            $pickups[] = array_filter([
                'order_id' => $parcel->reference,
                'name' => $pickup['name'],
                'phone' => $pickup['phone'],
                'address' => $pickup['address'],
                'latitude' => $pickup['latitude'],
                'longitude' => $pickup['longitude'],
                'time' => $parcel->pickupAt->format(self::DATETIME),
                'job_description' => $parcel->description,
            ], static fn (mixed $value): bool => $value !== null && $value !== '');

            $deliveries[] = array_filter([
                'order_id' => $parcel->reference,
                'name' => $parcel->recipientName,
                'phone' => $parcel->phone,
                'email' => $parcel->email,
                'address' => $parcel->address,
                'latitude' => self::coordinate($parcel->lat),
                'longitude' => self::coordinate($parcel->lng),
                'time' => $parcel->deliverBy->format(self::DATETIME),
                'job_description' => $parcel->description,
            ], static fn (mixed $value): bool => $value !== null && $value !== '');
        }

        return array_filter([
            'team_id' => $this->teamId(),
            'auto_assignment' => (int) $this->autoAssignment(),
            'timezone' => $this->timezoneOffset(),
            'has_pickup' => 1,
            'has_delivery' => 1,
            'layout_type' => 0,
            'geofence' => 0,
            'pickups' => $pickups,
            'deliveries' => $deliveries,
        ], static fn (mixed $value): bool => $value !== null && $value !== '');
    }

    /**
     * Saudi numbers in international form; anything else is sent as typed.
     */
    public static function phone(string $phone): string
    {
        $digits = preg_replace('/\D+/', '', $phone) ?? '';

        return match (true) {
            $digits === '' => '',
            str_starts_with($digits, '9665') && strlen($digits) === 12 => '+'.$digits,
            str_starts_with($digits, '05') && strlen($digits) === 10 => '+966'.substr($digits, 1),
            str_starts_with($digits, '5') && strlen($digits) === 9 => '+966'.$digits,
            default => trim($phone),
        };
    }

    /**
     * Minutes to add to local time to reach UTC, e.g. -180 for Riyadh.
     */
    public function timezoneOffset(): int
    {
        return -$this->now()->utcOffset();
    }

    private function stopPickupAt(Carbon $date): Carbon
    {
        $time = (string) ($this->settings->get('walim.subscription_pickup_time') ?: '07:00');
        $planned = Carbon::parse($date->toDateString().' '.$time, $this->timezone());
        $earliest = $this->now()->addMinutes($this->pickupLead());

        return $planned->greaterThan($earliest) ? $planned : $earliest;
    }

    /**
     * @return array{name: string, phone: string, address: string, latitude: string|null, longitude: string|null}
     */
    private function pickup(): array
    {
        $origin = $this->distance->origin();
        $address = trim((string) $this->settings->get('walim.pickup_address'));

        return [
            'name' => trim((string) $this->settings->get('walim.pickup_name')) ?: (string) $this->settings->get('company.name_ar'),
            'phone' => self::phone((string) ($this->settings->get('walim.pickup_phone') ?: $this->settings->get('company.phone'))),
            'address' => $address !== '' ? $address : trim((string) $this->settings->get('company.address_ar')),
            'latitude' => self::coordinate($origin?->lat),
            'longitude' => self::coordinate($origin?->lng),
        ];
    }

    /**
     * @throws WalimException
     */
    private function requireAddress(?AddressSnapshot $address): AddressSnapshot
    {
        if (! $address instanceof AddressSnapshot) {
            throw new WalimException((string) __('deliveries.walim.errors.no_address'));
        }

        return $address;
    }

    private function addressLine(AddressSnapshot $address): string
    {
        return implode(' · ', array_filter([$address->oneLine(), $address->details ?? '']));
    }

    private static function coordinate(?float $value): ?string
    {
        return $value === null ? null : sprintf('%.7F', $value);
    }

    private function teamId(): ?string
    {
        $team = trim((string) $this->settings->get('walim.team_id'));

        return $team === '' ? null : $team;
    }

    private function autoAssignment(): string
    {
        return $this->settings->get('walim.auto_assignment') ? '1' : '0';
    }

    private function pickupLead(): int
    {
        return max(0, (int) $this->settings->get('walim.pickup_lead_minutes'));
    }

    private function deliveryWindow(): int
    {
        return max(15, (int) $this->settings->get('walim.delivery_window_minutes'));
    }

    private function now(): Carbon
    {
        return Carbon::now($this->timezone());
    }

    private function timezone(): string
    {
        $zone = (string) $this->settings->get('localization.timezone');

        return $zone !== '' ? $zone : 'Asia/Riyadh';
    }
}
