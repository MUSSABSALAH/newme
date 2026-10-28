@php
    $pickedCount = collect($recipients)->flatten()->unique()->count();
    $enabled = (bool) old('staff_emails_enabled', $mailSettings['notifications.staff_emails_enabled'] ?? true);
@endphp

<x-layouts.admin :title="__('notifications.settings.title')" :heading="__('notifications.settings.title')" :subtitle="__('notifications.settings.intro')">
    @if (! $quota['unlimited'] && $quota['remaining'] === 0)
        <div class="alert alert--danger" role="alert">
            <strong>{{ __('notifications.settings.quota_reached_title') }}</strong>
            <div>{{ __('notifications.settings.quota_reached', ['sent' => $quota['sent'], 'limit' => $quota['limit']]) }}</div>
        </div>
    @endif

    <div class="grid grid--3">
        <x-ui.stat-card :label="__('notifications.kpi.sent_today')" :value="$quota['sent']" accent="primary">
            <x-slot:icon><x-ui.icon name="mail" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card
            :label="__('notifications.kpi.remaining')"
            :value="$quota['unlimited'] ? __('notifications.kpi.unlimited') : $quota['remaining']"
            accent="dark"
        >
            <x-slot:icon><x-ui.icon name="gauge" /></x-slot:icon>
        </x-ui.stat-card>

        <x-ui.stat-card :label="__('notifications.kpi.recipients')" :value="$pickedCount" accent="accent">
            <x-slot:icon><x-ui.icon name="users" /></x-slot:icon>
        </x-ui.stat-card>
    </div>

    <form method="POST" action="{{ route('admin.staff-emails.update') }}" class="stack">
        @csrf
        @method('PUT')

        <x-ui.card>
            <label class="switch-row">
                <input type="hidden" name="staff_emails_enabled" value="0">
                <input type="checkbox" name="staff_emails_enabled" value="1" @checked($enabled)>
                <span>
                    <span class="switch-row__title">{{ __('notifications.settings.master') }}</span>
                    <span class="field__hint" style="display:block">{{ __('notifications.settings.master_hint') }}</span>
                </span>
            </label>

            @unless ($enabled)
                <div class="alert alert--warning" style="margin-top:12px">{{ __('notifications.settings.master_off') }}</div>
            @endunless

            <div class="form-grid-2" style="margin-top:12px">
                <x-form.field
                    :label="__('settings.fields.notifications.daily_email_limit')"
                    name="daily_email_limit"
                    :hint="__('settings.hints.notifications.daily_email_limit')"
                >
                    <x-form.input type="number" name="daily_email_limit" min="0" max="100000" :value="old('daily_email_limit', $mailSettings['notifications.daily_email_limit'] ?? 0)" />
                </x-form.field>
            </div>
        </x-ui.card>

        <x-ui.card :title="__('notifications.settings.recipients_title')">
            <p class="field__hint" style="margin-top:0">{{ __('notifications.settings.matrix_hint') }}</p>

            @if ($staff->isEmpty())
                <p class="text-muted">{{ __('notifications.settings.no_staff') }}</p>
            @else
                <div class="table-wrap" style="overflow-x:auto">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('notifications.settings.staff') }}</th>
                                @foreach ($mailEvents as $event)
                                    @php($field = (string) $event->emailField())
                                    <th style="text-align:center">
                                        <div>{{ __('notifications.settings.columns.'.$field) }}</div>
                                        <label class="table-check" style="gap:4px; font-weight:400; text-transform:none; margin-top:6px">
                                            <input type="hidden" name="{{ $field }}" value="0">
                                            <input type="checkbox" name="{{ $field }}" value="1" @checked((bool) old($field, $mailSettings['notifications.'.$field] ?? false))>
                                            <span>{{ __('notifications.settings.enabled') }}</span>
                                        </label>
                                    </th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($staff as $member)
                                <tr>
                                    <td>
                                        <strong>{{ $member->name }}</strong>
                                        <div class="text-muted" dir="ltr" style="font-size:0.82rem">{{ $member->email }}</div>
                                    </td>
                                    @foreach ($mailEvents as $event)
                                        @php($field = (string) $event->emailField())
                                        <td style="text-align:center">
                                            <label class="table-check">
                                                <input
                                                    type="checkbox"
                                                    name="recipients[{{ $field }}][]"
                                                    value="{{ $member->id }}"
                                                    aria-label="{{ $member->name }} — {{ __('notifications.settings.columns.'.$field) }}"
                                                    @checked(in_array($member->id, old('recipients.'.$field, $recipients[$event->value] ?? []), false))
                                                >
                                            </label>
                                        </td>
                                    @endforeach
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif

            <p class="field__hint" style="margin-bottom:0">{{ __('notifications.settings.staff_hint') }}</p>
        </x-ui.card>

        <div>
            <x-ui.button type="submit" variant="primary">{{ __('messages.actions.save') }}</x-ui.button>
        </div>
    </form>
</x-layouts.admin>
