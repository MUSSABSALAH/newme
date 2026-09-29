<?php

declare(strict_types=1);

namespace App\Modules\Delivery\Walim;

use Illuminate\Support\Carbon;

/**
 * One pickup-and-delivery run, independent of the Walim request shape it is
 * sent in (a single task or one entry of a batch).
 */
final readonly class WalimParcel
{
    public function __construct(
        public string $reference,
        public string $description,
        public string $recipientName,
        public string $phone,
        public ?string $email,
        public string $address,
        public ?float $lat,
        public ?float $lng,
        public Carbon $pickupAt,
        public Carbon $deliverBy,
    ) {}
}
