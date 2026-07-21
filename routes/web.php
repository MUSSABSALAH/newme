<?php

declare(strict_types=1);

use App\Http\Controllers\Web\Admin\AuditController;
use App\Http\Controllers\Web\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\Admin\Auth\LoginController;
use App\Http\Controllers\Web\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\InvitationController as AdminInvitationController;
use App\Http\Controllers\Web\Admin\MealController;
use App\Http\Controllers\Web\Admin\PlanController;
use App\Http\Controllers\Web\Admin\PlanMealController;
use App\Http\Controllers\Web\Admin\PlanPricingController;
use App\Http\Controllers\Web\Admin\PlanVersionController;
use App\Http\Controllers\Web\Admin\RoleController;
use App\Http\Controllers\Web\Admin\SettingController;
use App\Http\Controllers\Web\Admin\UserController;
use App\Http\Controllers\Web\InvitationController;
use App\Http\Controllers\Web\LocaleController;
use App\Http\Controllers\Web\WebsiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public marketing website
|--------------------------------------------------------------------------
*/
Route::name('website.')->group(function () {
    Route::get('/', [WebsiteController::class, 'home'])->name('home');
    Route::get('/main', [WebsiteController::class, 'main'])->name('main');
    Route::get('/store', [WebsiteController::class, 'store'])->name('store');
    Route::get('/subscribe', [WebsiteController::class, 'subscribe'])->name('subscribe');
    Route::get('/menu', [WebsiteController::class, 'menu'])->name('menu');
    Route::get('/blog', [WebsiteController::class, 'blog'])->name('blog');
    Route::get('/product', [WebsiteController::class, 'product'])->name('product');
    Route::get('/consult', [WebsiteController::class, 'consult'])->name('consult');
    Route::get('/terms', [WebsiteController::class, 'terms'])->name('terms');

    // Legacy paths kept as redirects.
    Route::redirect('/plans', '/subscribe');
    Route::redirect('/shop', '/store');
});

Route::get('/locale/{locale}', LocaleController::class)->name('locale.switch');

// Public invitation acceptance (staff complete their own registration).
Route::middleware('guest')->group(function () {
    Route::get('invitations/{token}', [InvitationController::class, 'create'])->name('invitations.accept');
    Route::post('invitations/{token}', [InvitationController::class, 'store']);
});

// Temporary design-system preview (removed once real admin screens land).
Route::view('/design', 'admin.styleguide')->name('design');

/*
|--------------------------------------------------------------------------
| Admin control panel (auth-protected)
|--------------------------------------------------------------------------
| The public website lives outside this group. Everything under /admin
| requires an authenticated session.
*/
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('login', [LoginController::class, 'create'])->name('login');
        Route::post('login', [LoginController::class, 'store']);

        Route::get('forgot-password', [ForgotPasswordController::class, 'create'])->name('password.request');
        Route::post('forgot-password', [ForgotPasswordController::class, 'store'])->name('password.email');
        Route::get('reset-password/{token}', [ResetPasswordController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [ResetPasswordController::class, 'store'])->name('password.update');
    });

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

        // Adding a user is an invitation: the user sets their own password.
        Route::get('users/create', [AdminInvitationController::class, 'create'])->name('users.create');
        Route::post('users/create', [AdminInvitationController::class, 'store'])->name('users.store');
        Route::post('invitations/{invitation}/resend', [AdminInvitationController::class, 'resend'])->name('users.invitations.resend');

        Route::resource('users', UserController::class)->only(['index', 'edit', 'update']);
        Route::post('users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
        Route::post('users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');

        Route::resource('roles', RoleController::class)->except('show');

        // Plans: master data with versioned pricing.
        Route::post('plans/{plan}/versions', [PlanVersionController::class, 'store'])->name('plans.versions.store');
        Route::post('plan-versions/{version}/publish', [PlanVersionController::class, 'publish'])->name('plans.versions.publish');
        Route::put('plan-versions/{version}/pricing', [PlanPricingController::class, 'update'])->name('plans.versions.pricing.update');
        Route::put('plans/{plan}/meals', [PlanMealController::class, 'update'])->name('plans.meals.update');
        Route::resource('plans', PlanController::class);

        // Meals: shared catalog available to plans.
        Route::resource('meals', MealController::class)->except('show');

        Route::get('audit', [AuditController::class, 'index'])->name('audit.index');

        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
