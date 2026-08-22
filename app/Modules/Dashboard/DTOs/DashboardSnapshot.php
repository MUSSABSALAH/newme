<?php

declare(strict_types=1);

namespace App\Modules\Dashboard\DTOs;

use App\Modules\Dashboard\Enums\DashboardPanel;

/**
 * Everything the admin home screen needs, in one trip.
 *
 * Only the panels the signed-in member is allowed to see are populated; the
 * rest stay null so no query runs and nothing leaks into the markup.
 */
final class DashboardSnapshot
{
    /**
     * @param  list<DashboardPanel>  $panels
     */
    public function __construct(
        public readonly array $panels,
        public readonly ?DeliveriesPanelData $deliveries = null,
        public readonly ?FinancePanelData $finance = null,
        public readonly ?OrdersPanelData $orders = null,
        public readonly ?SubscriptionsPanelData $subscriptions = null,
        public readonly ?ConsultationsPanelData $consultations = null,
        public readonly ?CatalogPanelData $catalog = null,
        public readonly ?CustomersPanelData $customers = null,
        public readonly ?ContentPanelData $content = null,
    ) {}

    public function has(DashboardPanel $panel): bool
    {
        return in_array($panel, $this->panels, true);
    }

    public function isEmpty(): bool
    {
        return $this->panels === [];
    }
}
