<x-card class="p-4">
	<div class="grid grid-cols-10 gap-8">
		<div class="col-span-10 lg:col-span-2">
			<div class="flex flex-col space-y-3">
				<div class="flex items-center justify-between">
					<span class="text-sm font-medium text-gray-500">Num. prog.</span>
					<span class="text-sm font-semibold text-gray-900">123</span>
				</div>
				<div class="flex items-center justify-between">
					<span class="text-sm font-medium text-gray-500">U.M.</span>
					<span class="text-sm font-semibold text-gray-900">{{ $row->um }}</span>
				</div>
				<div class="flex items-center justify-between">
					<span class="text-sm font-medium text-gray-500">Prezzo un.</span>
					<span class="text-sm font-semibold text-gray-900">{{ \App\Helpers\Money::format($row->price) }}</span>
				</div>
				<div class="flex items-center justify-between">
					<span class="text-sm font-medium text-gray-500">Sconto un.</span>
					<span class="text-sm font-semibold text-gray-900">{{ \App\Helpers\Money::format($row->mat) }}</span>
				</div>
			</div>
		</div>
		<div class="col-span-10 lg:col-span-8">
			<div class="flex flex-col space-y-3">
				<div class="flex items-center space-x-4">
					<span class="text-sm font-medium text-gray-500">Codice E.P.</span>
					<span class="text-sm font-semibold text-gray-900">{{ strtoupper($row->code) }}</span>
				</div>
				<div class="flex flex-col">
					<span class="text-sm font-medium text-gray-500">Descrizione E.P.</span>
					<div class="text-sm text-gray-900">
						{{ $row->parent->short_description }}<br>{{ $row->short_description }}
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr class="my-3">
	<div class="grid grid-cols-10 gap-4">
		<div class="col-span-10 lg:col-span-10">
			<div class="bg-white">
				<x-table.table>
					<x-table.thead>
						<tr>
							<x-table.th>N.</x-table.th>
							<x-table.th>Commento</x-table.th>
							<x-table.th>Espressione</x-table.th>
							<x-table.th>NPS</x-table.th>
							<x-table.th>Lunghezza</x-table.th>
							<x-table.th>Larghezza</x-table.th>
							<x-table.th>H-P-S</x-table.th>
							<x-table.th>Totale</x-table.th>
						</tr>
					</x-table.thead>
					<x-table.tbody>
						@foreach($details as $k => $detail)
							<tr>
								<x-table.td>{{ $loop->index + 1 }}</x-table.td>
							</tr>
						@endforeach
					</x-table.tbody>
				</x-table.table>
				<hr>
				Totali vari
			</div>
		</div>
	</div>
</x-card>