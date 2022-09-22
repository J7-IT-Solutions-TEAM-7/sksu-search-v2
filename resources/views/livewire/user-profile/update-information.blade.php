<x-jet-form-section submit="submit">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information.') }}
    </x-slot>

    <x-slot name="form"  wire:model="profile">
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

        <!-- full Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="full_name" value="{{ __('Full Name') }}" />
            <x-jet-input id="full_name" type="text" class="mt-1 block w-full" wire:model.defer="full_name" autocomplete="full_name" />
            <x-jet-input-error for="full_name" class="mt-2" />
        </div>

        <!-- First Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="first_name" value="{{ __('First Name') }}" />
            <x-jet-input id="first_name" type="text" class="mt-1 block w-full" wire:model.defer="first_name" autocomplete="first_name" />
            <x-jet-input-error for="first_name" class="mt-2" />
        </div>

        <!-- last Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="last_name" value="{{ __('Last Name') }}" />
            <x-jet-input id="last_name" type="text" class="mt-1 block w-full" wire:model.defer="last_name" autocomplete="last_name" />
            <x-jet-input-error for="last_name" class="mt-2" />
        </div>

        <!-- Address -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Address') }}" />
            <x-jet-input id="address" type="text" class="mt-1 block w-full" wire:model.defer="address" autocomplete="address" />
            <x-jet-input-error for="address" class="mt-2" />
        </div>

         <!-- Birthday -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="birthday" value="{{ __('Birthday') }}" />
            <x-jet-input id="birthday" type="date" class="mt-1 block w-full" wire:model.defer="birthday" />
            <x-jet-input-error for="birthday" class="mt-2" />
        </div>

         <!-- Contact Number -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="contact_number" value="{{ __('Contact Number') }}" />
            <x-jet-input id="contact_number" type="number" class="mt-1 block w-full" wire:model.defer="contact_number" />
            <x-jet-input-error for="contact_number" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="profile" class="bg-primary-500">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
