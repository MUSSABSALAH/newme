<?php

declare(strict_types=1);

namespace App\Modules\Payments\DTOs;

use App\Models\User;
use App\Modules\Addresses\Models\Address;

/**
 * Customer and delivery details a hosted gateway needs to open its payment page.
 */
final readonly class PayerDetails
{
    public function __construct(
        public string $name,
        public string $email,
        public string $phone,
        public string $street,
        public string $city,
        public string $state,
        public string $country,
        public string $zip,
    ) {}

    public static function fromCustomer(User $user, Address $address): self
    {
        $host = parse_url((string) config('app.url'), PHP_URL_HOST);
        $host = is_string($host) && $host !== '' ? $host : 'localhost';

        $email = is_string($user->email) && $user->email !== ''
            ? $user->email
            : 'customer-'.$user->getKey().'@'.$host;

        $phone = self::internationalPhone($address->phone !== '' ? $address->phone : (string) $user->phone);

        return new self(
            name: $address->recipient_name !== '' ? $address->recipient_name : $user->name,
            email: $email,
            phone: $phone,
            street: $address->street !== '' ? $address->street : $address->district,
            city: $address->city,
            state: $address->district,
            country: 'SAU',
            zip: $address->national_address ?: '00000',
        );
    }

    private static function internationalPhone(string $phone): string
    {
        $digits = preg_replace('/\D/', '', $phone) ?? '';

        if (str_starts_with($digits, '05') && strlen($digits) === 10) {
            return '966'.substr($digits, 1);
        }

        if (str_starts_with($digits, '5') && strlen($digits) === 9) {
            return '966'.$digits;
        }

        if (str_starts_with($digits, '966')) {
            return $digits;
        }

        return $digits !== '' ? $digits : '966500000000';
    }
}
