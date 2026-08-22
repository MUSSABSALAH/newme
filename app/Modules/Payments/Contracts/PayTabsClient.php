<?php

declare(strict_types=1);

namespace App\Modules\Payments\Contracts;

use App\Modules\Payments\DTOs\ChargeRequest;
use App\Modules\Payments\DTOs\ChargeResult;
use App\Modules\Payments\DTOs\PaymentCallback;

/**
 * Thin wrap around the official PayTabs Laravel SDK so the gateway stays testable.
 */
interface PayTabsClient
{
    public function createHostedPage(ChargeRequest $request): ChargeResult;

    public function parseBrowserReturn(): PaymentCallback;
}
