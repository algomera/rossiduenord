<x-card>
	<p class="text-blue-400 italic text-sm">Scarica i documenti necessari, compilali e caricali</p>
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>#</x-table.th>
				<x-table.th>Nome</x-table.th>
				<x-table.th>Stato</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse($practice->policies as $policy)
				<tr>
					<x-table.td>{{ $loop->index + 1 }}</x-table.td>
					<x-table.td class="w-full">{{ $policy->name }}</x-table.td>
					<x-table.td class="min-w-[200px]">
					<span class="inline-flex rounded-full bg-red-100 px-2 text-xs font-semibold leading-5 text-red-800">
						Da caricare
					</span>
					</x-table.td>
					<x-table.td>
						<div class="flex items-center space-x-5">
							<x-button size="xs">
								<x-icon name="download" class="w-4 h-4 text-white"></x-icon>
							</x-button>
							<x-button size="xs">
								<x-icon name="upload" class="w-4 h-4 text-white"></x-icon>
							</x-button>
						</div>
					</x-table.td>
				</tr>
			@empty
				<tr>
					<x-table.td>Nessuna polizza inserita</x-table.td>
				</tr>
			@endforelse
		</x-table.tbody>
	</x-table.table>
</x-card>