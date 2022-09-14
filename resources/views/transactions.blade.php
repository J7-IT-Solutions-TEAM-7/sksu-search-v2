<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 capitalize">
            {{ __('transactions') }}
        </h2>
    </x-slot>

    <div class="px-4 sm:max-w-8xl mx-auto block py-2 ">
        <ul role="list" class="space-y-3 rounded-xl">
            <li class="px-6 my-2 w-full">
                <div class="block lg:flex justify-between">
                    <div class="sm:py-2 sm:w-full">
                        <a href="{{ route('travel-order') }}"
                            class="bg-primary-500 text-white text-sm py-2 px-4 rounded-xl inline-flex items-center p-3">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 mr-1">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            <span>Create Travel Order</span>
                        </a>
                    </div>
                    <div class="lg:flex justify-between gap-4 ">
                        <div class="my-1">
                            <a href="#"
                                class="bg-primary-500 text-white text-sm py-2 px-4 rounded-xl inline-flex items-center p-3">
                               
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                        class="w-5 h-5 mr-1">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M2.25 18L9 11.25l4.306 4.307a11.95 11.95 0 015.814-5.519l2.74-1.22m0 0l-5.94-2.28m5.94 2.28l-2.28 5.941" />
                                    </svg>
                                    <span>Liquidation</span>
                                
                            </a>
                        </div>
                        <div class="my-1">
                            <a href="#"
                                class="bg-primary-500 text-white text-sm py-2 px-4 rounded-xl inline-flex items-center p-3">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 mr-1">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8.625 9.75a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375m-13.5 3.01c0 1.6 1.123 2.994 2.707 3.227 1.087.16 2.185.283 3.293.369V21l4.184-4.183a1.14 1.14 0 01.778-.332 48.294 48.294 0 005.83-.498c1.585-.233 2.708-1.626 2.708-3.228V6.741c0-1.602-1.123-2.995-2.707-3.228A48.394 48.394 0 0012 3c-2.392 0-4.744.175-7.043.513C3.373 3.746 2.25 5.14 2.25 6.741v6.018z" />
                                </svg>
                                <span>Communication</span>
                            </a>
                        </div>
                    </div>
                </div>
            </li>

            <li class="overflow-hidden rounded-md mx-auto bg-transparent px-6 pb-4 pt-2 my-2">
                <span class="text-left block mb-3 text-xl">Disbursement Vouchers</span>
                <ul role="list" class="space-y-3 rounded-xl ">
                    {{-- Cash Advances --}}
                    <li class="py-4 overflow group hover:cursor-pointer rounded-md bg-white px-6 shadow"
                        x-data="{ open: false }">
                        <span class="text-left mb-2 group-hover:cursor-pointer block" x-on:click="open = !open">Cash
                            Advances</span>
                        <ul role="list"
                            class="rounded-xl bg-primary-300 text-white py-2 lg:flex gap-4 md:grid-cols-5 items-center"
                            x-cloak x-show="open">
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Local
                                    Travel</span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Foreign
                                    Travel</span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3 capitalize">
                                <a href="{{ route('ca-activity') }}"
                                    class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">activity,
                                    program, project, <span class="uppercase">etc.</span></a>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">payroll</span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">special
                                    disbursing officer</span>
                            </li>
                        </ul>
                    </li>
                    {{-- Reimbursements --}}
                    <li class="py-4 overflow-hidden group hover:cursor-pointer rounded-md bg-white px-6 shadow"
                        x-data="{ open: false }">
                        <span class="text-left mb-2 group-hover:cursor-pointer block"
                            x-on:click="open = !open">Reimbursements</span>
                        <ul role="list"
                            class="rounded-xl grid bg-primary-300 py-2 text-white lg:flex gap-4 md:grid-cols-5 items-center"
                            x-cloak x-show="open">
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Local
                                    Travel</span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Foreign
                                    Travel</span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">activity,
                                    program, project, <span class="uppercase">etc.</span></span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">supplies
                                    / materials</span>
                            </li>
                    </li>
                </ul>
            </li>
            {{-- Others --}}
            <li class="py-4 overflow-hidden group hover:cursor-pointer rounded-md bg-white px-6 shadow"
                x-data="{ open: false }">
                <span class="text-left mb-2 group-hover:cursor-pointer block" x-on:click="open = !open">Others</span>
                <ul role="list" class="h-32 overflow-y-auto rounded-xl bg-primary-300 py-2 text-white items-center" x-cloak
                    x-show="open">
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span
                            class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Individual
                            Compensation for Salary/Wage (COS/JO)</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Payroll
                            Compensation for Salaries/Wages (COS/JO)</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span
                            class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Utilities,
                            Fuel, Internet, Telephone, Etc.<span class="uppercase">etc.</span></span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Payment
                            to Contractors of Infrastructure Projects</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">
                       Individual Compensation for PS (Overload/Overtime/Honorarium/Requested Subject/Others)
                        </span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Payroll Compensation for PS (Overload/Overtime/Honorarium/Requested Subject/Others)</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Individual Compensation for Salary/Wage (Permanent/Temporary/Casual)</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Regular Payroll for Salaries/Wages (Permanent/Temporary/Casual)</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Individual Compensation for Part-Time Services</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Payroll Compensation for Part-Time Services</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Individual Salary/Wage (COS/JO/Laborer)</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Regular Payroll for Salaries/Wages (COS/JO/Laborer)</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Individual Pay/Honorarium for External Experts/Professionals (Activity/Project/Program-Based)</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Payroll Pay/Honorarium for External Experts/Professionals (Activity/Project/Program-Based)</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Individual Compensation for Special Allowances and Bonuses</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Payroll Compensation for Special Allowances and Bonuses</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Individual Compensation for Laborers, Student Assistants, Etc.</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Payroll Compensation for Laborers, Student Assistants, Etc.</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Remittance of Payroll Deductions</span>
                    </li>
                    <li class="overflow-hidden group hover:cursor-pointer flex rounded-md py-2 px-3  capitalize">
                        <span class="text-left group-hover:cursor-pointer hover:bg-primary-500 px-2 rounded-md">Remittance of Taxes Withheld</span>
                    </li>
            </li>
        </ul>
        </li>
        </ul>
    </div>
</x-app-layout>
