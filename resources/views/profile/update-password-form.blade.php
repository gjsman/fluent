<form class="space-y-6">
    <flux:fieldset>
        <div class="space-y-6">
            <flux:field>
                <flux:label>{{ __('Current password') }}</flux:label>
                <flux:input type="password" wire:model="state.current_password" required autocomplete="current-password" />
                <flux:error name="current_password" />
            </flux:field>

            <flux:field>
                <flux:label>{{ __('New password') }}</flux:label>
                <flux:input type="password" wire:model="state.password" required autocomplete="new-password" />
                <flux:error name="password" />
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Confirm password') }}</flux:label>
                <flux:input type="password" wire:model="state.password_confirmation" required autocomplete="new-password" />
                <flux:error name="password_confirmation" />
            </flux:field>
        </div>
    </flux:fieldset>

    <div class="flex space-x-4 items-center">
        <flux:button variant="primary" wire:click.prevent="updatePassword" wire:loading.attr="disabled" wire:target="password">
            {{ __('Save') }}
        </flux:button>

        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>
    </div>
</form>
