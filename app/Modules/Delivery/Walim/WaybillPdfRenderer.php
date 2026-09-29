<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Walim;

use App\Modules\Delivery\Models\Shipment;
use App\Modules\Delivery\Models\SubscriptionDelivery;
use App\Modules\Delivery\Support\ScheduledDay;
use App\Modules\Orders\Models\Order;
use App\Modules\Settings\Services\SettingsService;
use App\Support\Money\Money;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Mpdf\Config\ConfigVariables;
use Mpdf\Config\FontVariables;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

/**
 * Prints courier labels (100 × 150 mm), one page per shipment.
 *
 * The barcode carries the same reference sent to Walim as order_id and
 * barcode, so scanning a parcel finds its task on either side.
 */
final class WaybillPdfRenderer
{
    public function __construct(private readonly SettingsService $settings) {}

    /**
     * @param  iterable<Shipment>  $shipments
     */
    public function render(iterable $shipments): string
    {
        $labels = [];

        foreach ($shipments as $shipment) {
            $label = $this->label($shipment);

            if ($label !== null) {
                $labels[] = $label;
            }
        }

        $html = View::make('admin.deliveries.waybill-pdf', [
            'labels' => $labels,
            'sender' => [
                'name' => trim((string) $this->settings->get('walim.pickup_name')) ?: (string) $this->settings->get('company.name_ar'),
                'phone' => (string) ($this->settings->get('walim.pickup_phone') ?: $this->settings->get('company.phone')),
            ],
        ])->render();

        $pdf = $this->createPdf();
        $pdf->SetTitle((string) __('deliveries.waybill.title'));
        $pdf->SetCreator((string) config('app.name'));
        $pdf->WriteHTML($html);

        return (string) $pdf->Output('', Destination::STRING_RETURN);
    }

    /**
     * @return array<string, mixed>|null
     */
    private function label(Shipment $shipment): ?array
    {
        $shippable = $shipment->shippable;

        if ($shippable instanceof Order) {
            $shippable->loadMissing('user')->loadCount('items');
            $address = $shippable->deliveryAddress();
            $collect = WalimTaskFactory::collectMinor($shippable);

            return [
                'barcode' => $shipment->reference,
                'reference' => $shippable->reference(),
                'kind' => (string) __('deliveries.waybill.store_order'),
                'job_id' => $shipment->jobId(),
                'date' => ($shipment->sent_at ?? $shippable->placed_at)?->format('Y-m-d'),
                'name' => $shippable->user?->name ?? $address?->recipientName ?? '—',
                'phone' => $address?->phone ?: ($shippable->user?->phone ?? ''),
                'address' => $address?->oneLine() ?? '',
                'details' => $address?->details,
                'contents' => trans_choice('deliveries.fields.item_count', $shippable->items_count),
                'collect' => $collect > 0 ? Money::fromMinor($collect)->format() : null,
                'note' => $shippable->note,
                'tracking' => $shipment->tracking_link,
            ];
        }

        if ($shippable instanceof SubscriptionDelivery && $shippable->subscription !== null) {
            $subscription = $shippable->subscription->loadMissing('user');
            $address = $subscription->deliveryAddress();
            $meals = ScheduledDay::mealsFor($subscription, $shippable->delivery_date->toDateString()) ?? [];

            return [
                'barcode' => $shipment->reference,
                'reference' => $subscription->reference(),
                'kind' => (string) __('deliveries.waybill.subscription'),
                'job_id' => $shipment->jobId(),
                'date' => $shippable->delivery_date->format('Y-m-d'),
                'name' => $subscription->user?->name ?? $address?->recipientName ?? '—',
                'phone' => $address?->phone ?: ($subscription->user?->phone ?? ''),
                'address' => $address?->oneLine() ?? '',
                'details' => $address?->details,
                'contents' => implode('، ', array_map(
                    static fn (array $meal): string => $meal['label'].': '.$meal['dish'],
                    $meals,
                )),
                'collect' => null,
                'note' => null,
                'tracking' => $shipment->tracking_link,
            ];
        }

        return null;
    }

    private function createPdf(): Mpdf
    {
        $fontDirs = (new ConfigVariables)->getDefaults()['fontDir'];
        $fontData = (new FontVariables)->getDefaults()['fontdata'];

        return new Mpdf([
            'mode' => 'utf-8',
            'format' => [100, 150],
            'tempDir' => $this->tempDir(),
            'fontDir' => array_merge($fontDirs, [resource_path('fonts/cairo')]),
            'fontdata' => $fontData + [
                'cairo' => [
                    'R' => 'Cairo-Regular.ttf',
                    'B' => 'Cairo-Bold.ttf',
                    'useOTL' => 0xFF,
                    'useKashida' => 75,
                ],
            ],
            'default_font' => 'cairo',
            'default_font_size' => 9,
            'margin_top' => 5,
            'margin_bottom' => 5,
            'margin_left' => 5,
            'margin_right' => 5,
            'directionality' => app()->getLocale() === 'en' ? 'ltr' : 'rtl',
            'autoScriptToLang' => true,
            'autoLangToFont' => false,
        ]);
    }

    private function tempDir(): string
    {
        $path = storage_path('app/mpdf');

        if (! File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true);
        }

        return $path;
    }
}
