<?php

declare(strict_types=1);

namespace App\Modules\Identity\Support;

use App\Modules\Settings\Services\SettingsService;

/**
 * Which customer identifiers the store currently asks for.
 *
 * Driven by the authentication OTP toggles in settings: an identifier is
 * collected only when its channel can actually deliver a code. When both
 * toggles are off the store falls back to email + password, the way it
 * worked before OTP existed.
 */
final class CustomerAuthChannels
{
    public function __construct(private readonly SettingsService $settings) {}

    public function sms(): bool
    {
        return (bool) $this->settings->get('authentication.sms_otp');
    }

    public function email(): bool
    {
        return (bool) $this->settings->get('authentication.email_otp');
    }

    public function otpEnabled(): bool
    {
        return $this->sms() || $this->email();
    }

    /**
     * Email is collected when it can receive an OTP, or when password login
     * still needs it as the account identifier.
     */
    public function asksEmail(): bool
    {
        return $this->email() || ! $this->otpEnabled();
    }

    /**
     * Phone is collected when SMS OTP is on, and also on classic registration
     * (password mode still asks for a mobile number).
     */
    public function asksPhoneOnRegister(): bool
    {
        return $this->sms() || ! $this->otpEnabled();
    }

    public function asksPhoneOnLogin(): bool
    {
        return $this->sms();
    }

    public function asksPassword(): bool
    {
        return ! $this->otpEnabled();
    }

    /**
     * Profile always offers email; it is required only when it is a sign-in
     * identifier (email OTP or the password-login fallback).
     */
    public function requiresEmailOnProfile(): bool
    {
        return $this->asksEmail();
    }

    /**
     * Profile always offers a mobile number; it is required only when SMS OTP
     * is how the customer signs in.
     */
    public function requiresPhoneOnProfile(): bool
    {
        return $this->sms();
    }
}
