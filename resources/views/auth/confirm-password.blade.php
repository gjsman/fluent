<x-app-layout>
    <x-authentication-card>
        <div class="mb-6">
            <flux:heading size="lg">
                {{ __('Confirm Password') }}
            </flux:heading>
            <flux:subheading>
                {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
            </flux:subheading>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <flux:fieldset>
                <flux:input
                    autocomplete="current-password"
                    autofocus
                    label="{{ __('Password') }}"
                    name="password"
                    type="password"
                    required
                />
            </flux:fieldset>

            <div class="flex justify-end mt-6">
                <flux:button variant="primary" class="ms-4" type="submit">
                    {{ __('Confirm') }}
                </flux:button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>
