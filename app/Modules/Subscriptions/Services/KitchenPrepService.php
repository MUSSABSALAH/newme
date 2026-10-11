<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Services;

use App\Modules\Delivery\DTOs\SubscriptionStop;
use App\Modules\Delivery\Services\DeliveryBoardService;
use App\Modules\Plans\Enums\MealType;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Carbon;

/**
 * The kitchen's list for one day: every subscription dish due, grouped so that
 * the same dish is cooked once in bulk, with the customers it goes to.
 *
 * Built on the delivery board's stops so both screens agree on which
 * subscriptions deliver that day (paused days are already left out).
 */
final class KitchenPrepService
{
    public function __construct(private readonly DeliveryBoardService $board) {}

    /**
     * @return array{
     *     subscriptions: int,
     *     portions: int,
     *     sections: list<array{type: string, label: string, portions: int, dishes: list<array{dish: string, is_chef: bool, count: int, customers: list<array{name: string, phone: string|null, reference: string, public_id: string, plan: string, allergies: string|null}>}>}>
     * }
     */
    public function forDate(Carbon $date): array
    {
        $stops = $this->board->stopsOn($date);
        (new Collection(array_map(static fn (SubscriptionStop $stop) => $stop->subscription, $stops)))->loadMissing('plan');
        $groups = [];

        foreach ($stops as $stop) {
            foreach ($stop->meals as $meal) {
                $key = $meal['is_chef'] ? "\0chef" : mb_strtolower(trim($meal['dish']));

                $groups[$meal['type']]['label'] = $meal['label'];
                $groups[$meal['type']]['dishes'][$key] ??= [
                    'dish' => $meal['dish'],
                    'is_chef' => $meal['is_chef'],
                    'customers' => [],
                ];
                $groups[$meal['type']]['dishes'][$key]['customers'][] = $this->customer($stop);
            }
        }

        $sections = [];
        $portions = 0;

        foreach ($this->typeOrder(array_keys($groups)) as $type) {
            $dishes = array_map(
                static fn (array $dish): array => $dish + ['count' => count($dish['customers'])],
                array_values($groups[$type]['dishes']),
            );

            // Biggest batches first; chef's choice always closes the list.
            usort($dishes, static fn (array $a, array $b): int => [$a['is_chef'], -$a['count'], $a['dish']]
                <=> [$b['is_chef'], -$b['count'], $b['dish']]);

            $count = array_sum(array_column($dishes, 'count'));
            $portions += $count;

            $sections[] = [
                'type' => $type,
                'label' => $groups[$type]['label'],
                'portions' => $count,
                'dishes' => $dishes,
            ];
        }

        return [
            'subscriptions' => count($stops),
            'portions' => $portions,
            'sections' => $sections,
        ];
    }

    /**
     * @return array{name: string, phone: string|null, reference: string, public_id: string, plan: string, allergies: string|null}
     */
    private function customer(SubscriptionStop $stop): array
    {
        $allergies = trim((string) $stop->subscription->health_allergies);

        return [
            'name' => $stop->customerName(),
            'phone' => $stop->phone(),
            'reference' => $stop->subscription->reference(),
            'public_id' => $stop->subscription->public_id,
            'plan' => $stop->subscription->planLabel(),
            'allergies' => $allergies === '' ? null : $allergies,
        ];
    }

    /**
     * Meal types in the order of the day (breakfast first), unknown ones last.
     *
     * @param  list<string>  $types
     * @return list<string>
     */
    private function typeOrder(array $types): array
    {
        $order = array_map(static fn (MealType $type): string => $type->value, MealType::cases());

        usort($types, static function (string $a, string $b) use ($order): int {
            $ia = array_search($a, $order, true);
            $ib = array_search($b, $order, true);

            return ($ia === false ? PHP_INT_MAX : $ia) <=> ($ib === false ? PHP_INT_MAX : $ib);
        });

        return $types;
    }
}
