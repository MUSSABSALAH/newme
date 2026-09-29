<?php

declare(strict_types=1);

namespace App\Modules\Checkout\Services;

use App\Modules\Addresses\Models\Address;
use App\Modules\Checkout\DTOs\DeliveryFeeProfile;
use App\Modules\Checkout\DTOs\DeliveryQuote;
use App\Modules\Checkout\Enums\FulfillmentMethod;
use App\Modules\Cms\Services\PageContentService;
use App\Modules\Delivery\Distance\DeliveryDistance;
use App\Modules\Delivery\Distance\DistanceResult;
use App\Modules\Delivery\Enums\DeliveryProvider;
use App\Modules\Settings\Services\SettingsService;
use App\Support\Money\Money;
use Illuminate\Support\Facades\Log;

/**
 * The store delivery charge, from the fee settings of whoever delivers.
 *
 * Pickup is always free, and so is delivery once the goods total (after
 * discount) reaches the free-delivery threshold. Otherwise the fee is the
 * fixed amount, or in distance mode it is priced on the kitchen-to-address
 * distance.
 */
final class StoreDeliveryFee
{
    public function __construct(
        private readonly SettingsService $settings,
        private readonly PageContentService $cms,
        private readonly DeliveryDistance $distances,
    ) {}

    public function quote(FulfillmentMethod $method, int $goodsMinor, ?Address $address = null): int
    {
        return $this->quoteFor($method, $goodsMinor, $address)->feeMinor;
    }

    public function quoteFor(FulfillmentMethod $method, int $goodsMinor, ?Address $address = null): DeliveryQuote
    {
        if ($method === FulfillmentMethod::Pickup) {
            return new DeliveryQuote(0);
        }

        $profile = $this->profile();

        if ($profile->isFreeFor($goodsMinor)) {
            return new DeliveryQuote(0);
        }

        if (! $profile->usesDistance()) {
            return new DeliveryQuote($profile->fixedMinor);
        }

        $distance = $address instanceof Address ? $this->distances->forAddress($address) : null;

        if (! $distance instanceof DistanceResult) {
            if ($address instanceof Address && $address->hasPin()) {
                Log::warning('Delivery distance: kitchen location is not set; charging the included price.');
            }

            return new DeliveryQuote($profile->includedPriceMinor);
        }

        return new DeliveryQuote($profile->distanceFeeMinor($distance->meters()), $distance);
    }

    public function provider(): DeliveryProvider
    {
        return DeliveryProvider::tryFrom((string) $this->settings->get('shipping.store_provider'))
            ?? DeliveryProvider::Internal;
    }

    public function profile(): DeliveryFeeProfile
    {
        $prefix = $this->provider()->feeSettingsPrefix();

        return new DeliveryFeeProfile(
            mode: $this->settings->get($prefix.'.fee_mode') === DeliveryFeeProfile::MODE_DISTANCE
                ? DeliveryFeeProfile::MODE_DISTANCE
                : DeliveryFeeProfile::MODE_FIXED,
            freeAboveMinor: $this->minor($prefix.'.free_above'),
            fixedMinor: $this->minor($prefix.'.fixed_amount'),
            includedMeters: $this->meters($prefix.'.included_km'),
            includedPriceMinor: $this->minor($prefix.'.included_price'),
            perKmMinor: $this->minor($prefix.'.price_per_km'),
        );
    }

    /**
     * Distance pricing cannot quote an address that was never pinned.
     */
    public function needsPin(?Address $address): bool
    {
        return $address instanceof Address
            && ! $address->hasPin()
            && $this->profile()->usesDistance();
    }

    /**
     * Measure a freshly saved address now so checkout reads it from cache.
     */
    public function warm(Address $address): void
    {
        if ($address->hasPin() && $this->profile()->usesDistance()) {
            $this->distances->forAddress($address);
        }
    }

    public function thresholdMinor(): int
    {
        return $this->profile()->freeAboveMinor;
    }

    public function branchAddress(): string
    {
        $fromFooter = $this->cms->text('footer', 'address');

        if ($fromFooter !== '') {
            return $fromFooter;
        }

        $locale = app()->getLocale() === 'en' ? 'en' : 'ar';
        $preferred = $this->settings->get('company.address_'.$locale);

        if (is_string($preferred) && trim($preferred) !== '') {
            return trim($preferred);
        }

        $fallback = $this->settings->get('company.address_'.($locale === 'en' ? 'ar' : 'en'));

        return is_string($fallback) ? trim($fallback) : '';
    }

    private function minor(string $key): int
    {
        $raw = $this->settings->get($key);

        if (! is_string($raw) || trim($raw) === '') {
            return 0;
        }

        try {
            return Money::fromMajor($raw)->toMinor();
        } catch (\InvalidArgumentException) {
            return 0;
        }
    }

    private function meters(string $key): int
    {
        $raw = $this->settings->get($key);

        return is_numeric($raw) ? max(0, (int) round((float) $raw * 1000)) : 0;
    }
}
