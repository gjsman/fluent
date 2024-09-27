<x-app-layout>
    <x-authentication-card>
        <div class="mb-6">
            <flux:heading size="lg">
                {{ __('Forgot your password?') }}
            </flux:heading>
            <flux:subheading>
                {{ __('No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
            </flux:subheading>
        </div>

        @session('status')
            <div class="mb-6 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <x-validation-errors class="mb-6" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <flux:fieldset>
                <flux:field>
                    <flux:label>{{ __('Email') }}</flux:label>
                    <flux:input name="email" type="email" :value="old('email')" required autofocus autocomplete="username" />
                </flux:field>
            </flux:fieldset>

            <div class="flex items-center justify-end mt-6 space-x-4">
                <flux:button variant="ghost" href="{{ route('login') }}">
                    {{ __('Back') }}
                </flux:button>

                <flux:button variant="primary" type="submit">
                    {{ __('Email Password Reset Link') }}
                </flux:button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>
