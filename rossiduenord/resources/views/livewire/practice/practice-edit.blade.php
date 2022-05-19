<x-slot name="header">
	<x-page-header>
		Scheda Pratica
	</x-page-header>
</x-slot>
<x-card>
	<div>
		<div class="sm:hidden">
			<label for="tabs" class="sr-only">Select a tab</label>
			<select id="tabs" name="tabs"
			        class="block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
				@foreach($tabs as $k => $tab)
					<option @if($selectedTab === $k) selected @endif>{{ $tab }}</option>
				@endforeach

			</select>
				{{ $selectedTab }}
		</div>
		<div class="hidden sm:block">
			<div class="border-b border-gray-200">
				<nav class="-mb-px flex space-x-8" aria-label="Tabs">
					@foreach($tabs as $k => $tab)
						<div wire:click="$set('selectedTab', '{{$k}}')"
						     class="@if($selectedTab === $k) border-indigo-500 text-indigo-600 @else border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 @endif whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm cursor-pointer">
							{{ $tab }}
						</div>
					@endforeach
				</nav>
			</div>
		</div>
	</div>
	<x-card class="border rounded-md p-4">
		@switch($selectedTab)
			@case('applicant')
				<livewire:practice.tabs.applicant :practice="$practice" />
				@break
			@case('practice')
				Practice Content {{ $practice->id }}
				@break
			@case('subjects')
				Subjects Content
				@break
			@case('building')
				Building Content
				@break
			@case('media')
				Media Content
				@break
			@case('documents')
				Documents Content
				@break
			@case('superbonus')
				Superbonus Content
				@break
			@case('contracts')
				Contracts Content
				@break
			@case('policies')
				Policies Content
				@break
		@endswitch
	</x-card>
</x-card>