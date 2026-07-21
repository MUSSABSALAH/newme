<?php

declare(strict_types=1);

namespace App\Support\Dto;

/**
 * Base for immutable, typed data transfer objects.
 *
 * DTOs carry validated use-case input into application services. They never
 * depend on the HTTP request, session, or route helpers; controllers map
 * validated data into a DTO via {@see fromArray()}.
 */
abstract class Data
{
    /**
     * @param  array<string, mixed>  $attributes
     */
    abstract public static function fromArray(array $attributes): static;

    /**
     * @return array<string, mixed>
     */
    public function toArray(): array
    {
        return get_object_vars($this);
    }
}
