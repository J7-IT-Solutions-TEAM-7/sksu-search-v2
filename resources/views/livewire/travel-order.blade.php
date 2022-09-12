    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 capitalize">
            {{ __('Create Travel Order') }}
        </h2>
    </x-slot>
<div>
  <form wire:submit.prevent="submit" class="p-5">
    @csrf
    <div class="flex">
    <label for="type" class="block text-sm font-medium text-gray-700 mr-6">Travel order type :</label>

     <div class="flex items-center">
         <input id="official_time" name="toType" wire:model="toType" type="radio"
            value="offtravel" class="w-4 h-4 text-primary-500 border-gray-300 focus:ring-primary-500">
          <label for="official_time" class="block ml-1 text-sm font-medium text-gray-700">
             Official Travel
          </label>
     </div>

     <div class="flex items-center">
          <input id="official_time" name="toType" wire:model="toType" checked type="radio"
              value="offtime" class="w-4 h-4 text-primary-500 border-gray-300 focus:ring-primary-500 ml-3">
         <label for="official_time" class="block ml-1 text-sm font-medium text-gray-700">
             Official Time
         </label>
     </div>
    </div>

    <div class="grid grid-cols-2 gap-3">
    <div>
    <div class="mt-5">
        <label for="users" class="block text-sm font-medium text-gray-700">Users</label>
        <div class="mt-1">
            <input type="text" name="users" id="users" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm" placeholder="Search Users Here...">
        </div>
    </div>
    <div class="mt-5">
        <label for="signatories" class="block text-sm font-medium text-gray-700">Signatories</label>
        <div class="mt-1">
            <input type="text" name="signatories" id="signatories" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm" placeholder="Search Signatories Here...">
        </div>
    </div>
    <div class="mt-5">
        <label for="purpose" class="block text-sm font-medium text-gray-700">Purpose</label>
        <div class="mt-1">
            <textarea id="purpose" rows="4" class="block p-2.5 w-full text-sm text-gray-700 rounded-md border border-gray-300 focus:ring-primary-500 focus:border-primary-500"></textarea>        
        </div>
    </div>
    </div>

    <div>
    <div class="mt-5">
        <label for="users" class="block text-sm font-medium text-gray-700">Date of Travel</label>
        <div class="mt-1">
            <div class="flex gap-4">
            <div class="relative rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
            <label for="from_date" class="absolute -top-2 left-2 -mt-px inline-block bg-gray-100 px-1 text-xs font-medium text-gray-900">From</label>
            <input type="date" name="from_date" id="from_date" class="bg-gray-100 block w-full border-0 p-0 text-gray-700 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Jane Smith">
            </div>
            _
            <div class="relative rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:border-indigo-600 focus-within:ring-1 focus-within:ring-indigo-600">
            <label for="to_date" class="absolute -top-2 left-2 -mt-px inline-block bg-gray-100 px-1 text-xs font-medium text-gray-700">To</label>
            <input type="date" name="to_date" id="to_date" class="bg-gray-100 block w-full border-0 p-0 text-gray-700 placeholder-gray-500 focus:ring-0 sm:text-sm" placeholder="Jane Smith">
            </div>
            </div>
        </div>
    </div>
    {{-- <div class="mt-5">
        <label for="signatories" class="block text-sm font-medium text-gray-700">Signatories</label>
        <div class="mt-1">
            <input type="text" name="signatories" id="signatories" class="block w-full rounded-md border-gray-300 shadow-sm focus:border-primary-500 focus:ring-primary-500 sm:text-sm" placeholder="Search Signatories Here...">
        </div>
    </div> --}}
    <div class="mt-5">
        <label for="purpose" class="block text-sm font-medium text-gray-700">Place to visit</label>
        <div class="mt-1">
            <div class="grid grid-cols-2 gap-4">
            <select wire:model="region_codes" id="country" name="country" autocomplete="country"
             class="block w-full min-w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-bg focus:border-primary-bg sm:max-w-xs sm:text-sm">
             <option selected>--SELECT REGION--</option>
            </select>
            <select wire:model="region_codes" id="country" name="country" autocomplete="country"
             class="block w-full min-w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-bg focus:border-primary-bg sm:max-w-xs sm:text-sm">
             <option selected>--SELECT REGION--</option>
            </select>
            <select wire:model="region_codes" id="country" name="country" autocomplete="country"
             class="block w-full min-w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-bg focus:border-primary-bg sm:max-w-xs sm:text-sm">
             <option selected>--SELECT REGION--</option>
            </select>
            <div class="relative rounded-md border border-gray-300 px-3 py-2 shadow-sm focus-within:border-primary-500 focus-within:ring-1 focus-within:ring-primary-500">
            <label for="others" class="absolute -top-2 left-2 -mt-px inline-block bg-gray-100 px-1 text-xs font-medium text-gray-700">Others</label>
            <input type="text" name="others" id="others" class="bg-gray-100 block w-full border-0 p-0 text-gray-700 placeholder-gray-500 focus:ring-0 sm:text-sm">
            </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <div class="m-4">
    <button type="submit" class="bg-primary-500 py-1 mx-2 px-3 border border-white text-white rounded-lg float-right">
        Submit
    </button>
    <button class="bg-white py-1 mx-2 px-3 text-primary-500 border border-primary-500 rounded-lg float-right">
        Cancel
    </button>
    </div>
</form>
</div>

