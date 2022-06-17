<div class="grid grid-cols-10 h-[30%] overflow-hidden">
	<div class="col-span-10 lg:col-span-2 pr-4">
		<nav class="space-y-0 space-x-2 lg:space-x-0 lg:space-y-1 flex flex-row h-[300px] overflow-y-auto mt-3 lg:flex-col"
		     aria-label="Sidebar">
			<x-intervention-list-folder-loop :items="$tree" :selected="$selected"></x-intervention-list-folder-loop>
		</nav>
	</div>
	<div class="col-span-10 lg:col-span-8 overflow-y-auto">
		@if($selected)
			<x-table.table>
				<x-table.thead>
					<tr class="divide-x divide-gray-200">
						<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Num.</x-table.th>
						<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Prezzario</x-table.th>
						<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Codice E.P.</x-table.th>
						<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Descrizione</x-table.th>
						<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Prog. Ragg.</x-table.th>
						<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">U.M.</x-table.th>
						<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Quantità</x-table.th>
						<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Prezzo un.</x-table.th>
						<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Sconto un.</x-table.th>
						<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Totale</x-table.th>
						<x-table.th class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">Mat.</x-table.th>
					</tr>
				</x-table.thead>
				<x-table.tbody>
					@foreach([1,2,3,4,5,6,7,8,9,10] as $k => $row)
						<tr class="divide-x divide-gray-200">
							<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">1</x-table.td>
							<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">PRE21-PRE1</x-table.td>
							<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">A00.1.01.001.A</x-table.td>
							<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">[M01001a] costo non comprensivo delle spese generali ed utili dell'impresa</x-table.td>
							<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900"></x-table.td>
							<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">ora</x-table.td>
							<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">12</x-table.td>
							<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">25,00</x-table.td>
							<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">10,00</x-table.td>
							<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">15,00</x-table.td>
							<x-table.td class="whitespace-nowrap px-2 py-2 text-sm text-gray-900">0,00</x-table.td>
						</tr>
					@endforeach
				</x-table.tbody>
			</x-table.table>
		@endif
	</div>
</div>