<x-app-layout>
    <x-authentication-card>
        <div class="mb-6">
            <flux:heading size="lg">
                {{ __('Register for an account') }}
            </flux:heading>
            <flux:subheading>
                {{ __('Welcome to') }} {{ config('app.name') }}!
            </flux:subheading>
        </div>

        <x-validation-errors class="mb-6" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <flux:fieldset>
                <div class="space-y-6">
                    <flux:field>
                        <flux:label>{{ __('Name') }}</flux:label>
                        <flux:input name="name" type="text" :value="old('name')" required autofocus autocomplete="name" />
                    </flux:field>
                    <flux:field>
                        <flux:label>{{ __('Email') }}</flux:label>
                        <flux:input name="email" type="email" :value="old('email')" required autocomplete="email" />
                    </flux:field>
                    <flux:field>
                        <flux:label>{{ __('Password') }}</flux:label>
                        <flux:input name="password" type="password" required autocomplete="new-password" />
                    </flux:field>
                    <flux:field>
                        <flux:label>{{ __('Confirm Password') }}</flux:label>
                        <flux:input name="password_confirmation" type="password" required autocomplete="new-password" />
                    </flux:field>
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                            <div class="space-y-2">
                                <div class="prose dark:prose-invert text-sm">
                                    <p>
                                        {!! __('By continuing, you have read and agree to our :terms_of_service and :privacy_policy.', [
                                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'">'.__('Terms of Service').'</a>',
                                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'">'.__('Privacy Policy').'</a>',
                                        ]) !!}
                                    </p>
                                </div>
                            </div>
                    @endif
                </div>
            </flux:fieldset>

            {{--
                This is a hidden checkbox to make sure the terms are accepted.
                This is because you can't put hyperlinks in Flux; and Flux checkboxes don't accept name="terms" yet,
                so unless we heavily modify the Jetstream component to modify a wire:model, we're stuck with this.
            --}}
            <input type="checkbox" name="terms" id="terms" checked style="display: none;">

            <div class="flex items-center justify-end mt-6">
                <flux:button variant="ghost" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </flux:button>

                <flux:button class="ms-4" variant="primary" type="submit">
                    {{ __('Register') }}
                </flux:button>
            </div>
        </form>
    </x-authentication-card>
</x-app-layout>
