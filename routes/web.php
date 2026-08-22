<?php

declare(strict_types=1);

use App\Http\Controllers\Web\Account\AccountController;
use App\Http\Controllers\Web\Account\AddressController as CustomerAddressController;
use App\Http\Controllers\Web\Account\BodyMeasurementController;
use App\Http\Controllers\Web\Account\ForgotPasswordController as CustomerForgotPasswordController;
use App\Http\Controllers\Web\Account\InvoiceController as CustomerInvoiceController;
use App\Http\Controllers\Web\Account\LoginController as CustomerLoginController;
use App\Http\Controllers\Web\Account\RegisterController as CustomerRegisterController;
use App\Http\Controllers\Web\Account\ResetPasswordController as CustomerResetPasswordController;
use App\Http\Controllers\Web\Account\VerifyOtpController as CustomerVerifyOtpController;
use App\Http\Controllers\Web\Admin\ArticleController;
use App\Http\Controllers\Web\Admin\AuditController;
use App\Http\Controllers\Web\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Web\Admin\Auth\LoginController;
use App\Http\Controllers\Web\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Web\Admin\CategoryController;
use App\Http\Controllers\Web\Admin\ConsultationController;
use App\Http\Controllers\Web\Admin\CouponController;
use App\Http\Controllers\Web\Admin\CustomerController;
use App\Http\Controllers\Web\Admin\DashboardController;
use App\Http\Controllers\Web\Admin\DeliveryController;
use App\Http\Controllers\Web\Admin\InvitationController as AdminInvitationController;
use App\Http\Controllers\Web\Admin\InvoiceController;
use App\Http\Controllers\Web\Admin\MealController;
use App\Http\Controllers\Web\Admin\NotificationController;
use App\Http\Controllers\Web\Admin\OrderController;
use App\Http\Controllers\Web\Admin\PaymentController;
use App\Http\Controllers\Web\Admin\PlanController;
use App\Http\Controllers\Web\Admin\PlanMealController;
use App\Http\Controllers\Web\Admin\PlanPricingController;
use App\Http\Controllers\Web\Admin\PlanVersionController;
use App\Http\Controllers\Web\Admin\ProductController;
use App\Http\Controllers\Web\Admin\RecipeController;
use App\Http\Controllers\Web\Admin\RoleController;
use App\Http\Controllers\Web\Admin\SettingController;
use App\Http\Controllers\Web\Admin\SubscriptionController;
use App\Http\Controllers\Web\Admin\UserController;
use App\Http\Controllers\Web\CartController;
use App\Http\Controllers\Web\CheckoutController;
use App\Http\Controllers\Web\ConsultationBookingController;
use App\Http\Controllers\Web\InvitationController;
use App\Http\Controllers\Web\LocaleController;
use App\Http\Controllers\Web\MailPreviewController;
use App\Http\Controllers\Web\PayTabsReturnController;
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
    Route::get('/product/{product:slug}', [WebsiteController::class, 'productShow'])->name('product.show');

    // Shopping cart (session-based).
    Route::get('/cart', [CartController::class, 'index'])->name('cart');
    Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

    // Declared before the {product} routes so "coupon" is never read as an id.
    Route::post('/cart/coupon', [CartController::class, 'applyCoupon'])->name('cart.coupon.store');
    Route::delete('/cart/coupon', [CartController::class, 'removeCoupon'])->name('cart.coupon.destroy');

    Route::patch('/cart/{product}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{product}', [CartController::class, 'destroy'])->name('cart.destroy');

    // Parking a subscribe-wizard selection is open to guests: the draft is kept
    // in the session so it survives the trip through login or registration.
    Route::post('/checkout/subscription', [CheckoutController::class, 'startSubscription'])->name('checkout.subscription');

    Route::get('/terms', [WebsiteController::class, 'terms'])->name('terms');

    // PayTabs sends the shopper back here after the hosted page. Auth is
    // optional: the IPN still settles the payment if the session is gone.
    Route::match(['GET', 'POST'], 'payments/paytabs/return', PayTabsReturnController::class)
        ->name('payments.paytabs.return');

    // Legacy paths kept as redirects.
    Route::redirect('/plans', '/subscribe');
    Route::redirect('/shop', '/store');

    /*
     | Customer accounts (separate from staff, same users table).
     */
    Route::middleware('guest')->group(function () {
        Route::get('login', [CustomerLoginController::class, 'create'])->name('login');
        Route::post('login', [CustomerLoginController::class, 'store']);
        Route::get('register', [CustomerRegisterController::class, 'create'])->name('register');
        Route::post('register', [CustomerRegisterController::class, 'store']);

        Route::get('verify', [CustomerVerifyOtpController::class, 'create'])->name('otp.create');
        Route::post('verify', [CustomerVerifyOtpController::class, 'store'])->name('otp.store');
        Route::post('verify/resend', [CustomerVerifyOtpController::class, 'resend'])->name('otp.resend');

        Route::get('forgot-password', [CustomerForgotPasswordController::class, 'create'])->name('password.request');
        Route::post('forgot-password', [CustomerForgotPasswordController::class, 'store'])->name('password.email');
        Route::get('reset-password/{token}', [CustomerResetPasswordController::class, 'create'])->name('password.reset');
        Route::post('reset-password', [CustomerResetPasswordController::class, 'store'])->name('password.update');
    });

    Route::middleware(['auth', 'user.type:customer'])->group(function () {
        Route::post('logout', [CustomerLoginController::class, 'destroy'])->name('logout');

        Route::get('account', [AccountController::class, 'index'])->name('account');
        Route::put('account/profile', [AccountController::class, 'updateProfile'])->name('account.profile');

        Route::post('account/addresses', [CustomerAddressController::class, 'store'])->name('account.addresses.store');
        Route::put('account/addresses/{address}', [CustomerAddressController::class, 'update'])->name('account.addresses.update');
        Route::delete('account/addresses/{address}', [CustomerAddressController::class, 'destroy'])->name('account.addresses.destroy');
        Route::patch('account/addresses/{address}/default', [CustomerAddressController::class, 'makeDefault'])->name('account.addresses.default');

        Route::post('account/measurements', [BodyMeasurementController::class, 'store'])->name('account.measurements.store');
        Route::delete('account/measurements/{measurement}', [BodyMeasurementController::class, 'destroy'])->name('account.measurements.destroy');

        Route::get('account/orders/{order}', [AccountController::class, 'order'])->name('account.order');
        Route::get('account/subscriptions/{subscription}', [AccountController::class, 'subscription'])->name('account.subscription');
        Route::put('account/subscriptions/{subscription}/meals', [AccountController::class, 'updateMeals'])->name('account.subscriptions.meals');
        Route::post('account/subscriptions/{subscription}/pause', [AccountController::class, 'pause'])->name('account.subscriptions.pause');
        Route::post('account/subscriptions/{subscription}/resume', [AccountController::class, 'resume'])->name('account.subscriptions.resume');
        Route::get('account/invoices/{invoice}', [CustomerInvoiceController::class, 'download'])->name('account.invoice');

        Route::get('consult', [WebsiteController::class, 'consult'])->name('consult');
        Route::post('consult', [ConsultationBookingController::class, 'store'])->name('consult.store');

        // Checkout: confirm the address, pay, then place. Shared by the store
        // cart and a parked subscription draft.
        Route::get('checkout', [CheckoutController::class, 'show'])->name('checkout');
        Route::post('checkout', [CheckoutController::class, 'store'])->name('checkout.store');
        Route::post('checkout/address', [CheckoutController::class, 'storeAddress'])->name('checkout.address.store');
        Route::delete('checkout/subscription', [CheckoutController::class, 'destroySubscription'])->name('checkout.subscription.destroy');
    });
});

Route::get('/locale/{locale}', LocaleController::class)->name('locale.switch');

// Public invitation acceptance (staff complete their own registration).
Route::middleware('guest')->group(function () {
    Route::get('invitations/{token}', [InvitationController::class, 'create'])->name('invitations.accept');
    Route::post('invitations/{token}', [InvitationController::class, 'store']);
});

// Temporary design-system preview (removed once real admin screens land).
Route::view('/design', 'admin.styleguide')->name('design');

// Branded email HTML previews — these pages do not send mail.
Route::get('/mail/preview', [MailPreviewController::class, 'index'])->name('mail.preview');
Route::get('/mail/preview/{template}', [MailPreviewController::class, 'show'])->name('mail.preview.show');

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

    Route::middleware(['auth', 'user.type:staff'])->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
        Route::post('logout', [LoginController::class, 'destroy'])->name('logout');

        // Adding a user is an invitation: the user sets their own password.
        Route::get('users/create', [AdminInvitationController::class, 'create'])->name('users.create');
        Route::post('users/create', [AdminInvitationController::class, 'store'])->name('users.store');
        Route::post('invitations/{invitation}/resend', [AdminInvitationController::class, 'resend'])->name('users.invitations.resend');

        Route::resource('users', UserController::class)->only(['index', 'edit', 'update']);
        Route::post('users/{user}/activate', [UserController::class, 'activate'])->name('users.activate');
        Route::post('users/{user}/deactivate', [UserController::class, 'deactivate'])->name('users.deactivate');

        // Store customers (separate from staff; same users table).
        Route::resource('customers', CustomerController::class)->only(['index', 'show']);

        Route::resource('roles', RoleController::class)->except('show');

        // Plans: master data with versioned pricing.
        Route::post('plans/{plan}/versions', [PlanVersionController::class, 'store'])->name('plans.versions.store');
        Route::post('plan-versions/{version}/publish', [PlanVersionController::class, 'publish'])->name('plans.versions.publish');
        Route::put('plan-versions/{version}/pricing', [PlanPricingController::class, 'update'])->name('plans.versions.pricing.update');
        Route::put('plans/{plan}/meals', [PlanMealController::class, 'update'])->name('plans.meals.update');
        Route::resource('plans', PlanController::class);

        // Meals: shared catalog available to plans.
        Route::resource('meals', MealController::class)->except('show');

        // CMS: website articles & recipes.
        Route::resource('articles', ArticleController::class)->except('show');
        Route::resource('recipes', RecipeController::class)->except('show');

        // Customer subscriptions: read-only, apart from the staff handling state.
        Route::resource('subscriptions', SubscriptionController::class)->only(['index', 'show']);
        Route::patch('subscriptions/{subscription}/handling', [SubscriptionController::class, 'updateHandling'])
            ->name('subscriptions.handling');
        Route::get('subscriptions/{subscription}/meals.pdf', [SubscriptionController::class, 'mealsPdf'])
            ->name('subscriptions.meals-pdf');

        // Store: product categories, products, discount codes and orders.
        Route::resource('categories', CategoryController::class)->except('show');
        Route::resource('products', ProductController::class)->except('show');
        Route::resource('coupons', CouponController::class)->except('show');
        Route::resource('orders', OrderController::class)->only(['index', 'show']);
        Route::patch('orders/{order}/status', [OrderController::class, 'updateStatus'])
            ->name('orders.status');

        // Shipping: the day sheet of store orders and subscription deliveries.
        Route::get('deliveries', [DeliveryController::class, 'index'])->name('deliveries.index');
        Route::patch('deliveries/subscriptions/{subscription}', [DeliveryController::class, 'updateStop'])
            ->name('deliveries.stops.update');
        Route::patch('deliveries/orders/{order}', [DeliveryController::class, 'updateOrder'])
            ->name('deliveries.orders.update');

        Route::resource('consultations', ConsultationController::class)->only(['index', 'show']);
        Route::patch('consultations/{consultation}/status', [ConsultationController::class, 'updateStatus'])
            ->name('consultations.status');

        // Billing: invoices are issued by the system, never by hand.
        Route::get('invoices', [InvoiceController::class, 'index'])->name('invoices.index');
        Route::get('invoices/{invoice}/download', [InvoiceController::class, 'download'])->name('invoices.download');
        Route::post('payments/{payment}/confirm', [PaymentController::class, 'confirm'])->name('payments.confirm');

        // Personal notification inbox for the signed-in staff member.
        Route::get('notifications', [NotificationController::class, 'index'])->name('notifications.index');
        Route::post('notifications/read-all', [NotificationController::class, 'readAll'])->name('notifications.read-all');
        Route::post('notifications/{notification}/read', [NotificationController::class, 'read'])->name('notifications.read');

        Route::get('audit', [AuditController::class, 'index'])->name('audit.index');

        Route::get('settings', [SettingController::class, 'edit'])->name('settings.edit');
        Route::put('settings', [SettingController::class, 'update'])->name('settings.update');
    });
});
