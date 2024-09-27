<form class="space-y-6">
    <!-- Profile Photo -->
    @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}">
            <!-- Profile Photo File Input -->
            <input type="file" id="photo" class="hidden"
                        wire:model.live="photo"
                        x-ref="photo"
                        x-on:change="
                                photoName = $refs.photo.files[0].name;
                                const reader = new FileReader();
                                reader.onload = (e) => {
                                    photoPreview = e.target.result;
                                };
                                reader.readAsDataURL($refs.photo.files[0]);
                        " />

            <flux:label>{{ __('Photo') }}</flux:label>

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}" class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                      x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <flux:button class="mt-2 me-2" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </flux:button>

            @if ($this->user->profile_photo_path)
                <flux:button class="mt-2" wire:click="deleteProfilePhoto">
                    {{ __('Remove Photo') }}
                </flux:button>
            @endif

            <flux:error name="photo" class="mt-2" />
        </div>
    @endif

    <flux:fieldset>
        <div class="space-y-6">
            <flux:field>
                <flux:label>{{ __('Name') }}</flux:label>

                <flux:input type="text" wire:model="state.name" required autocomplete="name" />

                <flux:error name="name" />
            </flux:field>

            <flux:field>
                <flux:label>{{ __('Email') }}</flux:label>

                <flux:input type="email" wire:model="state.email" required autocomplete="email" />

                <flux:error name="email" />
            </flux:field>

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2 dark:text-white">
                    {{ __('Your email address is not verified.') }}

                    <button type="button" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </flux:fieldset>

    <div class="flex space-x-4 items-center">
        <flux:button variant="primary" wire:click.prevent="updateProfileInformation" wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </flux:button>

        <x-action-message class="me-3" on="saved">
            {{ __('Saved.') }}
        </x-action-message>
    </div>
</form>
