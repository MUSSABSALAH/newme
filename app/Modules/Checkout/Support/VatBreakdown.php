<?php

declare(strict_types=1);

namespace App\Modules\Checkout\Support;

use App\Modules\Settings\Services\SettingsService;
use App\Support\Money\Money;
use App\Support\Money\Rounding;

/**
 * VAT split for a store charge, presented the way the tax invoice is.
 *
 * The customer pays the shelf goods (plus VAT on those goods when prices are
 * exclusive) and the quoted delivery fee. The invoice then extracts VAT from
 * that paid total so line amounts are exclusive: net goods, net delivery,
 * taxable, VAT, grand total.
 */
final readonly class VatBreakdown
{
    public function __construct(
        public int $exclusiveGoodsMinor,
        public int $exclusiveFeeMinor,
        public int $exclusiveMinor,
        public int $taxMinor,
        public int $grossMinor,
        public string $rateLabel,
        public bool $pricesIncludeTax,
        public int $taxRateBps,
    ) {}

    public static function forCharge(int $goodsMinor, int $feeMinor, SettingsService $settings): self
    {
        $goods = max(0, $goodsMinor);
        $fee = max(0, $feeMinor);
        [$bps, $include, $label] = self::rateFrom($settings);

        if ($bps <= 0) {
            return self::split($goods + $fee, $fee, 0, $label, $include, 0);
        }

        if ($include) {
            return self::fromPaidTotal($goods + $fee, $fee, $settings);
        }

        $goodsTax = Money::fromMinor($goods)->percentage($bps)->toMinor();

        return self::fromPaidTotal($goods + $goodsTax + $fee, $fee, $settings);
    }

    /**
     * Reconstruct the invoice split from the amount the customer actually paid.
     */
    public static function fromPaidTotal(int $grossMinor, int $feeMinor, SettingsService $settings): self
    {
        [$bps, $include, $label] = self::rateFrom($settings);

        return self::split(max(0, $grossMinor), max(0, $feeMinor), $bps, $label, $include, $bps);
    }

    private static function split(
        int $gross,
        int $fee,
        int $bps,
        string $label,
        bool $include,
        int $taxRateBps,
    ): self {
        if ($bps <= 0) {
            $exclusiveFee = min($fee, $gross);
            $exclusiveGoods = max(0, $gross - $exclusiveFee);

            return new self(
                exclusiveGoodsMinor: $exclusiveGoods,
                exclusiveFeeMinor: $exclusiveFee,
                exclusiveMinor: $gross,
                taxMinor: 0,
                grossMinor: $gross,
                rateLabel: $label,
                pricesIncludeTax: $include,
                taxRateBps: $taxRateBps,
            );
        }

        $tax = Rounding::divide($gross * $bps, 10000 + $bps);
        $net = $gross - $tax;
        $exclusiveFee = $fee === 0 ? 0 : Rounding::divide($fee * 10000, 10000 + $bps);
        $exclusiveFee = min($exclusiveFee, $net);
        $exclusiveGoods = max(0, $net - $exclusiveFee);

        return new self(
            exclusiveGoodsMinor: $exclusiveGoods,
            exclusiveFeeMinor: $exclusiveFee,
            exclusiveMinor: $net,
            taxMinor: $tax,
            grossMinor: $gross,
            rateLabel: $label,
            pricesIncludeTax: $include,
            taxRateBps: $taxRateBps,
        );
    }

    /**
     * @return array{0: int, 1: bool, 2: string}
     */
    private static function rateFrom(SettingsService $settings): array
    {
        $rate = $settings->get('finance.tax_rate');
        $rate = is_numeric($rate) ? (float) $rate : 0.0;
        $bps = (int) round($rate * 100);
        $include = (bool) $settings->get('finance.prices_include_tax');

        return [$bps, $include, self::rateLabel($rate)];
    }

    /**
     * @param  list<int>  $weights
     * @return list<int>
     */
    public function allocateGoods(array $weights): array
    {
        $count = count($weights);
        $target = $this->exclusiveGoodsMinor;

        if ($count === 0) {
            return [];
        }

        $totalWeight = array_sum($weights);

        if ($totalWeight <= 0) {
            $weights = array_fill(0, $count, 1);
            $totalWeight = $count;
        }

        $amounts = [];
        $running = 0;

        foreach ($weights as $weight) {
            $amount = Rounding::divide($target * $weight, $totalWeight);
            $amounts[] = $amount;
            $running += $amount;
        }

        $drift = $target - $running;

        if ($drift !== 0) {
            $heaviest = (int) array_search(max($weights), $weights, true);
            $amounts[$heaviest] += $drift;
        }

        return $amounts;
    }

    private static function rateLabel(float $rate): string
    {
        $label = rtrim(rtrim(number_format($rate, 2, '.', ''), '0'), '.');

        return $label === '' ? '0' : $label;
    }
}
