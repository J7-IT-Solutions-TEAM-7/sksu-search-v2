<div x-data="{ opensidebar: false }" x-cloak>
	<!-- Off-canvas menu for mobile, show/hide based on off-canvas menu state. -->
	<div class="relative z-40 md:hidden" role="dialog" aria-modal="true">

		<div class="fixed inset-0 bg-opacity-75 bg-primary-600" x-transition-enter="transition-opacity ease-linear duration-300"
			x-transition-enter-start="opacity-0" x-transition-enter-end="opacity-100"
			x-transition-leave="transition-opacity ease-linear duration-300" x-transition-leave-start="opacity-100"
			x-transition-leave-end="opacity-0" x-show="opensidebar"></div>

		<div class="fixed inset-0 z-40 flex">
			<div class="relative flex flex-col flex-1 w-full max-w-xs bg-primary-400"
				x-transition-enter="transition ease-in-out duration-300 transform" x-transition-enter-start="-translate-x-full"
				x-transition-enter-end="translate-x-0" x-transition-leave="transition ease-in-out duration-300 transform"
				x-transition-leave-start="translate-x-0" x-transition-leave-end="-translate-x-full" x-show='opensidebar'>
				<div class="absolute top-0 right-0 pt-2 -mr-12" x-transition-enter="ease-in-out duration-300"
					x-transition-enter-start="opacity-0" x-transition-enter-end="opacity-100"
					x-transition-leave="ease-in-out duration-300" x-transition-leave-start="opacity-100"
					x-transition-leave-end="opacity-0" x-show='opensidebar'>
					<button type="button"
						class="flex items-center justify-center w-10 h-10 ml-1 rounded-full focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white">
						<span class="sr-only">Close sidebar</span>
						<!-- Heroicon name: outline/x-mark -->
						<svg class="w-6 h-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
							stroke-width="1.5" stroke="currentColor" aria-hidden="true">
							<path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
						</svg>
					</button>
				</div>

				<div class="flex-1 h-0 pt-5 pb-4 overflow-y-auto">

					<nav class="px-2 mt-5 space-y-1">
						<!-- Current: "bg-indigo-800 text-white", Default: "text-white hover:bg-indigo-600 hover:bg-opacity-75" -->
						<a href="#"
							class="flex items-center px-2 py-2 text-base font-medium text-white bg-indigo-800 rounded-md group">
							<!-- Heroicon name: outline/home -->
							<svg class="flex-shrink-0 w-6 h-6 mr-4 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
								viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
							</svg>
							Dashboard
						</a>
                        

						<a href="#"
							class="flex items-center px-2 py-2 text-base font-medium text-white rounded-md group hover:bg-indigo-600 hover:bg-opacity-75">
							<!-- Heroicon name: outline/users -->
							<svg class="flex-shrink-0 w-6 h-6 mr-4 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
								viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
							</svg>
							Team
						</a>

						<a href="#"
							class="flex items-center px-2 py-2 text-base font-medium text-white rounded-md group hover:bg-indigo-600 hover:bg-opacity-75">
							<!-- Heroicon name: outline/folder -->
							<svg class="flex-shrink-0 w-6 h-6 mr-4 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
								viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
							</svg>
							Projects
						</a>

						<a href="#"
							class="flex items-center px-2 py-2 text-base font-medium text-white rounded-md group hover:bg-indigo-600 hover:bg-opacity-75">
							<!-- Heroicon name: outline/calendar -->
							<svg class="flex-shrink-0 w-6 h-6 mr-4 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
								viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
							</svg>
							Calendar
						</a>

						<a href="#"
							class="flex items-center px-2 py-2 text-base font-medium text-white rounded-md group hover:bg-indigo-600 hover:bg-opacity-75">
							<!-- Heroicon name: outline/inbox -->
							<svg class="flex-shrink-0 w-6 h-6 mr-4 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
								viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
							</svg>
							Documents
						</a>

						<a href="#"
							class="flex items-center px-2 py-2 text-base font-medium text-white rounded-md group hover:bg-indigo-600 hover:bg-opacity-75">
							<!-- Heroicon name: outline/chart-bar -->
							<svg class="flex-shrink-0 w-6 h-6 mr-4 text-indigo-300" xmlns="http://www.w3.org/2000/svg" fill="none"
								viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
								<path stroke-linecap="round" stroke-linejoin="round"
									d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
							</svg>
							Reports
						</a>
					</nav>
				</div>
			</div>

			<div class="flex-shrink-0 w-14" aria-hidden="true">
				<!-- Force sidebar to shrink to fit close icon -->
			</div>
		</div>
	</div>

	<!-- Static sidebar for desktop -->
	<div class="hidden md:fixed md:flex md:h-full md:w-64 md:flex-col">
		<!-- Sidebar component, swap this element with another sidebar if you like -->
		<div class="flex flex-col flex-1 min-h-0 bg-white shadow-lg">
			<div class="flex flex-col flex-1 pt-5 pb-4 overflow-y-auto">

				<nav class="flex-1 px-2 mt-5 space-y-1">
					
                    <x-sidenav-link href="{{ route('mydashboard') }}" :active="request()->routeIs('mydashboard')">
                        My Dashboard
                    </x-sidenav-link>
					<div class="space-y-1" x-data="{ open: false }">
						<!-- Current: "bg-primary-100 text-primary-900", Default: "bg-white text-primary-600 hover:bg-primary-50 hover:text-primary-900" -->
						<button x-on:click="open=!open" type="button"
							class="flex items-center w-full py-2 pr-2 text-sm font-medium text-left bg-white rounded-md text-primary-600 group hover:bg-primary-50 hover:text-primary-900 focus:outline-none focus:ring-2 focus:ring-primary-500"
							aria-controls="sub-menu-1" aria-expanded="false">
							<!-- Expanded: "text-primary-400 rotate-90", Collapsed: "text-primary-300" -->
							<svg
								:class="open ?
								    'rotate-90 flex-shrink-0 w-5 h-5 mr-2 text-primary-300 transition-colors duration-150 ease-in-out transform group-hover:text-primary-400' :
								    'flex-shrink-0 w-5 h-5 mr-2 text-primary-300 transition-colors duration-150 ease-in-out transform group-hover:text-primary-400'"
								class="" viewBox="0 0 20 20" aria-hidden="true">
								<path d="M6 6L14 10L6 14V6Z" fill="currentColor" />
							</svg>
							Disbursement Vouchers
						</button>
						<!-- Expandable link section, show/hide based on state. -->
						<div class="space-y-1" id="sub-menu-1" x-show="open">
							<a href="#"
								class="flex items-center w-full py-2 pl-10 pr-2 text-sm font-medium rounded-md text-primary-600 group hover:bg-primary-100 hover:text-primary-900">Pending
								Disbursement Vouchers</a>
							<a href="#"
								class="flex items-center w-full py-2 pl-10 pr-2 text-sm font-medium rounded-md text-primary-600 group hover:bg-primary-100 hover:text-primary-900">Unliquidated
								Disbursement Vouchers</a>
							<a href="#"
								class="flex items-center w-full py-2 pl-10 pr-2 text-sm font-medium rounded-md text-primary-600 group hover:bg-primary-100 hover:text-primary-900">Closed
								Disbursement Vouchers</a>
						</div>
                        <x-sidenav-link href="{{ route('mytravelorders') }}" :active="request()->routeIs('mytravelorders')">
                            Travel Orders
                        </x-sidenav-link>
					</div>
				</nav>
			</div>
		</div>
	</div>
	<div class="flex flex-col flex-1 md:pl-64">
		<div class="sticky top-0 z-10 pt-1 pl-1 bg-primary-100 sm:pl-3 sm:pt-3 md:hidden">
			<button type="button" x-on:click="opensidebar = true"
				class="-ml-0.5 -mt-0.5 inline-flex h-12 w-12 items-center justify-center rounded-md text-primary-500 hover:text-primary-900 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-indigo-500">
				<span class="sr-only">Open sidebar</span>
				<!-- Heroicon name: outline/bars-3 -->
				<svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
					stroke="currentColor" aria-hidden="true">
					<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
				</svg>
			</button>
		</div>
		<main class="flex-1">
			<div class="py-6">
				<div class="max-w-full px-4 mx-auto sm:px-6 md:px-8">
					{{ $slot }}
				</div>
			</div>
		</main>
	</div>
</div>
