<x-app-layout>
	<x-slot name="header">
		<nav class="flex" aria-label="Breadcrumb">
			<ol role="list" class="flex items-center space-x-4">
				<li>
					<div class="flex items-center">
						<a href="{{ route('mydashboard') }}" class="text-xl font-semibold text-primary-300 hover:text-primary-400">My
							Dashboard</a>

						<svg class="flex-shrink-0 w-5 h-5 ml-4 text-primary-300" xmlns="http://www.w3.org/2000/svg" fill="currentColor" stroke="currentColor" stroke-width="2"
							viewBox="0 0 20 20" aria-hidden="true">
							<path d="M5.555 17.776l8-16 .894.448-8 16-.894-.448z" />
						</svg>
					</div>
				</li>
				<li>
					<div class="flex items-center">
						<a href="#" class="text-xl font-extrabold capitalize text-primary-700" aria-current="page">travel orders</a>

					</div>
				</li>
			</ol>              
		</nav>
	</x-slot>

	<x-my-dashboard-wrapper>
		@livewire('mydashboard.travel-orders')
	</x-my-dashboard-wrapper>
</x-app-layout>
