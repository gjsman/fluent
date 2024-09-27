<x-app-layout>
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        @if (Laravel\Fortify\Features::canUpdateProfileInformation())
        <flux:card class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Profile information') }}</flux:heading>
                <flux:subheading>{{ __('Update your account\'s profile information and email address.') }}</flux:subheading>
            </div>
            @livewire('profile.update-profile-information-form')
        </flux:card>
        @endif

        @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
        <flux:card class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Update password') }}</flux:heading>
                <flux:subheading>{{ __('Ensure your account is using a long, random password to stay secure.') }}</flux:subheading>
            </div>
            @livewire('profile.update-password-form')
        </flux:card>
        @endif

        @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
            <flux:card class="space-y-6">
                <div>
                    <flux:heading size="lg">{{ __('Two factor authentication') }}</flux:heading>
                    <flux:subheading>{{ __('Add additional security to your account using two factor authentication.') }}</flux:subheading>
                </div>
                @livewire('profile.two-factor-authentication-form')
            </flux:card>
        @endif

        <flux:card class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('Browser sessions') }}</flux:heading>
                <flux:subheading>{{ __('Manage and logout your active sessions on other browsers and devices.') }}</flux:subheading>
            </div>
            @livewire('profile.logout-other-browser-sessions-form')
        </flux:card>

        @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
            <flux:card class="space-y-6">
                <div>
                    <flux:heading size="lg">{{ __('Delete account') }}</flux:heading>
                    <flux:subheading>{{ __('Permanently delete your account.') }}</flux:subheading>
                </div>
                @livewire('profile.delete-user-form')
            </flux:card>
        @endif
    </div>
</x-app-layout>
