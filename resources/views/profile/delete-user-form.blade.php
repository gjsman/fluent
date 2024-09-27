<div class="space-y-6">
    <flux:subheading>
        {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Before deleting your account, please download any data or information that you wish to retain.') }}
    </flux:subheading>

    <div class="mt-5">
        <flux:button wire:click="confirmUserDeletion" wire:loading.attr="disabled">
            {{ __('Delete Account') }}
        </flux:button>
    </div>

    <!-- Delete User Confirmation Modal -->
    <x-dialog-modal wire:model.live="confirmingUserDeletion">
        <x-slot name="title">
            {{ __('Delete Account') }}
        </x-slot>

        <x-slot name="content">
            {{ __('Are you sure you want to delete your account? Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}

            <div class="mt-4" x-data="{}" x-on:confirming-delete-user.window="setTimeout(() => $refs.password.focus(), 250)">
                <flux:field>
                    <flux:input type="password" class="mt-1 block w-3/4" autocomplete="current-password"
                                x-ref="password"
                                wire:model="password"
                                wire:keydown.enter="deleteUser" />
                    <flux:error name="password" />
                </flux:field>
            </div>
        </x-slot>

        <x-slot name="footer">
            <flux:button wire:click="$toggle('confirmingUserDeletion')" wire:loading.attr="disabled">
                {{ __('Cancel') }}
            </flux:button>

            <flux:button variant="danger" class="ms-3" wire:click="deleteUser" wire:loading.attr="disabled">
                {{ __('Delete Account') }}
            </flux:button>
        </x-slot>
    </x-dialog-modal>
</div>
