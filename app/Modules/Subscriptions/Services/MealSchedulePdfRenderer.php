<?php

declare(strict_types=1);

namespace App\Modules\Subscriptions\Services;

use App\Modules\Plans\Enums\MealType;
use App\Modules\Subscriptions\Models\Subscription;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Mpdf\Mpdf;
use Mpdf\Output\Destination;

/**
 * Renders an operations-ready meal calendar PDF for a subscription.
 */
final class MealSchedulePdfRenderer
{
    public function render(Subscription $subscription): string
    {
        $subscription->loadMissing('user');

        $rtl = app()->getLocale() !== 'en';
        $days = $subscription->scheduleDaysWithPauseState();
        $address = $subscription->deliveryAddress();

        $mealLabels = collect($subscription->meal_types ?? [])
            ->map(static function (mixed $meal): ?string {
                if (! is_string($meal)) {
                    return null;
                }

                return MealType::tryFrom($meal)?->label();
            })
            ->filter()
            ->values()
            ->all();

        $weekdayNames = array_values(__('website.subscribe.days'));
        $selectedDayLabels = collect($subscription->selected_days ?? [])
            ->map(static fn ($day): int => (int) $day)
            ->filter(static fn (int $day): bool => $day >= 0 && $day <= 6)
            ->unique()
            ->sort()
            ->map(static fn (int $day): string => (string) ($weekdayNames[$day] ?? $day))
            ->values()
            ->all();

        $activeCount = count(array_filter($days, static fn (array $day): bool => empty($day['paused'])));
        $pausedCount = count($days) - $activeCount;

        $html = View::make('subscriptions.meal-schedule-pdf', [
            'subscription' => $subscription,
            'days' => $days,
            'rtl' => $rtl,
            'address' => $address,
            'mealLabels' => $mealLabels,
            'selectedDayLabels' => $selectedDayLabels,
            'activeCount' => $activeCount,
            'pausedCount' => $pausedCount,
            'generatedAt' => now()->translatedFormat('d M Y — H:i'),
        ])->render();

        $headerHtml = View::make('subscriptions.meal-schedule-pdf-header', [
            'subscription' => $subscription,
            'rtl' => $rtl,
        ])->render();

        $footerHtml = View::make('subscriptions.meal-schedule-pdf-footer', [
            'rtl' => $rtl,
            'generatedAt' => now()->translatedFormat('d M Y — H:i'),
        ])->render();

        $pdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'tempDir' => $this->tempDir(),
            'default_font' => 'dejavusans',
            'default_font_size' => 10,
            'margin_top' => 32,
            'margin_bottom' => 22,
            'margin_left' => 12,
            'margin_right' => 12,
            'margin_header' => 8,
            'margin_footer' => 8,
            'directionality' => $rtl ? 'rtl' : 'ltr',
            'autoScriptToLang' => true,
            'autoLangToFont' => true,
        ]);

        $pdf->SetTitle(__('subscriptions.schedule.pdf_title', ['reference' => $subscription->reference()]));
        $pdf->SetAuthor((string) config('app.name'));
        $pdf->SetCreator((string) config('app.name'));
        $pdf->SetHTMLHeader($headerHtml);
        $pdf->SetHTMLFooter($footerHtml);
        $pdf->WriteHTML($html);

        return (string) $pdf->Output('', Destination::STRING_RETURN);
    }

    private function tempDir(): string
    {
        $path = storage_path('app/mpdf');

        if (! File::isDirectory($path)) {
            File::makeDirectory($path, 0755, true);
        }

        return $path;
    }
}
