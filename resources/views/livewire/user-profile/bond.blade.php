<x-jet-form-section submit="submit">
    <x-slot name="title">
        {{ __('Bonds') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Set your bonds.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        {{-- @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
            <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
                <!-- Profile Photo File Input -->
                <input type="file" class="hidden"
                            wire:model="photo"
                            x-ref="photo"
                            x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

                <x-jet-label for="photo" value="{{ __('Photo') }}" />

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

                <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                    {{ __('Select A New Photo') }}
                </x-jet-secondary-button>

                @if ($this->user->profile_photo_path)
                    <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                        {{ __('Remove Photo') }}
                    </x-jet-secondary-button>
                @endif

                <x-jet-input-error for="photo" class="mt-2" />
            </div>
        @endif --}}

        <!-- Bond Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="bond_name" value="{{ __('Bond Name') }}" />
            <x-jet-input id="bond_name" type="text" class="mt-1 block w-full" wire:model.defer="bond_name" autocomplete="full_name" />
            <x-jet-input-error for="bond_name" class="mt-2" />
        </div>

         <!-- Validity Date -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="val_date" value="{{ __('Validity Date') }}" />
            <x-jet-input id="val_date" type="date" class="mt-1 block w-full" wire:model.defer="val_date" autocomplete="birthday" />
            <x-jet-input-error for="val_date" class="mt-2" />
        </div>

         <!-- Contact Number -->
        {{-- <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="contact_number" value="{{ __('Contact Number') }}" />
            <x-jet-input id="contact_number" type="number" class="mt-1 block w-full" wire:model.defer="contact_number" autocomplete="contact_number" />
            <x-jet-input-error for="contact_number" class="mt-2" />
        </div> --}}

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            {{-- <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" /> --}}

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::emailVerification()) && ! $this->user->hasVerifiedEmail())
                <p class="text-sm mt-2">
                    {{ __('Your email address is unverified.') }}

                    <button type="button" class="underline text-sm text-gray-600 hover:text-gray-900" wire:click.prevent="sendEmailVerification">
                        {{ __('Click here to re-send the verification email.') }}
                    </button>
                </p>

                @if ($this->verificationLinkSent)
                    <p v-show="verificationLinkSent" class="mt-2 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to your email address.') }}
                    </p>
                @endif
            @endif
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo" class="bg-primary-500">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
