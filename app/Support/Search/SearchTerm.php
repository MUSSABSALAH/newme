<?php

declare(strict_types=1);

namespace App\Support\Search;

use App\Support\Money\Money;
use BackedEnum;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use InvalidArgumentException;

/**
 * The text typed into an admin list's search box, plus the ways it can match:
 * free text, a short reference, a phone number, an amount or an enum label.
 *
 * Lists stay fast as they grow because related tables are matched through
 * `whereIn (select id ...)` subqueries (semi-joins), never row-by-row lookups,
 * and every list is still paginated.
 */
final class SearchTerm
{
    public const PARAM = 'q';

    private const MAX_LENGTH = 100;

    private const MIN_LENGTH = 2;

    private function __construct(public readonly string $value) {}

    public static function fromRequest(Request $request): self
    {
        return self::of((string) $request->query(self::PARAM, ''));
    }

    public static function of(string $raw): self
    {
        // "#A1B2C3" is how references are printed; "%" would match everything.
        $value = trim(str_replace(['%', '\\'], '', $raw));
        $value = ltrim($value, '#');
        $value = (string) preg_replace('/\s+/u', ' ', $value);
        $value = mb_substr(trim($value), 0, self::MAX_LENGTH);

        return new self(mb_strlen($value) >= self::MIN_LENGTH ? $value : '');
    }

    public function isEmpty(): bool
    {
        return $this->value === '';
    }

    public function contains(): string
    {
        return '%'.mb_strtolower($this->value).'%';
    }

    /**
     * Adds `OR lower(column) LIKE %term%` for each column. Accepts JSON paths
     * such as "name->ar", which is how translatable names are stored.
     *
     * @param  Builder<\Illuminate\Database\Eloquent\Model>  $query
     * @param  list<string>  $columns
     */
    public function orLike(Builder $query, array $columns): void
    {
        $grammar = $query->getQuery()->getGrammar();

        foreach ($columns as $column) {
            $query->orWhereRaw('lower('.$grammar->wrap($column).') like ?', [$this->contains()]);
        }
    }

    /**
     * Uppercased when it could be the last characters of a public id, which is
     * what the lists print as the order or subscription number.
     */
    public function reference(): ?string
    {
        return preg_match('/^[A-Za-z0-9]{4,26}$/', $this->value) === 1 ? strtoupper($this->value) : null;
    }

    /**
     * Phone digits without the country code or leading zero, so "0545121174",
     * "545121174" and "+966545121174" all find the same customer.
     */
    public function phoneTail(): ?string
    {
        $digits = (string) preg_replace('/\D+/', '', $this->value);

        if (strlen($digits) < 5 || strlen($digits) > 15 || preg_match('/[^\d\s+\-()]/', $this->value) === 1) {
            return null;
        }

        $digits = (string) preg_replace('/^(00)?966/', '', $digits);

        return ltrim($digits, '0') ?: null;
    }

    public function integer(): ?int
    {
        return preg_match('/^\d{1,9}$/', $this->value) === 1 ? (int) $this->value : null;
    }

    /**
     * Minor units when the term reads as an amount such as "120" or "120.50".
     */
    public function amountMinor(): ?int
    {
        $amount = str_replace(',', '', $this->value);

        if (preg_match('/^\d{1,9}(\.\d{1,2})?$/', $amount) !== 1) {
            return null;
        }

        try {
            return Money::fromMajor($amount)->toMinor();
        } catch (InvalidArgumentException) {
            return null;
        }
    }

    /**
     * Values of the enum cases whose on-screen label contains the term, so a
     * status can be found by the word the admin sees.
     *
     * @param  list<BackedEnum>  $cases  Cases exposing label().
     * @return list<string|int>
     */
    public function enumValues(array $cases): array
    {
        $values = [];

        foreach ($cases as $case) {
            $label = method_exists($case, 'label') ? (string) $case->label() : '';

            if ($label !== '' && mb_stripos($label, $this->value) !== false) {
                $values[] = $case->value;
            }
        }

        return $values;
    }
}
