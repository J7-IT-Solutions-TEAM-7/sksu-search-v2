<x-app-layout>
    <x-slot name="header">
        <nav class="flex" aria-label="Breadcrumb">
            <ol role="list" class="flex items-center space-x-4">


                <li>
                    <div class="flex items-center">
                        <a href="{{ route('trans') }}"
                            class="text-sm font-semibold text-primary-700 hover:text-primary-400">Transactions</a>

                        <svg class="h-5 w-5 ml-4 flex-shrink-0 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                    </div>
                </li>

                <li>
                    <div class="flex items-center">
                        <a href="{{ route('trans') }}"
                            class="text-sm font-semibold text-primary-700 hover:text-primary-400"
                            aria-current="page">Cash Advance</a>

                        <svg class="h-5 w-5 ml-4 flex-shrink-0 text-gray-300" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20" aria-hidden="true">
                            <path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
                        </svg>
                    </div>
                </li>
                <li>
                    <div class="flex items-center">
                        <a href="#" class="text-sm font-extrabold text-primary-500 capitalize"
                            aria-current="page">activity, program, project, <span class="uppercase">etc.</span></a>

                    </div>
                </li>
            </ol>
        </nav>

    </x-slot>
    
    <div class="px-4 sm:max-w-6xl mx-auto block py-2 ">
        @livewire('cash-advances.activity')
    </div>

</x-app-layout>
