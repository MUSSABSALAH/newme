<?php

declare(strict_types=1);

namespace App\Modules\Identity\Services;

use App\Models\User;
use App\Modules\Identity\Enums\OtpPurpose;
use App\Modules\Identity\Enums\UserType;
use App\Modules\Identity\Jobs\SendSmsJob;
use App\Modules\Identity\Models\CustomerOtp;
use App\Modules\Identity\Notifications\EmailOtpNotification;
use App\Modules\Identity\Support\CustomerAuthChannels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

/**
 * Issues and checks one-time codes for store customers.
 *
 * The same code is delivered on every enabled channel the customer can
 * receive — email, SMS, or both — so they type one number regardless of
 * how many toggles are on.
 */
final class CustomerOtpService
{
    public function __construct(
        private readonly CustomerAuthChannels $channels,
    ) {}

    /**
     * @throws ValidationException
     */
    public function findCustomer(?string $email, ?string $phone): User
    {
        $email = $email !== null && trim($email) !== '' ? trim($email) : null;
        $phone = $phone !== null && trim($phone) !== '' ? trim($phone) : null;

        if ($email === null && $phone === null) {
            throw ValidationException::withMessages([
                'email' => __('auth.failed'),
            ]);
        }

        $query = User::query()->customers();

        if ($email !== null) {
            $query->where('email', $email);
        }

        if ($phone !== null) {
            $query->where('phone', $phone);
        }

        $user = $query->first();

        if (! $user instanceof User || $user->type !== UserType::Customer || ! $user->isActive()) {
            throw ValidationException::withMessages([
                $this->identifierField($email, $phone) => __('auth.failed'),
            ]);
        }

        return $user;
    }

    public function issue(User $user, OtpPurpose $purpose, bool $remember = false): CustomerOtp
    {
        CustomerOtp::query()
            ->where('user_id', $user->getKey())
            ->where('purpose', $purpose->value)
            ->whereNull('consumed_at')
            ->delete();

        $code = (string) random_int(100000, 999999);

        $otp = new CustomerOtp;
        $otp->user_id = $user->getKey();
        $otp->purpose = $purpose;
        $otp->code_hash = Hash::make($code);
        $otp->remember = $remember;
        $otp->attempts = 0;
        $otp->sent_at = now();
        $otp->expires_at = now()->addMinutes(CustomerOtp::TTL_MINUTES);
        $otp->save();

        $this->deliver($user, $code);

        return $otp;
    }

    /**
     * @throws ValidationException
     */
    public function resend(CustomerOtp $otp): CustomerOtp
    {
        if ($otp->isConsumed() || $otp->isExpired()) {
            throw ValidationException::withMessages([
                'code' => __('account.otp.expired'),
            ]);
        }

        if (! $otp->canResend()) {
            throw ValidationException::withMessages([
                'code' => __('account.otp.resend_wait', ['seconds' => CustomerOtp::RESEND_SECONDS]),
            ]);
        }

        $user = $otp->user;

        if (! $user instanceof User) {
            throw ValidationException::withMessages([
                'code' => __('account.otp.expired'),
            ]);
        }

        $code = (string) random_int(100000, 999999);

        $otp->code_hash = Hash::make($code);
        $otp->attempts = 0;
        $otp->sent_at = now();
        $otp->expires_at = now()->addMinutes(CustomerOtp::TTL_MINUTES);
        $otp->save();

        $this->deliver($user, $code);

        return $otp;
    }

    /**
     * @throws ValidationException
     */
    public function verify(CustomerOtp $otp, string $code): User
    {
        if ($otp->isConsumed() || $otp->isExpired() || $otp->isLocked()) {
            throw ValidationException::withMessages([
                'code' => __('account.otp.expired'),
            ]);
        }

        if (! Hash::check($code, $otp->code_hash)) {
            $otp->increment('attempts');

            throw ValidationException::withMessages([
                'code' => __('account.otp.invalid'),
            ]);
        }

        $otp->consumed_at = now();
        $otp->save();

        $user = $otp->user;

        if (! $user instanceof User) {
            throw ValidationException::withMessages([
                'code' => __('account.otp.expired'),
            ]);
        }

        return $user;
    }

    /**
     * @return list<string>
     */
    public function destinations(User $user): array
    {
        $destinations = [];

        if ($this->channels->email() && is_string($user->email) && $user->email !== '') {
            $destinations[] = $user->email;
        }

        if ($this->channels->sms() && is_string($user->phone) && $user->phone !== '') {
            $destinations[] = $user->phone;
        }

        return $destinations;
    }

    private function deliver(User $user, string $code): void
    {
        if ($this->channels->email() && is_string($user->email) && $user->email !== '') {
            $user->notify(new EmailOtpNotification($code));
        }

        if ($this->channels->sms() && is_string($user->phone) && $user->phone !== '') {
            SendSmsJob::dispatch($user->phone, $this->smsMessage($code));
        }
    }

    /**
     * Android Chrome can offer the code from the SMS keyboard suggestion when
     * the message ends with `@host #code` (Web OTP). iOS uses the digits alone.
     */
    private function smsMessage(string $code): string
    {
        $body = (string) __('account.otp.sms', [
            'code' => $code,
            'minutes' => CustomerOtp::TTL_MINUTES,
        ]);

        $host = request()->getHost();

        if ($host === '') {
            $parsed = parse_url((string) config('app.url'), PHP_URL_HOST);
            $host = is_string($parsed) ? $parsed : '';
        }

        if ($host === '') {
            return $body;
        }

        return $body."\n\n@".$host.' #'.$code;
    }

    private function identifierField(?string $email, ?string $phone): string
    {
        if ($email !== null && $email !== '') {
            return 'email';
        }

        if ($phone !== null && $phone !== '') {
            return 'phone';
        }

        return 'email';
    }
}
