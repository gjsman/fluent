<x-app-layout>
    <x-authentication-card>
        <div class="mb-6">
            <flux:heading size="lg">
                {{ __('Verify your email') }}
            </flux:heading>
            <flux:subheading>
                {{ __('Before continuing, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </flux:subheading>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-6 font-medium text-sm text-green-600 dark:text-green-400">
                {{ __('A new verification link has been sent to the email address you provided in your profile settings.') }}
            </div>
        @endif

        <div class="mt-6 flex items-center space-x-4">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <flux:button variant="primary" type="submit">
                        {{ __('Resend Email') }}
                    </flux:button>
                </div>
            </form>

            <flux:spacer />

            <flux:button variant="ghost" :href="route('profile.show')">
                {{ __('Edit Profile') }}
            </flux:button>

            <flux:button variant="ghost" :href="route('logout', ['user' => Auth::user()])">
                {{ __('Log Out') }}
            </flux:button>
        </div>
    </x-authentication-card>
</x-app-layout>
