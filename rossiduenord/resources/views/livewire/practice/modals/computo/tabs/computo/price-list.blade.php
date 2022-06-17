<div class="grid grid-cols-10 gap-4">
	<div class="col-span-10 lg:col-span-2">
		<x-select wire:model="selectedPriceList" name="price_list" id="price_list">
			@foreach($price_lists as $k => $price_list)
				<option  wire:ignore wire:key="{{$price_list->id}}" value="{{$price_list->id}}">{{$price_list->name}}</option>
			@endforeach
		</x-select>
		<nav class="space-y-0 space-x-2 lg:space-x-0 lg:space-y-2 flex flex-row overflow-x-auto lg:flex-col"
		     aria-label="Sidebar">
			<x-price-list-folder-loop :items="$tree" :selected="$selected"></x-price-list-folder-loop>
		</nav>
	</div>
	<div class="col-span-10 lg:col-span-8">
		<div class="bg-white">
			@if($selected)
			<x-table.table>
				<x-table.thead>
					<x-table.th>Codice E.P.</x-table.th>
					<x-table.th>Descrizione</x-table.th>
					<x-table.th>U.M.</x-table.th>
					<x-table.th>Prezzo</x-table.th>
					<x-table.th>% Mat.</x-table.th>
				</x-table.thead>
				<x-table.tbody>
					@foreach($price_list_rows as $k => $row)
					<tr wire:key="{{ $k }}-{{ $row->id }}" wire:click="$set('selectedLeaf', {{ $row->id }})">
						<x-table.td>
							<div class="w-40">
								{{ $row->code }}
							</div>
						</x-table.td>
						<x-table.td>{{ $row->short_description }}</x-table.td>
						<x-table.td>{{ $row->um }}</x-table.td>
						<x-table.td>{{ $row->price }}</x-table.td>
						<x-table.td>{{ $row->mat }}</x-table.td>
					</tr>
					@endforeach
				</x-table.tbody>
			</x-table.table>
			@else
				asd
			@endif
		</div>
	</div>
</div>