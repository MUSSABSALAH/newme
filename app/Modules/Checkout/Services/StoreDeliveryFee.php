<?php

declare(strict_types=1);

namespace App\Modules\Checkout\Services;

use App\Modules\Checkout\Enums\FulfillmentMethod;
use App\Modules\Cms\Services\PageContentService;
use App\Modules\Settings\Services\SettingsService;
use App\Support\Money\Money;

/**
 * The store delivery charge, from settings.
 *
 * Pickup is always free. Delivery uses the fixed amount unless the goods
 * total (after discount) has reached the free-delivery threshold.
 */
final class StoreDeliveryFee
{
    public function __construct(
        private readonly SettingsService $settings,
        private readonly PageContentService $cms,
    ) {}

    public function quote(FulfillmentMethod $method, int $goodsMinor): int
    {
        if ($method === FulfillmentMethod::Pickup) {
            return 0;
        }

        $threshold = $this->minor('delivery.free_above');

        if ($threshold > 0 && $goodsMinor >= $threshold) {
            return 0;
        }

        return $this->minor('delivery.fixed_amount');
    }

    public function thresholdMinor(): int
    {
        return $this->minor('delivery.free_above');
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
}
