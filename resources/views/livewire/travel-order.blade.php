   <div> 
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 capitalize">
            {{ __('Create Travel Order') }}
        </h2>
    </x-slot>

<div x-data="{showApplicantError:@entangle('showApplicantError'),showSignatoryError:@entangle('showSignatoryError'),showFromDateError:@entangle('showFromDateError'),showToDateError:@entangle('showToDateError'),pickedSigs:@entangle('pickedSigs'),pickedUsers:@entangle('pickedUsers'), searchedUsers :@entangle('searchedUsers'), searchedSigs :@entangle('searchedSigs'), totype:@entangle('toType')}">
  <form wire:submit.prevent="submit" class="p-5">
    @csrf
    <div class="flex">
    <label for="type" class="block mr-6 text-sm font-medium text-gray-700">Travel order type :</label>

     <div class="flex items-center">
         <input id="official_time" name="toType" wire:model="toType" type="radio"
            value="offtravel" class="w-4 h-4 border-gray-300 text-primary-500 focus:ring-primary-500">
          <label for="official_time" class="block ml-1 text-sm font-medium text-gray-700">
             Official Business
          </label>
     </div>

     <div class="flex items-center">
          <input id="official_time" name="toType" wire:model="toType" checked type="radio"
              value="offtime" class="w-4 h-4 ml-3 border-gray-300 text-primary-500 focus:ring-primary-500">
         <label for="official_time" class="block ml-1 text-sm font-medium text-gray-700">
             Official Time
         </label>
     </div>
    </div>

    {{-- USER --}}
                <div class="pt-2 border-gray-200">

                    <label for="username" class="block pt-2 mt-px font-medium border-t text-md text-primary-bg">
                        Applicant(s):
                    </label>
                    <div class="mt-1">
                        <div class="grid max-h-full grid-cols-4 grid-rows-1 gap-1 my-3 bg-opacity-75 rounded-lg bg-primary-500"
                            x-cloak x-show="pickedUsers==true">
                            @if (count($userInfos)==0)
                            <span
                                class="col-span-1 p-3 text-sm tracking-widest text-white uppercase">{{ 'Applicant Needed.'}}<br>{{ 'try Searching Below.' }}</span>
                            @else
                            @foreach ($userInfos as $key =>$userInfo)
                            <a href="#"
                                class="flex items-center m-2 rounded-full shadow-md bg-primary-200 shadow-primary-300"
                                id="{{  $key.rand(1,499) }}">
                                <div class="flex items-center col-span-1">
                                    <div>
                                        @if ($userInfo)
                                        <img class="inline-block w-10 h-10 rounded-full"
                                            src="{{$userInfo->avatar != null ? asset($userInfo->avatar) : asset($userInfo->user->profile_photo_url)}}"
                                            alt="">
                                        @else
                                        <img class="inline-block w-10 h-10 rounded-full" src="" alt="X">
                                        @endif
                                    </div>
                                    <div class="ml-3">
                                         <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                                            @if ($userInfo)
                                            {{ $userInfo->full_name }}
                                            @else
                                            NOT SET
                                            @endif
                                        </p>
                                        @if ($userInfo->id == auth()->user()->id)
                                        <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                                           <p class="text-xs font-semibold tracking-wider text-primary-500 cursor-pointer">
                                            Default
                                        </p>
                                        @else
                                        <p class="text-xs font-semibold tracking-wider text-blue-700 cursor-pointer hover:underline group-hover:text-white"
                                            x-on:click="$wire.unSetUser({{ $userInfo->id }})">
                                            Remove
                                        </p>
                                        @endif
                                        
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            @endif
                        </div>
                        @error('users_id') <span class="mt-2 text-red-700 error">{{ $message }}</span> @enderror
                        <div class="grid grid-cols-2 grid-rows-1">
                            {{-- <p class="text-gray-700 text-md">Search for applicant here</p> --}}
                            <input type="text" id="username" autocomplete="off"
                                class="block w-full min-w-full col-span-1 col-start-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-bg focus:border-primary-bg sm:max-w-xs sm:text-sm"
                                wire:model.debounce.500ms="searchUsers" placeholder="Search for applicant here...">
                            <div class="grid w-full h-16 grid-cols-4 col-span-2 gap-3 m-2 overflow-y-auto bg-gray-200 rounded-lg" x-cloak x-show="searchedUsers">

                                @if(count($users)>0)
                                @foreach ($users as $user)

                                <a class="p-2 m-1 rounded-lg hover:cursor-pointer hover:bg-opacity-75 hover:bg-primary-300 group"
                                    x-on:click="$wire.setUser({{ $user->id }})">
                                    <div class="flex items-center col-span-2">
                                        <div>
                                            {{-- gab --}}
                                            <img class="inline-block w-10 h-10 rounded-full"
                                                 src="{{$user->avatar != null ? asset($user->avatar) : asset($user->user->profile_photo_url)}}"
                                                alt="">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                                                {{ $user->full_name }}
                                            </p>
                                            <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">
                                                Click image to select.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                                @else
                                <h1 class="flex justify-start col-span-2 p-4 my-auto text-sm text-secondary-500">User with <span class="text-red-600"> '{{ $searchUsers }}' </span> on
                                    their name was not found. Check the spelling or contact support.</h1>
                                @endif


                            </div>
                            <span class="col-span-2 mt-2 text-sm text-red-700 uppercase error" x-cloak
                                x-show="showApplicantError==true">atleast 1(one) applicant is needed</span>
                        </div>

                    </div>
                </div>
                {{-- Sigs --}}
                <div class="pt-1 border-gray-200">

                    <label for="signame" class="block pt-2 mt-px font-medium border-t text-md text-primary-bg">
                        Signatory/Signatories:
                    </label>
                    <div class="col-span-2 mt-1">
                        <div class="grid max-h-full grid-cols-4 grid-rows-1 gap-1 my-3 bg-opacity-75 rounded-lg bg-primary-500"
                            x-cloak x-show="pickedSigs==true">
                            @if (count($sigsInfos)==0)
                            <span
                                class="col-span-5 p-3 text-lg tracking-widest text-white uppercase">{{ 'Atleast one(1) signatory is Needed.'}}<br>{{ 'try Searching Below.' }}</span>
                            @else
                            @foreach ($sigsInfos as $key =>$sigInfo)
                            <a href="#"
                                class="flex items-center m-2 rounded-full shadow-md bg-primary-200 shadow-primary-300"
                                id="{{ $key.rand(500,999)}}">
                                <div class="flex items-center col-span-1">
                                    <div>
                                        @if ($sigInfo && isset($travel_order))
                                        <img class="inline-block w-10 h-10 rounded-full"
                                            src="{{$sigInfo->avatar != null ? asset($sigInfo->avatar) : asset($sigInfo->employee_information->user->profile_photo_url)}}"
                                            alt="">
                                        @elseif($sigInfo)
                                        <img class="inline-block w-10 h-10 rounded-full"
                                            src="{{$sigInfo->avatar != null ? asset($sigInfo->avatar) : asset($sigInfo->user->profile_photo_url)}}"
                                            alt="">
                                        @else
                                        <img class="inline-block w-10 h-10 rounded-full" src="" alt="X">
                                        @endif

                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                                            @if ($sigInfo && isset($travel_order))
                                            {{ $sigInfo->employee_information->full_name }}
                                            @elseif($sigInfo)
                                            {{ $sigInfo->full_name }}
                                            @else
                                            NOT SET
                                            @endif
                                        </p>
                                        <p class="text-xs font-semibold tracking-wider text-blue-700 cursor-pointer hover:underline group-hover:text-white"
                                            x-on:click="$wire.unSetSignatory({{ $sigInfo->id }})">
                                            Remove
                                        </p>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                            @endif
                        </div>
                        @error('users_id') <span class="mt-2 text-red-700 error">{{ $message }}</span> @enderror
                        <div class="grid grid-cols-2 grid-rows-1">
                            {{-- <p class="text-gray-700 text-md">Search for signatory here</p> --}}
                            <input type="text" id="signame" autocomplete="off"
                                class="block w-full min-w-full col-span-1 col-start-1 border-gray-300 rounded-md shadow-sm focus:ring-primary-bg focus:border-primary-bg sm:max-w-xs sm:text-sm"
                                wire:model.debounce.500ms="searchSigs" placeholder="Search for signatory here...">
                            
                            <div class="grid w-full h-16 grid-cols-4 col-span-2 gap-3 m-2 overflow-y-auto bg-gray-200 rounded-lg" x-cloak x-show="searchedSigs">

                                @if(count($sigs)>0)
                                @foreach ($sigs as $user)

                                <a class="p-2 m-1 rounded-lg hover:cursor-pointer hover:bg-opacity-75 hover:bg-primary-300 group"
                                    x-on:click="$wire.setSignatory({{ $user->id }})">
                                    <div class="flex items-center col-span-2">
                                        <div>
                                            {{-- gab --}}
                                            <img class="inline-block w-10 h-10 rounded-full"
                                                src="{{$user->avatar != null ? asset($user->avatar) : asset($user->user->profile_photo_url)}}"
                                                alt="">
                                        </div>
                                        <div class="ml-3">
                                            <p class="text-sm font-medium text-gray-700 group-hover:text-gray-900">
                                                {{ $user->full_name }}
                                            </p>
                                            <p class="text-xs font-medium text-gray-500 group-hover:text-gray-700">
                                                Click image to select.
                                            </p>
                                        </div>
                                    </div>
                                </a>
                                @endforeach
                                @else
                                <h1 class="flex justify-start col-span-2 px-2 my-auto ml-2 text-sm text-secondary-500">Signatory with  <span class="text-red-600">'{{ $searchSigs }}'</span>  on
                                    their name was not found. Check the spelling or contact support.
                                    @endif


                            </div>
    
                        </div>
                        <p class="my-auto mt-1 text-sm text-gray-500"><span
                                    class="font-extrabold text-indigo-400">PLEASE NOTE:</span>
                                Signatories will be displayed in your travel order <strong>in the order of your
                                    input.</strong></p>
                                     <span class="col-span-2 mt-2 text-sm text-red-700 uppercase error" x-cloak
                                x-show="showSignatoryError==true">atleast 1(one) signatory is needed</span>
                    </div>
                </div>
                <div class="pt-1 border-gray-200">
                    <label for="about" class="block pt-2 mt-px font-medium border-t text-md text-primary-bg">
                         You are hereby directed to: (?)
                    </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <textarea wire:model="purpose" id="about" name="about" rows="5"
                        class="block w-full max-w-2xl border border-gray-300 rounded-md shadow-sm focus:ring-primary-bg focus:border-primary-bg sm:text-sm" placeholder="Purpose..."></textarea>
                    <p class="mt-2 text-sm text-gray-500"><span class="font-extrabold text-indigo-400">NOTE:</span>
                        This will also serve as the
                        entry for your disbursement voucher in the future.</p>
                    @error('purpose') <span class="text-red-700 error">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="pt-1 border-gray-200">
                    <label for="about" class="block pt-2 mt-px font-medium border-t text-md text-primary-bg">
                         Date of travel:
                    </label>
                <div class="mt-5 sm:mt-0 sm:col-span-2">
                <div class="flex gap-4 mt-3">
                <div class="relative px-3 py-2 border border-gray-300 rounded-md shadow-sm focus-within:border-primary-600 focus-within:ring-1 focus-within:ring-primary-600">
                <label for="dateoftravelfrom" class="absolute inline-block px-1 -mt-px text-xs font-medium text-gray-900 bg-gray-100 -top-2 left-2">From</label>
                <input type="date" name="dateoftravelfrom" id="from_date" wire:model="dateoftravelfrom"
                                name="dateoftravelfrom"
                                min="{{ date_format(date_add(date_create(date("Y-m-d")),date_interval_create_from_date_string("0 days")),"Y-m-d") }}"
                class="block w-full p-0 text-gray-700 placeholder-gray-500 bg-gray-100 border-0 focus:ring-0 sm:text-sm">
                @error('dateoftravelfrom') <span class="text-red-700 error">{{ $message }}</span> @enderror

                </div>
                _
                <div class="relative px-3 py-2 border border-gray-300 rounded-md shadow-sm focus-within:border-primary-600 focus-within:ring-1 focus-within:ring-primary-600">
                <label for="to_date" class="absolute inline-block px-1 -mt-px text-xs font-medium text-gray-700 bg-gray-100 -top-2 left-2">To</label>
                <input type="date" id="to_date" wire:model="dateoftravelto" name="dateoftravelto"
                                min="{{ $dateoftravelfrom }}"
                class="block w-full p-0 text-gray-700 placeholder-gray-500 bg-gray-100 border-0 focus:ring-0 sm:text-sm">
                 @error('dateoftravelto') <span class="text-red-700 error">{{ $message }}</span> @enderror
                </div>
                </div>
                   
                </div>
            </div>

            
     @if ($toType=="offtravel")
        <div class="mt-5 border-t">
                <label for="about" class="block pt-2 mt-px font-medium text-md text-primary-bg">
                Place to visit:
                </label>
                <div class="mt-1">
                <div class="grid grid-cols-2 gap-4">
                <div>
                <select wire:model="region_codes" id="country" name="country" autocomplete="country"
                            class="block w-full min-w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-bg focus:border-primary-bg sm:max-w-xs sm:text-sm">
                            <option selected>--SELECT REGION--</option>
                            @foreach ($regions as $region)
                            <option value="{{$region->region_code}}">{{$region->region_description}}</option>
                            @endforeach

                </select>
                @error('region_codes') <span class="mt-3 text-red-700 error">{{ $message }}</span> @enderror
                </div>
                <div>
                <select wire:model="province_codes"
                            class="block w-full min-w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-bg focus:border-primary-bg sm:max-w-xs sm:text-sm">
                            <option selected>--SELECT PROVINCE--</option>
                            @foreach ($provinces as $province)
                            <option value="{{$province->province_code}}">{{$province->province_description}}
                            </option>
                            @endforeach

                        </select>
                        @error('province_codes') <span class="mt-3 text-red-700 error">{{ $message }}</span>
                        @enderror
                        </div>
                        <div>
                <select wire:model="city_codes"
                            class="block w-full min-w-full border-gray-300 rounded-md shadow-sm focus:ring-primary-bg focus:border-primary-bg sm:max-w-xs sm:text-sm">
                            <option selected>--SELECT CITY/MUNICIPALITY--</option>
                            @foreach ($cities as $city)
                            <option value="{{$city->city_municipality_code}}">
                                {{$city->city_municipality_description}}</option>
                            @endforeach
                        </select>
                        @error('city_codes') <span class="mt-3 text-red-700 error">{{ $message }}</span> @enderror
                        </div>
                        <div>
                <div class="relative px-3 py-2 border border-gray-300 rounded-md shadow-sm focus-within:border-primary-500 focus-within:ring-1 focus-within:ring-primary-500">
                <label for="others" class="absolute inline-block px-1 -mt-px text-xs font-medium text-gray-700 bg-gray-100 -top-2 left-2">Others</label>
                <input type="text" name="others" id="others" class="block w-full p-0 text-gray-700 placeholder-gray-500 bg-gray-100 border-0 focus:ring-0 sm:text-sm" wire:model="others">
                </div>
                </div>
                </div>
            </div>
        </div>

         <div class="pt-2">   
             <div class="col-span-1 col-start-2 row-span-1 row-start-1 mt-1">
              <div class="relative flex items-start">
                 <input wire:model="has_registration" x-on:leave="$wire.finalTotalCalculation({{ 0 }})"
                  id="comments" aria-describedby="comments-description" name="comments" type="checkbox"
                  class="w-4 h-4 my-auto border-gray-300 rounded text-primary-500 focus:ring-primary-700"> 
              <div class="my-auto ml-3 text-sm">
               <label for="comments" class="font-medium text-gray-700">Has Registration</label>
               
               </div>
             </div>  
             </div>  
             <div class="col-span-1 col-start-3 row-span-1 row-start-1 mt-1" x-data="{hovered : false}">
            @if($has_registration==false)

                    <input type="number" wire:model.lazy="registration_amt"
                        class="hidden w-full min-w-full border-gray-300 rounded-md shadow-sm amount focus:ring-primary-bg focus:border-primary-bg sm:max-w-xs sm:text-sm"
                        readonly>

                    @else
                    <label for=""
                    class="block col-span-1 col-start-1 row-span-2 font-medium text-md text-primary-bg sm:mt-px sm:pt-2">
                    Registration Fee
                     <svg xmlns=" http://www.w3.org/2000/svg" class="inline w-4 h-4 text-primary-bg"
                        @mouseover="hovered = true" @mouseleave="hovered=false" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                            d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z"
                            clip-rule="evenodd" />
                        </svg>
                    </label>
                    <div class="flex">
                                {{-- <h3 class="inline ml-1 text-sm text-gray-600 ">Registration Amount
                                </h3> --}}
                               
                    </div >
                    <div class="grid grid-cols-4 grid-rows-1">
                     <input type="number" min="0" wire:model.lazy="registration_amt"
                        class="block w-full min-w-full border-gray-300 rounded-md shadow-sm amount focus:ring-primary-bg focus:border-primary-bg sm:max-w-xs sm:text-sm">
                          @error('php artisn serve') <span class="text-red-700 error">{{ $message }}</span> @enderror
                   
                        </div >
                         <h3 x-show="hovered" x-cloak class="text-xs text-indigo-500">If amount is not 0 and "Has
                        Registration" checkbox is not checked. Registration amount will not be included in the
                        grand total</h3>
                    @endif  
          </div >       
                       
          </div >
        @endif
        @if (isset($travel_order))
             <button type="button" wire:click="editTravelOrder()" class="float-right px-3 py-1 mx-2 my-4 text-white border border-white rounded-lg bg-primary-500">
                        Save
            </button>
            @else
             <button type="submit" class="float-right px-3 py-1 mx-2 my-4 text-white border border-white rounded-lg bg-primary-500">
                        Submit
        </button>
        @endif
        
                        <button class="float-right px-3 py-1 mx-2 my-4 bg-white border rounded-lg text-primary-500 border-primary-500">
                        Cancel
                        </button>
    </div>
    </div>
         </div>
          
       
       
       </form>
    </div>
    
</div>

