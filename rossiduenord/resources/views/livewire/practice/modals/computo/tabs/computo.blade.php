<x-card>
	<div class="grid grid-cols-10 gap-4">
		<div class="col-span-10 lg:col-span-2">
			<x-section-heading class="!border-t-0 !pt-0">Stato dei lavori:</x-section-heading>
			<nav class="space-y-0 space-x-2 lg:space-x-0 lg:space-y-2 flex flex-row overflow-x-auto lg:flex-col"
			     aria-label="Sidebar">
				@foreach($intervention_types as $k => $intervention_type)
					<div wire:click="$set('selectedTab', '{{$k}}')"
					     class="@if($k === $selectedTab) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer">
						<span class="truncate">{{ $intervention_type }}</span>
					</div>
				@endforeach
			</nav>
		</div>
	</div>
</x-card>