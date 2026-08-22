<?php

declare(strict_types=1);

namespace Tests\Feature\Web;

use Tests\TestCase;

final class MailPreviewTest extends TestCase
{
    public function test_the_preview_index_lists_every_email_operation(): void
    {
        $this->get(route('mail.preview'))
            ->assertOk()
            ->assertSee(__('mail.preview.title'))
            ->assertSee(__('mail.catalog.invoice'))
            ->assertSee(__('mail.catalog.order'))
            ->assertSee(__('mail.catalog.subscription'))
            ->assertSee(__('mail.catalog.consultation'))
            ->assertSee(__('mail.catalog.otp'))
            ->assertSee(__('mail.catalog.password'))
            ->assertSee(__('mail.catalog.invitation'));
    }

    public function test_each_operation_renders_inside_the_branded_shell(): void
    {
        foreach (['invoice', 'order', 'subscription', 'consultation', 'otp', 'password', 'invitation'] as $template) {
            $this->get(route('mail.preview.show', $template))
                ->assertOk()
                ->assertSee('assets/images/logos/', false)
                ->assertSee('assets/images/mail/renew-strip.jpg', false)
                ->assertSee(__('website.brand'), false)
                ->assertSee('جدد حياتك', false)
                ->assertSee('PREP - BAKE - RENEW', false);
        }
    }

    public function test_an_unknown_template_is_not_found(): void
    {
        $this->get(route('mail.preview.show', 'does-not-exist'))->assertNotFound();
    }
}
