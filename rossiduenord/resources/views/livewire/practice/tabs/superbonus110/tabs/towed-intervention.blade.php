<x-card>
	<div class="grid grid-cols-10 gap-4">
		<div class="col-span-10 lg:col-span-2">
			<div class="lg:hidden">
				<label for="tabs" class="sr-only">Select a tab</label>
				<select wire:model="selectedTab" wire:ignore id="tabs" name="tabs"
				        class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
					@foreach($tabs as $k => $tab)
						<option @if($selectedTab == $k) selected @endif value="{{ $k }}">{{ $tab }}</option>
					@endforeach
				</select>
			</div>
			<nav class="hidden space-y-0 space-x-2 lg:space-x-0 lg:space-y-2 lg:flex flex-row overflow-x-auto lg:flex-col"
			     aria-label="Sidebar">
				@foreach($tabs as $k => $tab)
					<div wire:click="$set('selectedTab', '{{$k}}')"
					     class="@if($k == $selectedTab) bg-gray-100 text-gray-900 @else text-gray-600 hover:bg-gray-50 hover:text-gray-900 @endif flex items-center px-3 py-2 text-sm font-medium rounded-md cursor-pointer">
						<span class="truncate">{{ $tab }}</span>
					</div>
				@endforeach
			</nav>
		</div>
		<div class="col-span-10 lg:col-span-8">
			@switch($selectedTab)
				@case(0)
					<livewire:practice.tabs.superbonus110.tabs.towed-intervention.show :practice="$practice"
					                                                                   :currentSurface="$currentSurface"
					                                                                   :is_common="1"/>
					@break
				@default
					<livewire:practice.tabs.superbonus110.tabs.towed-intervention.show :practice="$practice"
					                                                                   :currentSurface="$currentSurface"
					                                                                   :condomino_id="$selectedTab"/>
					@break
			@endswitch
		</div>
	</div>
</x-card>