<x-slot name="header">
	<x-page-header>
		Anagrafiche
		<x-slot name="actions">
			<x-button prepend="plus">
				Aggiungi
			</x-button>
		</x-slot>
	</x-page-header>
</x-slot>
<x-card>
	<x-card class="border">
		<table class="min-w-full divide-y divide-gray-300">
			<thead class="bg-gray-50">
			<tr>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
					Categoria
				</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ragione Sociale</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Nome</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Cognome</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Ruoli</th>
				<th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
					<span class="sr-only">Azioni</span>
				</th>
			</tr>
			</thead>
			<tbody class="divide-y divide-gray-200 bg-white">
			@forelse ($anagrafiche as $anagrafica)
				<tr>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$anagrafica->subject_type}}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$anagrafica->company_name}}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$anagrafica->first_name}}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$anagrafica->last_name}}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">
						<div class="flex space-x-1">
							@foreach($anagrafica->roles as $role)
								{{-- background-color: {{ $role->color }}--}}
								<div class="flex-shrink-0 border border-gray-900 h-4 w-4 rounded-full"></div>
							@endforeach
						</div>
					</td>
					<td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
						<div class="flex items-center space-x-3">
							actions
						</div>
					</td>
				</tr>
			@empty
				<tr>
					<td colspan="10" class="text-center text-gray-500 py-4">Nessun risultato</td>
				</tr>
			@endforelse
			</tbody>
		</table>
	</x-card>
</x-card>

@push('notifications')
	<x-notification/>
@endpush