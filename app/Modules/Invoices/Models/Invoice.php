<?php

declare(strict_types=1);

namespace App\Modules\Invoices\Models;

use App\Models\User;
use App\Modules\Invoices\DTOs\InvoiceLine;
use App\Modules\Invoices\DTOs\InvoiceParty;
use App\Modules\Orders\Models\Order;
use App\Modules\Payments\Models\Payment;
use App\Modules\Subscriptions\Models\Subscription;
use App\Support\Money\Money;
use Database\Factories\InvoiceFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Str;

/**
 * A tax invoice issued once a payment has been confirmed.
 *
 * Everything needed to reprint the document lives on the row itself, so a
 * reissued PDF is byte-for-byte the same however much the catalogue, the
 * customer record, or the company settings move on afterwards.
 *
 * @property int $id
 * @property string $public_id
 * @property string $number
 * @property int|null $user_id
 * @property string $invoiceable_type
 * @property int $invoiceable_id
 * @property int|null $payment_id
 * @property \Illuminate\Support\Carbon $issued_at
 * @property string $currency
 * @property int $tax_rate_bps
 * @property int $lines_total_minor
 * @property int $discount_minor
 * @property int $net_minor
 * @property int $tax_minor
 * @property int $total_minor
 * @property array<string, mixed> $seller
 * @property array<string, mixed> $buyer
 * @property array<int, array<string, mixed>> $lines
 */
class Invoice extends Model
{
    /** @use HasFactory<InvoiceFactory> */
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'public_id',
        'number',
        'user_id',
        'invoiceable_type',
        'invoiceable_id',
        'payment_id',
        'issued_at',
        'currency',
        'tax_rate_bps',
        'lines_total_minor',
        'discount_minor',
        'net_minor',
        'tax_minor',
        'total_minor',
        'seller',
        'buyer',
        'lines',
    ];

    protected static function booted(): void
    {
        static::creating(function (Invoice $invoice): void {
            if (empty($invoice->public_id)) {
                $invoice->public_id = (string) Str::ulid();
            }
        });
    }

    protected static function newFactory(): InvoiceFactory
    {
        return InvoiceFactory::new();
    }

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'issued_at' => 'datetime',
            'seller' => 'array',
            'buyer' => 'array',
            'lines' => 'array',
            'tax_rate_bps' => 'integer',
            'lines_total_minor' => 'integer',
            'discount_minor' => 'integer',
            'net_minor' => 'integer',
            'tax_minor' => 'integer',
            'total_minor' => 'integer',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'public_id';
    }

    /**
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return BelongsTo<Payment, $this>
     */
    public function payment(): BelongsTo
    {
        return $this->belongsTo(Payment::class);
    }

    /**
     * @return MorphTo<Model, $this>
     */
    public function invoiceable(): MorphTo
    {
        return $this->morphTo();
    }

    public function sellerParty(): InvoiceParty
    {
        return InvoiceParty::fromArray($this->seller);
    }

    public function buyerParty(): InvoiceParty
    {
        return InvoiceParty::fromArray($this->buyer);
    }

    /**
     * @return list<InvoiceLine>
     */
    public function invoiceLines(): array
    {
        return array_map(
            static fn (array $line): InvoiceLine => InvoiceLine::fromArray($line),
            array_values($this->lines),
        );
    }

    public function isForSubscription(): bool
    {
        return $this->invoiceable_type === Subscription::class;
    }

    public function isForOrder(): bool
    {
        return $this->invoiceable_type === Order::class;
    }

    public function hasDiscount(): bool
    {
        return $this->discount_minor > 0;
    }

    /**
     * The tax rate as a display string such as "15" or "15.5".
     */
    public function taxRateDisplay(): string
    {
        return rtrim(rtrim(number_format($this->tax_rate_bps / 100, 2, '.', ''), '0'), '.');
    }

    public function total(): Money
    {
        return Money::fromMinor($this->total_minor);
    }

    public function totalDisplay(): string
    {
        return Money::fromMinor($this->total_minor)->format();
    }

    public function netDisplay(): string
    {
        return Money::fromMinor($this->net_minor)->format();
    }

    public function taxDisplay(): string
    {
        return Money::fromMinor($this->tax_minor)->format();
    }

    public function discountDisplay(): string
    {
        return Money::fromMinor($this->discount_minor)->format();
    }

    public function linesTotalDisplay(): string
    {
        return Money::fromMinor($this->lines_total_minor)->format();
    }

    /**
     * File name used for every download of this invoice.
     */
    public function fileName(): string
    {
        return $this->number.'.pdf';
    }
}
