<x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 capitalize">
            {{ __('View Travel Order') }}
        </h2>
    </x-slot>
<div id="toPrint"
    class="grid h-full grid-cols-4 m-10 text-center bg-white divide-x-2 divide-gray-700 rounded-lg print:divide-y-4 print:rounded-none print:m-0 divide-solid"
    x-data="{showModal : @entangle('showModal'),showConfirmApproval : @entangle('showConfirmApproval'),showConfirmDisapproval : @entangle('showConfirmDisapproval'), showError : @entangle('showError'),show_Banner :@entangle('showBanner')}"
    x-init="$watch('show_Banner', value => {
        if(value == true){
            setTimeout(function(){ show_Banner = false;}, 5000);
           
        }
    }), $watch('showConfirmApproval', value => {
        if(value == true){
            setTimeout(function(){ showConfirmApproval = false;}, 3000);
           
        }
    }), $watch('showConfirmDisapproval', value => {
        if(value == true){
            setTimeout(function(){ showConfirmDisapproval = false;}, 5000);
           
        }
    })">

    <div class="col-span-2">
   <div class="flex justify-between w-full p-6 border-b-4 border-black print:flex">
          
            <div id="header" class="flex w-full ml-3 text-left">
                <div class="inline my-auto"><img src="http://sksu.edu.ph/wp-content/uploads/2020/09/512x512-1.png"
                    alt="sksu logo" class="object-scale-down w-20 h-full">
            </div>
                <div class="my-auto ml-3">
                    <div class="block">
                        <span class="text-sm font-semibold tracking-wide text-left text-black">Republic of the
                            Philippines</span>
                    </div>
                    <div class="block">
                        <span class="text-sm font-semibold tracking-wide text-left uppercase text-primary-600">sultan
                            kudarat
                            state university</span>
                    </div>
                    <div class="block">
                        <span class="text-sm font-semibold tracking-wide text-black">ACCESS, EJC Montilla, 9800 City of
                            Tacurong</span>
                    </div>
                    <div class="block">
                        <span class="text-sm font-semibold tracking-wide text-black">Province of Sultan Kudarat</span>
                    </div>
                </div>
            </div>
            <div class="relative right-0">
                <div class="m-auto">
                <img src="https://api.qrserver.com/v1/create-qr-code/?data={{$travel_order->tracking_code}}&amp;size=100x100" alt="" title="" />
                    {{-- {!! QrCode::size(100)->margin(2)->backgroundColor(0, 0, 0,0)->generate((string)$travel_order->tracking_code); !!} --}}
                </div>
            </div>
        </div>

        @if (isset($travel_order))
        @if ($travel_order->isDraft == true)
        <div class="w-full">
            <div class="m-6 divide-y divide-black divide-solid print:divide-y-2">
                <div class="flex items-start w-full h-auto p-6 print:block ">
                    <div id="header" class="items-start block w-full space-y-4 text-left">
                        <div class="block">
                            <span
                                class="text-sm font-semibold tracking-wide text-left text-black">{{ $travel_order->created_at == '' ? 'Date Not Set':$travel_order->created_at->format('F d, Y') }}</span>
                        </div>
                        <div class="flex">
                            <span
                                class="mx-auto text-5xl font-extrabold tracking-wide text-black uppercase print:text-xl">travel
                                order</span>
                        </div>
                        <div class="grid grid-cols-4 ">
                            <span class="col-span-1 text-sm font-semibold tracking-wide text-black uppercase">Memorandum
                                to:</span>
                            <div class="col-span-1 text-sm font-semibold tracking-wide text-black uppercase">
                                @if(isset($applicants))
                                @foreach ($applicants as $applicant)
                                <span class="block">{{ $applicant->employee_information->full_name }}</span>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div> 
                <div id="contents" class="flex w-full h-auto px-6 pt-10 print:pt-5">
                    <div id="header" class="items-start block w-full space-y-4 text-left">
                        <div class="flex-wrap block -space-y-1">
                            <span class="font-semibold tracking-wide text-left text-black text-md">You are hereby
                                directed
                                to proceed to <strong>
                                    @if ($travel_order->others!="")
                                    {{$travel_order->others == '' ? '':$travel_order->others}},
                                    {{$travel_order->philippine_cities_id == '' ? 'City Not Set': $travel_order->city->city_municipality_description}},
                                    {{$travel_order->philippine_provinces_id == 0 ? 'Province Not Set':$travel_order->province->province_description}},
                                    {{$travel_order->philippine_regions_id == 0 ? 'City Not Set':$travel_order->region->region_description }}
                                    @else
                                    {{$travel_order->philippine_cities_id == 0 ? 'City Not Set': $travel_order->city->city_municipality_description}},
                                    {{$travel_order->philippine_provinces_id == 0 ? 'Province Not Set':$travel_order->province->province_description}},
                                    {{$travel_order->philippine_regions_id == 0 ? 'Region Not Set':$travel_order->region->region_description }}
                                    @endif
                                </strong> on the <strong class="underline">
                                    @if ($travel_order->date_of_travel_from == $travel_order->date_of_travel_to)
                                    @if ($travel_order->date_of_travel_from != '')
                                    {{Carbon\Carbon::createFromFormat('Y-m-d',$travel_order->date_of_travel_from)->format('jS').' of '.Carbon\Carbon::createFromFormat('Y-m-d',$travel_order->date_of_travel_from)->format('F Y')}}
                                    @endif
                                @else
                                    @if ($travel_order->date_of_travel_from != '' && $travel_order->date_of_travel_from != '')
                                    <strong
                                        class="underline">{{ Carbon\Carbon::createFromFormat('Y-m-d',$travel_order->date_of_travel_from)->format('jS').' of '.Carbon\Carbon::createFromFormat('Y-m-d',$travel_order->date_of_travel_from)->format('F Y')}}</strong> to <strong
                                        class="underline">{{ Carbon\Carbon::createFromFormat('Y-m-d',$travel_order->date_of_travel_to)->format('jS').' of '.Carbon\Carbon::createFromFormat('Y-m-d',$travel_order->date_of_travel_to)->format('F Y')}}</strong>
                                   
                                    @endif
                                @endif
                                   
                            </strong>
                            to do the following:
                            </span>
                            <span
                                class="block pl-5 font-semibold tracking-wide text-left text-black whitespace-pre-line text-md">
                                {{$travel_order->purpose == '' ? 'Purpose not Found': $travel_order->purpose}}
                            </span>
                            @if (isset($signatories))
                            @foreach ($signatories as $signatory)
                            <span class="block pt-16 font-semibold tracking-wide text-center text-black text-md">
                                {{ $signatory->employee_information->full_name}}
                            </span>

                            @php
                            $sigpositions = App\Models\Office::orWhere('admin_user_id','=',$signatory->user_id)->orWhere('head_id','=',$signatory->user_id)->get();
                            $campuses = App\Models\Campus::orWhere('admin_user_id','=',$signatory->user_id)->get();
                            $campusCount= count($campuses);
                            $posCount= count($sigpositions);
                            @endphp
                            <span class="block pt-3 font-semibold tracking-wide text-center text-black text-md">
                                @if ($campusCount >= 1)
                              
                                @foreach ($campuses as $campus)

                                @if (strtoupper($campus->name)=="PRESIDENT'S OFFICE")
                                @if ($campusCount==$loop->index+1)
                                {{ $signatory->employee_information->position->position_desc}}
                                @else
                                {{ $signatory->employee_information->position->position_desc}} /
                                @endif
                                @else
                                @if ($campusCount==$loop->index+1)
                                {{ $signatory->employee_information->position->position_desc}} of {{ $campus->name}} Campus
                                @else
                                {{ $signatory->employee_information->position->position_desc}} of {{ $campus->name}} /
                                @endif
                                @endif

                                @endforeach

                                @elseif ($campusCount == 0 && $posCount >= 1)
                                @foreach ($sigpositions as $sigpos)
                               
                                @if (strtoupper($sigpos->office_name)=="PRESIDENT'S OFFICE")
                                @if ($posCount==$loop->index+1)
                                {{ $signatory->employee_information->position->position_desc}}
                                @else
                                {{ $signatory->employee_information->position->position_desc}} /
                               
                                @endif
                                @else
                                @if ($posCount==$loop->index+1)
                                {{ $signatory->employee_information->position->position_desc}} of {{ $sigpos->employee_information->office->office_name}}
                                @else
                                {{ $signatory->employee_information->position->position_desc}} of {{ $sigpos->employee_information->office->office_name}} /
                                @endif
                                @endif

                                @endforeach
                                @endif

                            </span>
                            @endforeach

                            @endif


                        </div>
                    </div>
                </div>

            </div>

        </div>
        @else
        <div class="w-full">
            <div class="m-6 divide-y divide-black divide-solid print:divide-y-2">
                <div class="flex items-start w-full h-auto p-6 print:block ">
                    <div id="header" class="items-start block w-full space-y-4 text-left">
                        <div class="block">
                            <span
                                class="text-sm font-semibold tracking-wide text-left text-black">{{ $travel_order->created_at->format('F d, Y') }}</span>
                        </div>
                        <div class="flex">
                            <span
                                class="mx-auto text-5xl font-extrabold tracking-wide text-black uppercase print:text-xl">travel
                                order</span>
                        </div>
                        <div class="grid grid-cols-4 ">
                            <span class="col-span-1 text-sm font-semibold tracking-wide text-black uppercase">Memorandum
                                to:</span>
                            <div class="col-span-1 text-sm font-semibold tracking-wide text-black uppercase">
                                @foreach ($applicants as $applicant)
                                <span class="block">{{ $applicant->employee_information->full_name }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div id="contents" class="flex w-full h-auto px-6 pt-10 print:pt-5">
                    <div id="header" class="items-start block w-full space-y-4 text-left">
                        <div class="flex-wrap block -space-y-1">
                            <span class="font-semibold tracking-wide text-left text-black text-md">You are hereby
                                directed
                                to proceed <strong>
                                    @if ($travel_order->others!="")
                                    {{$travel_order->others}}, {{$travel_order->city->city_municipality_description}},
                                    {{$travel_order->province->province_description}},
                                    {{ $travel_order->region->region_description }}
                                    @else
                                    {{$travel_order->city->city_municipality_description}},
                                    {{$travel_order->province->province_description}},
                                    {{ $travel_order->region->region_description }}
                                    @endif
                                </strong> on the <strong
                                    class="underline">{{ Carbon\Carbon::createFromFormat('Y-m-d',$travel_order->date_of_travel_from)->format('jS').' of '.Carbon\Carbon::createFromFormat('Y-m-d',$travel_order->date_of_travel_from)->format('F Y')}}</strong>
                                to do the following:
                            </span>
                            <span
                                class="block pl-5 font-semibold tracking-wide text-left text-black whitespace-pre-line text-md">
                                {{ $travel_order->purpose}}
                            </span>
                            @foreach ($signatories as $signatory)
                            <span class="block pt-16 font-semibold tracking-wide text-center text-black text-md">
                                {{ $signatory->employee_information->full_name}}
                            </span>

                            @php
                            $sigpositions = App\Models\Office::orWhere('admin_user_id','=',$signatory->user_id)->orWhere('head_id','=',$signatory->user_id)->get();
                            $campuses = App\Models\Campus::orWhere('admin_user_id','=',$signatory->user_id)->get();
                            $campusCount= count($campuses);
                            $posCount= count($sigpositions);
                            @endphp
                            <span class="block pt-3 font-semibold tracking-wide text-center text-black text-md">
                                @if ($campusCount >= 1)

                                @foreach ($campuses as $campus)

                                @if (strtoupper($campus->name)=="PRESIDENT'S OFFICE")
                                @if ($campusCount==$loop->index+1)
                                {{ $signatory->employee_information->position->position_desc}}
                                @else
                                {{ $signatory->employee_information->position->position_desc}} /
                                @endif
                                @else
                                @if ($campusCount==$loop->index+1)
                                {{ $signatory->employee_information->position->position_desc}} of {{ $campus->name}} Campus
                                @else
                                {{ $signatory->employee_information->position->position_desc}} of {{ $campus->name}} /
                                @endif
                                @endif

                                @endforeach

                                @elseif ($campusCount == 0 && $posCount >= 1)
                                @foreach ($sigpositions as $sigpos)

                                @if (strtoupper($sigpos->office_name)=="PRESIDENT'S OFFICE")
                                @if ($posCount==$loop->index+1)
                                {{ $signatory->employee_information->position->position_desc}}
                                @else
                                {{ $signatory->employee_information->position->position_desc}} /
                                @endif
                                @else
                                @if ($posCount==$loop->index+1)
                                {{ $signatory->employee_information->position->position_desc}} of {{ $sigpos->office_name}}
                                @else
                                {{ $signatory->employee_information->position->position_desc}} of {{ $sigpos->office_name}} /
                                @endif
                                @endif

                                @endforeach
                                @endif

                            </span>
                            @endforeach


                        </div>
                    </div>
                </div>

            </div>

        </div>
        @endif
         @if ($travel_order->isDraft == true)
        <button wire:click="deleteTO('{{ $travel_order->to_type }}')" id="printto"
            class="max-w-sm px-4 py-2 font-semibold tracking-wider text-white bg-red-500 rounded-full w-sm hover:bg-red-200 hover:text-primary-500 active:bg-primary-500 active:text-white">Delete
            Travel Order</button>
        <a href="{{route('travel-order', ['id'=>3,'isEdit'=>1,'travelOrderID'=>$travelorderID])}}" target="_blank"
            id="printto"
            class="max-w-sm px-4 py-2 font-semibold tracking-wider text-white rounded-full w-sm bg-primary-500 hover:bg-primary-200 hover:text-primary-500 active:bg-primary-700 active:text-white">Edit
            Travel Order</a>
        @else
        @if ($isSignatory==1)
        <button wire:click="declineTO('{{ $travel_order->to_type }}')" id="decline"
            class="max-w-sm px-4 py-2 font-semibold tracking-wider text-white bg-red-500 rounded-full w-sm hover:bg-red-200 hover:text-primary-500 active:bg-primary-500 active:text-white">Decline
            Travel Order</button>
        <button wire:click="approveTO('{{ $travel_order->to_type }}')" id="approve"
            class="max-w-sm px-4 py-2 font-semibold tracking-wider text-white rounded-full bg-primary-500 w-sm hover:bg-indigo-200 hover:text-primary-500 active:bg-primary-500 active:text-white">Approve
            Travel Order</button>
        <button x-on:click="showModal = true" id="side_note_show"
            class="max-w-sm px-4 py-2 font-semibold tracking-wider text-white bg-indigo-800 rounded-full w-sm hover:bg-indigo-200 hover:text-primary-500 active:bg-primary-500 active:text-white">Add
            Side Note</button>
        @else
         <a href="{{route('print-to', [$travelorderID])}}" target="_blank" id="printto"
            class="max-w-sm px-4 py-2 font-semibold tracking-wider text-white rounded-full w-sm bg-primary-500 hover:bg-primary-200 hover:text-primary-500 active:bg-primary-700 active:text-white">Print
            Travel Order</a>
        @endif
        @endif
        @else
        <div class="w-full">
            <div class="m-6 divide-y divide-black divide-solid print:divide-y-2">
                <div class="flex py-10 my-auto">
                    <span
                        class="mx-auto text-5xl font-extrabold tracking-wide text-black uppercase print:text-xl">travel
                        order not found</span>
                </div>
            </div>

        </div>
        <a href="{{route('redirect')}}" id="printto"
            class="max-w-sm px-4 py-2 font-semibold tracking-wider rounded-full w-sm bg-primary-500 text-primary-200 hover:bg-primary-200 hover:text-primary-500 active:bg-primary-700 active:text-white">Go
            to dashboard</a>
        @endif

</div>



<div class="col-span-1 p-4 overflow-y-auto text-left h-screen-80">
        <span class="text-lg font-semibold tracking-wider text-left uppercase text-primary-700">Side Notes</span>
        <div class="">
            <div class="flow-root mt-6">
                <ul role="list" class="-my-5 divide-y divide-gray-200">
                    @if (isset($side_notes))
                    @if (count($side_notes)>0)
                    @foreach ($side_notes as $side_note)
                    <li class="py-5">
                        <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                            <div class="flex justify-between text-sm font-semibold text-gray-800">
                                <div class="flex ">
                                    <!-- Extend touch target to entire panel -->
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    {{ $side_note->employee_information->full_name }}
                                </div>
                                <div class="flex">
                                    <!-- Extend touch target to entire panel -->
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    {{ $side_note->created_at->diffForHumans() }}
                                </div>
                            </div>
                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">{{ $side_note->message }}</p>
                        </div>
                    </li>
                    @endforeach
                    @else
                    <li class="py-5">
                        <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                            <h3 class="text-sm font-semibold text-gray-800">
                                <a href="#" class="hover:underline focus:outline-none">
                                    <!-- Extend touch target to entire panel -->
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    Hi {{ auth()->user()->name }}!
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">We found no side note(s) for this travel
                                order! Have a nice day!</p>
                        </div>
                    </li>
                    @endif
                    @else
                    <li class="py-5">
                        <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                            <h3 class="text-sm font-semibold text-gray-800">
                                <a href="#" class="hover:underline focus:outline-none">
                                    <!-- Extend touch target to entire panel -->
                                    <span class="absolute inset-0" aria-hidden="true"></span>
                                    Hi {{ auth()->user()->name }}!
                                </a>
                            </h3>
                            <p class="mt-1 text-sm text-gray-600 line-clamp-2">We found no side note(s) for this travel
                                order! Have a nice day!</p>
                        </div>
                    </li>
                    @endif



                </ul>
            </div>
            @if ($sideNoteNumber < $side_notes_count)
            <div class="mt-6">
                <button x-on:click="$wire.set('sideNoteNumber',$wire.sideNoteNumber+5)"
                    class="flex items-center justify-center w-full px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md shadow-sm hover:bg-gray-50">
                    View More
                </button>
           </div>
        @endif
    </div>

    <div class="col-span-1 p-4 text-left" >
    <span class="text-lg font-semibold tracking-wider text-left uppercase text-primary-700">Approval Status </span>
    <div class="">
        <div class="flow-root mt-6">
            <ul role="list" class="-my-5 divide-y divide-gray-200">
                @if (isset($signatories))
                @if (count($signatories)>0)
                @foreach ($signatories as $signatory)
                <li class="py-5">
                    <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                        <div class="flex justify-between text-sm font-semibold text-gray-800">
                            <div class="flex ">
                                <!-- Extend touch target to entire panel -->
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                {{ $signatory->employee_information->full_name }}
                            </div>
                            <div class="flex">
                                <!-- Extend touch target to entire panel -->
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                {{ $signatory->updated_at->diffForHumans() }}
                            </div>
                        </div>
                        @if ($signatory->approval_status == 'pending')
                        <p class="mt-1 text-sm text-gray-700 line-clamp-2">Approval from {{ $signatory->employee_information->full_name }} is
                            still <strong class="italic text-yellow-600 uppercase">pending</strong>. </p>
                        @elseif ($signatory->approval_status == 'approved')
                        <p class="mt-1 text-sm text-gray-700 line-clamp-2">{{ $signatory->employee_information->full_name }} has <strong
                                class="italic text-green-700 uppercase">approved</strong> of this travel order! </p>
                        @elseif ($signatory->approval_status == 'declined')
                        <p class="mt-1 text-sm text-gray-700 line-clamp-2">{{ $signatory->employee_information->full_name }} has <strong
                                class="italic text-red-500 uppercase">Vetoed/declined</strong> this travel order.*See
                            side notes(if any) </p>
                        @endif

                    </div>
                </li>
                @endforeach
                @else
                <li class="py-5">
                    <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                        <h3 class="text-sm font-semibold text-gray-800">
                            <a href="#" class="hover:underline focus:outline-none">
                                <!-- Extend touch target to entire panel -->
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                Hi {{ auth()->user()->name }}!
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 line-clamp-2">We found no side note(s) for this travel
                            order! Have a nice day!</p>
                    </div>
                </li>
                @endif
                @else
                <li class="py-5">
                    <div class="relative focus-within:ring-2 focus-within:ring-indigo-500">
                        <h3 class="text-sm font-semibold text-gray-800">
                            <a href="#" class="hover:underline focus:outline-none">
                                <!-- Extend touch target to entire panel -->
                                <span class="absolute inset-0" aria-hidden="true"></span>
                                Hi {{ auth()->user()->name }}!
                            </a>
                        </h3>
                        <p class="mt-1 text-sm text-gray-600 line-clamp-2">We found no side note(s) for this travel
                            order! Have a nice day!</p>
                    </div>
                </li>
                @endif



            </ul>
        </div>

    </div>
</div>



</div>



</div>


