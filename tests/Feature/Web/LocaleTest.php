<?php

declare(strict_types=1);

namespace Tests\Feature\Web;

use App\Http\Middleware\SetWebLocale;
use Tests\TestCase;

final class LocaleTest extends TestCase
{
    public function test_supported_locale_is_stored_in_session(): void
    {
        $this->get('/locale/ar')->assertStatus(302);

        $this->assertSame('ar', session('locale'));
    }

    public function test_locale_choice_is_persisted_in_a_cookie(): void
    {
        $this->get('/locale/ar')
            ->assertStatus(302)
            ->assertPlainCookie(SetWebLocale::COOKIE, 'ar');
    }

    public function test_cookie_locale_survives_without_a_session(): void
    {
        // Mirrors the post-logout state: the session is gone, but the
        // long-lived cookie still carries the chosen language.
        $this->withUnencryptedCookie(SetWebLocale::COOKIE, 'ar')
            ->get(route('admin.login'))
            ->assertOk()
            ->assertSee('lang="ar"', false)
            ->assertSee('dir="rtl"', false);
    }

    public function test_unsupported_locale_is_ignored(): void
    {
        $this->withSession(['locale' => 'en'])
            ->get('/locale/fr')
            ->assertStatus(302);

        $this->assertSame('en', session('locale'));
    }

    public function test_session_locale_is_applied_to_the_page(): void
    {
        $this->withSession(['locale' => 'ar'])
            ->get(route('admin.login'))
            ->assertOk()
            ->assertSee('lang="ar"', false)
            ->assertSee('dir="rtl"', false);
    }
}
