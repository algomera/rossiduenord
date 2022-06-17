<div class="grid grid-cols-10 gap-4">
	<div class="col-span-10 lg:col-span-2">
		<x-select wire:model="selectedPriceList" name="price_list" id="price_list">
			@foreach($price_lists as $k => $price_list)
				<option wire:key="{{$k}}" value="{{$price_list->id}}">{{$price_list->name}}</option>
			@endforeach
		</x-select>
		<nav class="space-y-0 space-x-2 lg:space-x-0 lg:space-y-2 flex flex-row overflow-x-auto lg:flex-col"
		     aria-label="Sidebar">
			<x-computo-folder-loop :items="$tree" :selected="$selected"></x-computo-folder-loop>
		</nav>
	</div>
	<div class="col-span-10 lg:col-span-8">
		<div class="bg-white">
			Prezzario selezionato: {{ $selectedPriceList }}
			<br>
			Voce selezionata: {{ $selected }}
			----
			<br>
			@foreach($price_list_rows as $row)
				<p>{{ $row->code }}</p>
			@endforeach
		</div>
	</div>
</div>