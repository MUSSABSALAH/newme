<?php

declare(strict_types=1);

namespace App\Modules\Identity\Services;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Identity\Enums\UserType;
use App\Modules\Identity\Exceptions\PasswordResetInvalidException;
use App\Modules\Identity\Notifications\PasswordResetNotification;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class PasswordResetService
{
    public function __construct(private readonly AuditService $audit) {}

    /**
     * Issue a reset link for an eligible account.
     *
     * To avoid leaking which emails exist, callers always report the same
     * generic outcome; this method silently no-ops when the account is
     * missing, inactive, still awaiting an invitation, or recently throttled.
     *
     * The channel ($type) decides both which accounts are eligible and which
     * reset screen the emailed link points to, so staff and customers can
     * never reset each other's passwords.
     */
    public function sendResetLink(string $email, UserType $type = UserType::Staff): void
    {
        $user = User::query()
            ->where('email', $email)
            ->where('type', $type->value)
            ->first();

        if (! $user instanceof User || ! $user->isActive() || $user->password === null) {
            return;
        }

        if ($this->recentlyIssued($email)) {
            return;
        }

        $token = Str::random(64);

        DB::table($this->table())->updateOrInsert(
            ['email' => $email],
            ['token' => hash('sha256', $token), 'created_at' => now()],
        );

        $user->notify(new PasswordResetNotification(
            $this->resetUrl($token, $email, $type),
            $this->expireMinutes(),
        ));
    }

    /**
     * Complete a reset: verify the token, set the new password.
     *
     * @throws PasswordResetInvalidException
     */
    public function reset(
        string $email,
        string $token,
        string $password,
        ?UserType $expectedType = null,
    ): User {
        return DB::transaction(function () use ($email, $token, $password, $expectedType): User {
            $record = DB::table($this->table())->where('email', $email)->first();

            if ($record === null || ! hash_equals((string) $record->token, hash('sha256', $token))) {
                throw new PasswordResetInvalidException;
            }

            if ($this->isExpired((string) $record->created_at)) {
                DB::table($this->table())->where('email', $email)->delete();

                throw new PasswordResetInvalidException;
            }

            $user = User::query()->where('email', $email)->first();

            if (! $user instanceof User) {
                throw new PasswordResetInvalidException;
            }

            if ($expectedType !== null && $user->type !== $expectedType) {
                throw new PasswordResetInvalidException;
            }

            $user->password = $password;
            $user->setRememberToken(Str::random(60));
            $user->save();

            DB::table($this->table())->where('email', $email)->delete();

            $this->audit->log(AuditAction::PasswordReset, $user);

            return $user;
        });
    }

    private function recentlyIssued(string $email): bool
    {
        $record = DB::table($this->table())->where('email', $email)->first();

        if ($record === null) {
            return false;
        }

        return Carbon::parse((string) $record->created_at)
            ->addSeconds($this->throttleSeconds())
            ->isFuture();
    }

    private function isExpired(string $createdAt): bool
    {
        return Carbon::parse($createdAt)
            ->addMinutes($this->expireMinutes())
            ->isPast();
    }

    private function resetUrl(string $token, string $email, UserType $type): string
    {
        $route = $type === UserType::Customer
            ? 'website.password.reset'
            : 'admin.password.reset';

        return route($route, ['token' => $token]).'?email='.urlencode($email);
    }

    private function table(): string
    {
        return (string) config('auth.passwords.users.table', 'password_reset_tokens');
    }

    private function expireMinutes(): int
    {
        return (int) config('auth.passwords.users.expire', 60);
    }

    private function throttleSeconds(): int
    {
        return (int) config('auth.passwords.users.throttle', 60);
    }
}
