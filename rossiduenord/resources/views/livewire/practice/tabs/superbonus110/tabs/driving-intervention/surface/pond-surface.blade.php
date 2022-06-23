<div class="mt-3">
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>N.</x-table.th>
				<x-table.th>Descrizione</x-table.th>
				<x-table.th>Superficie (m²)</x-table.th>
				<x-table.th>Trasm. Ante (W/m²k)</x-table.th>
				<x-table.th>Trasm. Post (W/m²k)</x-table.th>
				<x-table.th>Trasm. Term. Period. YIE (W/m²k)</x-table.th>
				<x-table.th>Confine</x-table.th>
				<x-table.th>Coibentazione</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse($surfaces as $i => $surface)
				<tr>
					<x-table.td>{{ $i + 1 }}</x-table.td>
					<x-table.td>{{ $surface->description_surface }}</x-table.td>
					<x-table.td>{{ $surface->surface }}</x-table.td>
					<x-table.td>{{ $surface->trasm_ante }}</x-table.td>
					<x-table.td>{{ $surface->trasm_post }}</x-table.td>
					<x-table.td>{{ $surface->trasm_term }}</x-table.td>
					<x-table.td>{{ $surface->confine }}</x-table.td>
					<x-table.td>{{ $surface->insulation }}</x-table.td>
					<x-table.td>
						<div class="flex items-center space-x-3">
							<x-modal>
								<x-slot name="trigger">
									<x-icon name="trash" class="w-5 h-5 text-red-500 flex-shrink-0"></x-icon>
								</x-slot>
								<x-slot name="title">
									Conferma eliminazione
								</x-slot>
								Sei sicuro di voler eliminare la superficie?
								<x-slot name="footer">
									<x-link-button x-on:click="open = false">Annulla</x-link-button>
									<x-danger-button class="ml-2" wire:click="deleteSurface({{ $surface->id }})">
										Elimina
									</x-danger-button>
								</x-slot>
							</x-modal>
						</div>
					</x-table.td>
				</tr>
			@empty
				<tr>
					<x-table.td colspan="10" class="text-center">Nessuna superficie inserita</x-table.td>
				</tr>
			@endforelse
			@if($surfaces)
				<tr class="bg-gray-50">
					<x-table.td colspan="10">Totale "Cop. non disperd.": <span class="font-semibold">{{ $surfaces->sum('surface') }} m²</span>
						di cui realizzati SAL n.1 <span class="font-semibold">{{ $sal->sal_1 ?? '-' }} m²</span> SAL n.2 <span
								class="font-semibold">{{ $sal->sal_2 ?? '-' }} m²</span> SAL F. <span class="font-semibold">{{ $sal->sal_f ?? '-' }} m²</span>
					</x-table.td>
				</tr>
			@endif
		</x-table.tbody>
	</x-table.table>
</div>