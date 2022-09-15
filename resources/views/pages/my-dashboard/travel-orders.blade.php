<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('My Dashboard') }}
        </h2>
    </x-slot>

    <x-my-dashboard-wrapper>
      @livewire('mydashboard.travel-orders')
    </x-my-dashboard-wrapper>
</x-app-layout>