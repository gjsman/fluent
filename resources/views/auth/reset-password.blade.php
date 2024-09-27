<x-app-layout>
    <x-authentication-card>
        <div class="mb-6">
            <flux:heading size="lg">
                {{ __('Reset your password') }}
            </flux:heading>
            <flux:subheading>
                {{ __('Please set a new password below, and you\'ll be ready to go!') }}
            </flux:subheading>
        </div>

        <x-validation-errors class="mb-6" />

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <flux:fieldset>
                <div class="space-y-6">
                    <flux:field>
                        <flux:label>{{ __('Email') }}</flux:label>
                        <flux:input readonly type="email" name="email" :value="old('email', $request->email)" required />
                    </flux:field>

                    <flux:field>
                        <flux:label>{{ __('Password') }}</flux:label>
                        <flux:input type="password" name="password" required autofocus autocomplete="new-password" />
                    </flux:field>

                    <flux:field>
                        <flux:label>{{ __('Confirm Password') }}</flux:label>
                        <flux:input type="password" name="password_confirmation" required autocomplete="new-password" />
                    </flux:field>
                </div>
            </flux:fieldset>

            <div class="flex items-center justify-end mt-6">
                <flux:button variant="primary" type="submit">
                    {{ __('Reset Password') }}
                </flux:button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>
