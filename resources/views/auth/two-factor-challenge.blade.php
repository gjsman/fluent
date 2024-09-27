<x-app-layout>
    <x-authentication-card>
        <div x-data="{ recovery: false }">
            <flux:heading size="lg">
                {{ __('Two factor authentication') }}
            </flux:heading>

            <flux:subheading class="mb-6" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </flux:subheading>

            <flux:subheading class="mb-6" x-cloak x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </flux:subheading>

            <x-validation-errors class="mb-6" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <flux:field x-show="! recovery">
                    <flux:label>{{ __('Authenticator Code') }}</flux:label>
                    <flux:input id="code" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </flux:field>

                <flux:field x-cloak x-show="recovery">
                    <flux:label>{{ __('Recovery Code') }}</flux:label>
                    <flux:input id="recovery_code" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </flux:field>

                <div class="flex items-center justify-end mt-6">
                    <flux:button variant="ghost"
                                 type="button"
                                 x-show="! recovery"
                                 x-on:click="
                                     recovery = true;
                                     $nextTick(() => { $refs.recovery_code.focus() })
                                 ">
                        {{ __('Use a recovery code') }}
                    </flux:button>

                    <flux:button variant="ghost"
                                 type="button"
                                 x-cloak
                                 x-show="recovery"
                                 x-on:click="
                                     recovery = false;
                                     $nextTick(() => { $refs.code.focus() })
                                 ">
                        {{ __('Use an authentication code') }}
                    </flux:button>

                    <flux:button variant="primary" class="ms-4" type="submit">
                        {{ __('Log in') }}
                    </flux:button>
                </div>
            </form>
        </div>
    </x-authentication-card>
</x-app-layout>
