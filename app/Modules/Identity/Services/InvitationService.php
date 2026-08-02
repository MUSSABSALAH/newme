<?php

declare(strict_types=1);

namespace App\Modules\Identity\Services;

use App\Models\User;
use App\Modules\Audit\Enums\AuditAction;
use App\Modules\Audit\Services\AuditService;
use App\Modules\Identity\DTOs\InvitationData;
use App\Modules\Identity\Enums\UserStatus;
use App\Modules\Identity\Enums\UserType;
use App\Modules\Identity\Exceptions\InvitationAlreadyAcceptedException;
use App\Modules\Identity\Exceptions\InvitationInvalidException;
use App\Modules\Identity\Models\UserInvitation;
use App\Modules\Identity\Notifications\UserInvitationNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

final class InvitationService
{
    private const EXPIRY_HOURS = 48;

    public function __construct(private readonly AuditService $audit) {}

    /**
     * Create an invited (password-less) user and email them an acceptance link.
     */
    public function invite(InvitationData $data, User $inviter): UserInvitation
    {
        return DB::transaction(function () use ($data, $inviter): UserInvitation {
            $user = new User;
            $user->name = $data->name;
            $user->email = $data->email;
            $user->password = null;
            $user->status = UserStatus::Invited;
            $user->type = UserType::Staff;
            $user->save();

            $user->syncRoles($data->roles);

            $invitation = $this->issue($user, $inviter);

            $this->audit->log(AuditAction::UserInvited, $user, [], [
                'name' => $data->name,
                'email' => $data->email,
                'roles' => $data->roles,
            ]);

            return $invitation;
        });
    }

    /**
     * Regenerate the token/expiry for a pending invitation and resend the email.
     */
    public function resend(UserInvitation $invitation, User $inviter): UserInvitation
    {
        if ($invitation->isAccepted()) {
            throw new InvitationAlreadyAcceptedException;
        }

        return DB::transaction(function () use ($invitation, $inviter): UserInvitation {
            $user = $invitation->user;

            $invitation->delete();

            $fresh = $this->issue($user, $inviter);

            $this->audit->log(AuditAction::InvitationResent, $user);

            return $fresh;
        });
    }

    /**
     * Resolve a plaintext token to a still-usable invitation.
     *
     * @throws InvitationInvalidException
     * @throws InvitationAlreadyAcceptedException
     */
    public function resolve(string $token): UserInvitation
    {
        $invitation = UserInvitation::query()
            ->where('token_hash', $this->hash($token))
            ->first();

        if (! $invitation instanceof UserInvitation || $invitation->isExpired()) {
            throw new InvitationInvalidException;
        }

        if ($invitation->isAccepted()) {
            throw new InvitationAlreadyAcceptedException;
        }

        return $invitation;
    }

    /**
     * Complete an invitation: set the password, activate the account.
     *
     * @throws InvitationInvalidException
     * @throws InvitationAlreadyAcceptedException
     */
    public function accept(string $token, string $password): User
    {
        return DB::transaction(function () use ($token, $password): User {
            $invitation = $this->resolve($token);
            $user = $invitation->user;

            $user->password = $password;
            $user->status = UserStatus::Active;
            $user->save();

            $invitation->accepted_at = now();
            $invitation->save();

            $this->audit->log(AuditAction::InvitationAccepted, $user);

            return $user;
        });
    }

    private function issue(User $user, User $inviter): UserInvitation
    {
        $token = Str::random(64);

        $invitation = new UserInvitation;
        $invitation->user_id = $user->getKey();
        $invitation->invited_by = $inviter->getKey();
        $invitation->token_hash = $this->hash($token);
        $invitation->expires_at = now()->addHours(self::EXPIRY_HOURS);
        $invitation->save();

        $user->notify(new UserInvitationNotification(
            acceptUrl: route('invitations.accept', ['token' => $token]),
            inviterName: $inviter->name,
        ));

        return $invitation;
    }

    private function hash(string $token): string
    {
        return hash('sha256', $token);
    }
}
