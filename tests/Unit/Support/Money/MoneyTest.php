<?php

declare(strict_types=1);

namespace Tests\Unit\Support\Money;

use App\Support\Enums\ApiErrorCode;
use App\Support\Exceptions\DomainException;
use App\Support\Money\Currency;
use App\Support\Money\Money;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionNamedType;

final class MoneyTest extends TestCase
{
    public function test_it_constructs_from_minor_units(): void
    {
        $money = Money::fromMinor(1250);

        $this->assertSame(1250, $money->toMinor());
        $this->assertSame('SAR', $money->currency->code);
    }

    public function test_it_constructs_from_decimal_strings(): void
    {
        $this->assertSame(1250, Money::fromMajor('12.50')->toMinor());
        $this->assertSame(1250, Money::fromMajor('12.5')->toMinor());
        $this->assertSame(1200, Money::fromMajor('12')->toMinor());
        $this->assertSame(5, Money::fromMajor('0.05')->toMinor());
        $this->assertSame(-320, Money::fromMajor('-3.20')->toMinor());
    }

    public function test_it_rejects_invalid_decimal_strings(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        Money::fromMajor('12.505');
    }

    public function test_it_adds_and_subtracts_matching_currencies(): void
    {
        $sum = Money::fromMinor(100)->add(Money::fromMinor(50));
        $difference = Money::fromMinor(100)->subtract(Money::fromMinor(30));

        $this->assertSame(150, $sum->toMinor());
        $this->assertSame(70, $difference->toMinor());
    }

    public function test_percentage_multiplication_rounds_deterministically(): void
    {
        // 15% of 20.00 SAR = 3.00 SAR
        $this->assertSame(300, Money::fromMinor(2000)->percentage(1500)->toMinor());

        // 1.5% of 1.00 SAR = 0.015 -> rounds half-up to 0.02 SAR
        $this->assertSame(2, Money::fromMinor(100)->percentage(150)->toMinor());

        // Integer ratio rounding is deterministic and sign-aware.
        $this->assertSame(34, Money::fromMinor(101)->multiply(1, 3)->toMinor());
        $this->assertSame(-34, Money::fromMinor(-101)->multiply(1, 3)->toMinor());
        $this->assertSame(-34, Money::fromMinor(101)->multiply(1, -3)->toMinor());
        $this->assertSame(34, Money::fromMinor(-101)->multiply(1, -3)->toMinor());
    }

    public function test_it_rejects_cross_currency_arithmetic(): void
    {
        $sar = Money::fromMinor(100, Currency::sar());
        $usd = Money::fromMinor(100, new Currency('USD', 2));

        try {
            $sar->add($usd);
            $this->fail('Expected a cross-currency DomainException.');
        } catch (DomainException $e) {
            $this->assertSame(ApiErrorCode::CURRENCY_MISMATCH, $e->errorCode());
        }
    }

    public function test_it_is_immutable(): void
    {
        $original = Money::fromMinor(100);
        $result = $original->add(Money::fromMinor(25));

        $this->assertSame(100, $original->toMinor());
        $this->assertSame(125, $result->toMinor());
        $this->assertNotSame($original, $result);
        $this->assertTrue((new ReflectionClass(Money::class))->isReadOnly());
    }

    public function test_it_formats_as_decimal_string(): void
    {
        $this->assertSame('12.50', Money::fromMinor(1250)->format());
        $this->assertSame('0.05', Money::fromMinor(5)->format());
        $this->assertSame('12.00', Money::fromMinor(1200)->format());
        $this->assertSame('-3.20', Money::fromMinor(-320)->format());
    }

    public function test_it_exposes_no_float_based_methods(): void
    {
        $reflection = new ReflectionClass(Money::class);

        foreach ($reflection->getMethods() as $method) {
            $returnType = $method->getReturnType();
            if ($returnType instanceof ReflectionNamedType) {
                $this->assertNotSame('float', $returnType->getName(), "{$method->getName()} returns float");
            }

            foreach ($method->getParameters() as $parameter) {
                $parameterType = $parameter->getType();
                if ($parameterType instanceof ReflectionNamedType) {
                    $this->assertNotSame(
                        'float',
                        $parameterType->getName(),
                        "{$method->getName()} accepts a float parameter",
                    );
                }
            }
        }
    }
}
