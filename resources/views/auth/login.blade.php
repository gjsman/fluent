<x-app-layout>
    <x-authentication-card>
        <div class="mb-6">
            <flux:heading size="lg">
                {{ __('Log in to your account') }}
            </flux:heading>
            <flux:subheading>
                {{ __('Welcome back!') }}
            </flux:subheading>
        </div>

        <x-validation-errors class="mb-6" />

        @session('status')
            <div class="mb-6 font-medium text-sm text-green-600 dark:text-green-400">
                {{ $value }}
            </div>
        @endsession

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <flux:fieldset>
                <div class="space-y-6">
                    <flux:field>
                        <flux:label>{{ __('Email') }}</flux:label>
                        <flux:input type="email" name="email" required autofocus autocomplete="username" :value="old('email')" />
                    </flux:field>
                    <flux:field>
                        <flux:label class="flex justify-between">
                            {{ __('Password') }}

                            <flux:link :href="route('password.request')" variant="subtle">{{ __('Forgot your password?') }}</flux:link>
                        </flux:label>
                        <flux:input type="password" name="password" required autocomplete="current-password" />
                    </flux:field>
                </div>
            </flux:fieldset>

            {{--
                This is a hidden checkbox to make sure the terms are accepted.
                This is because Flux checkboxes don't accept name="terms" yet,
                so unless we heavily modify the Jetstream component to expose and modify a wire:model,
                we're stuck with this.
            --}}
            <input type="checkbox" name="remember" checked style="display: none;">

            <div class="flex items-center justify-end mt-6 space-x-4">
                <flux:button variant="ghost" href="{{ route('register') }}">
                    {{ __('Register') }}
                </flux:button>

                <flux:button variant="primary" type="submit">
                    {{ __('Log in') }}
                </flux:button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>
