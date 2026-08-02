<?php

declare(strict_types=1);

use App\Support\Time\DisplayTime;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

/**
 * Coupon windows entered before the timezone fix were stored as bare wall time
 * rather than UTC, pushing every window forward by the business offset — a code
 * typed to start at 11:57 only became usable at 14:57 local time.
 *
 * Every row present when this runs was written by the old code, so each stored
 * value is re-read as business wall time and converted to a real UTC instant.
 */
return new class extends Migration
{
    /**
     * @var list<string>
     */
    private const FIELDS = ['starts_at', 'expires_at'];

    public function up(): void
    {
        $this->rewrite(static fn (string $stored): string => DisplayTime::parse($stored)->toDateTimeString());
    }

    public function down(): void
    {
        $timezone = DisplayTime::timezone();

        $this->rewrite(static fn (string $stored): string => Carbon::parse($stored, 'UTC')
            ->setTimezone($timezone)
            ->format('Y-m-d H:i:s'));
    }

    /**
     * @param  callable(string): string  $convert
     */
    private function rewrite(callable $convert): void
    {
        if (! Schema::hasTable('coupons')) {
            return;
        }

        // Soft-deleted coupons are included: they can still be restored.
        $rows = DB::table('coupons')
            ->select(['id', ...self::FIELDS])
            ->where(static function ($query): void {
                foreach (self::FIELDS as $field) {
                    $query->orWhereNotNull($field);
                }
            })
            ->get();

        foreach ($rows as $row) {
            $changes = [];

            foreach (self::FIELDS as $field) {
                if ($row->{$field} !== null) {
                    $changes[$field] = $convert((string) $row->{$field});
                }
            }

            if ($changes !== []) {
                DB::table('coupons')->where('id', $row->id)->update($changes);
            }
        }
    }
};
