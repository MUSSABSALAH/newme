<?php

declare(strict_types=1);

namespace Tests\Unit\Subscriptions;

use App\Modules\Plans\Enums\MealType;
use App\Modules\Subscriptions\Support\MealSchedule;
use PHPUnit\Framework\TestCase;

final class MealScheduleTest extends TestCase
{
    public function test_it_pads_a_two_day_checkout_pick_to_the_full_calendar(): void
    {
        $schedule = MealSchedule::complete(
            [
                [
                    'date' => '2026-08-24',
                    'meals' => [
                        MealType::Lunch->value => 'Grilled chicken',
                        MealType::Dinner->value => '',
                    ],
                ],
                [
                    'date' => '2026-08-25',
                    'meals' => [
                        MealType::Lunch->value => 'Salmon',
                        MealType::Dinner->value => 'Soup',
                    ],
                ],
            ],
            '2026-08-24',
            [1, 2, 3, 4, 5],
            5,
            [MealType::Lunch->value, MealType::Dinner->value],
        );

        $this->assertCount(5, $schedule);
        $this->assertSame('2026-08-24', $schedule[0]['date']);
        $this->assertSame('Grilled chicken', $schedule[0]['meals']['lunch']);
        $this->assertNull($schedule[0]['meals']['dinner']);
        $this->assertSame('Salmon', $schedule[1]['meals']['lunch']);
        $this->assertNull($schedule[2]['meals']['lunch']);
        $this->assertSame(MealSchedule::CHECKOUT_PICK_DAYS, 2);
    }
}
