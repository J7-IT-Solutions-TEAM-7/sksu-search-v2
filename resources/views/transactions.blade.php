<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 capitalize">
            {{ __('transactions') }}
        </h2>
    </x-slot>

    <div class="px-4 sm:max-w-8xl mx-auto block py-2 ">
        <ul role="list" class="space-y-3 rounded-xl">
            <li class="overflow-hidden hover:cursor-pointer flex hover:bg-primary-600 rounded-md bg-transparent px-6 my-2">
                <a href="#" class="text-left flex" >Create Travel Order</a>
            </li>
            <li class="overflow-hidden rounded-md mx-auto bg-transparent px-6 pb-4 pt-2 my-2">
                <span class="text-left block">Disbursement Vouchers</span>
                <ul role="list" class="space-y-3 rounded-xl ">

                    <li class="py-4 overflow-hidden group hover:cursor-pointer rounded-md bg-white px-6 shadow"
                        x-data="{ open: false }">
                        <span class="text-left group-hover:cursor-pointer block" x-on:click="open = !open">Cash
                            Advances</span>
                        <ul role="list"
                            class="rounded-xl grid bg-primary-100 py-2 grid-cols-1 md:grid-cols-5 items-center" x-cloak
                            x-show="open">
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md px-3 my-1 capitalize">
                                <span class="text-left group-hover:cursor-pointer hover:bg-white px-2 rounded-md">Local
                                    Travel</span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md px-3 my-1 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-white px-2 rounded-md">Foreign
                                    Travel</span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md px-3 my-1 capitalize">
                                <spanppppppppppppppppp
                                    class="text-left group-hover:cursor-pointer hover:bg-white px-2 rounded-md">activity,
                                    program, project, <span class="uppercase">etc.</span></span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md px-3 my-1 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-white px-2 rounded-md">payroll</span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md px-3 my-1 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-white px-2 rounded-md">special
                                    disbursing officer</span>
                            </li>
                        </ul>
                    </li>
                    <li class="py-4 overflow-hidden group hover:cursor-pointer rounded-md bg-white px-6 shadow"
                        x-data="{ open: false }">
                        <span class="text-left group-hover:cursor-pointer block"
                            x-on:click="open = !open">Reimbursements</span>
                        <ul role="list"
                            class="rounded-xl grid bg-primary-100 py-2 grid-cols-1 md:grid-cols-5 items-center" x-cloak
                            x-show="open">
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md px-3 my-1 capitalize">
                                <span class="text-left group-hover:cursor-pointer hover:bg-white px-2 rounded-md">Local
                                    Travel</span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md px-3 my-1 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-white px-2 rounded-md">Foreign
                                    Travel</span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md px-3 my-1 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-white px-2 rounded-md">activity,
                                    program, project, <span class="uppercase">etc.</span></span>
                            </li>
                            <li class="overflow-hidden group hover:cursor-pointer flex rounded-md px-3 my-1 capitalize">
                                <span
                                    class="text-left group-hover:cursor-pointer hover:bg-white px-2 rounded-md">supplies
                                    / materials</span>
                            </li>
                    </li>
                </ul>
            </li>
        </ul>
        </li>
        </ul>
    </div>
</x-app-layout>
