<?php

declare(strict_types=1);

use App\Http\Controllers\Api\V1\Auth\LoginController;
use App\Http\Controllers\Api\V1\Auth\LogoutController;
use App\Http\Controllers\Api\V1\Auth\MeController;
use App\Http\Controllers\Api\V1\HealthController;
use App\Http\Controllers\Api\V1\PlanController;
use App\Http\Controllers\Api\V1\PlanQuoteController;
use Illuminate\Support\Facades\Route;

// Route::prefix('v1')->group(function (): void {
//     Route::get('health', HealthController::class)->name('api.v1.health');

//     Route::post('auth/login', LoginController::class)->name('api.v1.auth.login');

//     // Public plans catalog and server-computed pricing quotes.
//     Route::get('plans', [PlanController::class, 'index'])->name('api.v1.plans.index');
//     Route::get('plans/{plan:public_id}', [PlanController::class, 'show'])->name('api.v1.plans.show');
//     Route::post('plans/{plan:public_id}/quote', [PlanQuoteController::class, 'store'])->name('api.v1.plans.quote');

//     Route::middleware('auth:sanctum')->group(function (): void {
//         Route::post('auth/logout', LogoutController::class)->name('api.v1.auth.logout');
//         Route::get('auth/me', MeController::class)->name('api.v1.auth.me');
//     });
// });
