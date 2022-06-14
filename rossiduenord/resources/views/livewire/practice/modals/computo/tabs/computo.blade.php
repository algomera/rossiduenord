<x-card>
	<div class="grid grid-cols-10 gap-4">
		<div class="col-span-10 lg:col-span-2">
			<nav x-data="{open: false}"
			     class="space-y-0 space-x-2 lg:space-x-0 lg:space-y-2 flex flex-row overflow-x-auto lg:flex-col"
			     aria-label="Sidebar">
				@foreach($intervention_types as $intervention_type)
					<div @if($intervention_type['childs']) x-on:click="open = !open"
					     @else wire:click="$set('selectedTab', '{{$intervention_type['key']}}')" @endif
					     class="@if($intervention_type['key'] === $selectedTab) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer">
						<span class="truncate">{{ $intervention_type['label'] }}</span>
						<span class="text-gray-600 ml-auto py-0.5 px-3 text-xs rounded-full hidden lg:inline-block">
							<x-icon name="arrow-down" class="w-4 h-4 transition-transform" x-bind:class="open || '-rotate-90'"></x-icon>
						</span>
					</div>
					@if($intervention_type['childs'])
						<div x-show="open" x-collapse class="pl-2">
							@foreach($intervention_type['childs'] as $child)
								<div wire:click="$set('selectedTab', '{{$child['key']}}')"
								     class="@if($child['key'] === $selectedTab) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer">
									<span class="truncate">{{ $child['label'] }}</span>
								</div>
							@endforeach
						</div>
					@endif
				@endforeach
			</nav>
		</div>
		<div class="col-span-10 lg:col-span-8">
			<div class="bg-white">
				{{ $selectedTab }}
			</div>
		</div>
	</div>
</x-card>