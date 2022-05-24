<x-slot name="header">
	<x-page-header>
		Pratiche
		<x-slot name="actions">
			<form class="relative w-full max-w-xl" action="">
				<div>
					<x-input type="text" placeholder="Cerca.." id="search" name="search"
					         append="search"></x-input>
				</div>
			</form>
		</x-slot>
	</x-page-header>
</x-slot>
<x-card>
	<x-card class="border rounded-md p-4">
		<div>
			<form action="" method="GET">
				<div class="flex items-end space-x-4 mb-2">
					<x-select name="practical_month" id="practical_month" label="Mese">
						<option value="">Tutti</option>
						<option value="01" {{ request()->get('practical_month') === '01' ? 'selected' : '' }}>
							Gennaio
						</option>
						<option value="02" {{ request()->get('practical_month') === '02' ? 'selected' : '' }}>
							Febbario
						</option>
						<option value="03" {{ request()->get('practical_month') === '03' ? 'selected' : '' }}>
							Marzo
						</option>
						<option value="04" {{ request()->get('practical_month') === '04' ? 'selected' : '' }}>
							Aprile
						</option>
						<option value="05" {{ request()->get('practical_month') === '05' ? 'selected' : '' }}>
							Maggio
						</option>
						<option value="06" {{ request()->get('practical_month') === '06' ? 'selected' : '' }}>
							Giugno
						</option>
						<option value="07" {{ request()->get('practical_month') === '07' ? 'selected' : '' }}>
							Luglio
						</option>
						<option value="08" {{ request()->get('practical_month') === '08' ? 'selected' : '' }}>
							Agosto
						</option>
						<option value="09" {{ request()->get('practical_month') === '09' ? 'selected' : '' }}>
							Settembre
						</option>
						<option value="10" {{ request()->get('practical_month') === '10' ? 'selected' : '' }}>
							Ottobre
						</option>
						<option value="11" {{ request()->get('practical_month') === '11' ? 'selected' : '' }}>
							Novembre
						</option>
						<option value="12" {{ request()->get('practical_month') === '12' ? 'selected' : '' }}>
							Dicembre
						</option>
					</x-select>
					<x-select name="practical_phase" id="practical_phase" label="Fase pratica">
						<option value="">Tutte</option>
						<option value="Nessuna" {{ request()->get('practical_phase') === 'Nessuna' ? 'selected' : '' }}>
							Nessuna
						</option>
						<option value="In istruttoria" {{ request()->get('practical_phase') === 'In istruttoria' ? 'selected' : '' }}>
							In istruttoria
						</option>
						<option value="In progettazione" {{ request()->get('practical_phase') === 'In progettazione' ? 'selected' : '' }}>
							In progettazione
						</option>
						<option value="In offertazione" {{ request()->get('practical_phase') === 'In offertazione' ? 'selected' : '' }}>
							In offertazione
						</option>
						<option value="In contrattualizzazione lavoro" {{ request()->get('practical_phase') === 'In contrattualizzazione lavoro' ? 'selected' : '' }}>
							In contrattualizzazione lavoro
						</option>
						<option value="In contrattualizazione cessione/finanziamento" {{ request()->get('practical_phase') === 'In contrattualizazione cessione/finanziamento' ? 'selected' : '' }}>
							In contrattualizazione cessione/finanziamento
						</option>
						<option value="Contrattualizzato" {{ request()->get('practical_phase') === 'Contrattualizzato' ? 'selected' : '' }}>
							Contrattualizzato
						</option>
						<option value="In fatturazione" {{ request()->get('practical_phase') === 'In fatturazione' ? 'selected' : '' }}>
							In fatturazione
						</option>
						<option value="In pagamento" {{ request()->get('practical_phase') === 'In pagamento' ? 'selected' : '' }}>
							In pagamento
						</option>
						<option value="Operazione terminata con successo" {{ request()->get('practical_phase') === 'Operazione terminata con successo' ? 'selected' : '' }}>
							Operazione terminata con successo
						</option>
						<option value="Operazione rinunciata" {{ request()->get('practical_phase') === 'Operazione rinunciata' ? 'selected' : '' }}>
							Operazione rinunciata
						</option>
					</x-select>
					<div class="w-full max-w-3xl">
						<x-input type="text" name="practical_description" id="practical_description"
						         label="Descrizione"></x-input>
					</div>
					<x-input type="text" name="practical_number" id="practical_number" label="N. Pratica"></x-input>
					<x-button>Ricerca</x-button>
				</div>
			</form>
		</div>

		<x-button wire:click="createPractice" wire:loading.attr="disabled" prepend="plus" iconColor="text-white">Nuova
		</x-button>
		<div wire:loading wire:target="createPractice" class="ml-2">
			<span class="text-sm text-gray-400">Caricamento..</span>
		</div>
	</x-card>
	<x-card class="border">
		<table class="min-w-full divide-y divide-gray-300">
			<thead class="bg-gray-50">
			<tr>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
					Piattaforma
				</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Pratica</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Data</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Denominazione</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Fase</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Mese lav. 110%</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Lista incentivi</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Richiedente</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">SAL</th>
				<th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">Notifiche</th>
				<th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-6">
					<span class="sr-only">Azioni</span>
				</th>
			</tr>
			</thead>
			<tbody class="divide-y divide-gray-200 bg-white">
			@forelse ($practices as $practice)
				<tr @if($practice->applicant->company_name == '' || $practice->policy_name == '' ) class="new_practice" @endif>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$practice->applicant->user->user_data->name}}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$practice->id}}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{ date('d/m/Y', strtotime($practice->created_at)) }}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$practice->policy_name}}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$practice->practical_phase}}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$practice->month_processing}}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$practice->bonus}}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{$practice->applicant->company_name}}</td>
					<td class="whitespace-nowrap px-3 py-4 text-sm text-gray-900">{{Money::format($practice->import_sal) ?? '-'}}</td>

					<td></td>
					<td class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-6">
						<div class="flex items-center space-x-3">
							<a href="{{route('practice.edit', $practice) }}"
							   class="text-indigo-600 hover:text-indigo-900">
								<x-icon name="pencil-alt" class="w-5 h-5"></x-icon>
							</a>

							<x-modal>
								<x-slot name="trigger">
									<div class="text-red-600 hover:text-red-900">
										<x-icon name="trash" class="w-5 h-5"></x-icon>
									</div>
								</x-slot>
								<x-slot name="title">
									Conferma eliminazione
								</x-slot>
								Sei sicuro di voler eliminare la pratica n. {{ $practice->id }}?
								<x-slot name="footer">
									<x-link-button x-on:click="open = false">Annulla</x-link-button>
									<x-danger-button class="ml-2" wire:click="deletePractice({{ $practice->id }})"
									                 wire:loading.attr="disabled">
										Elimina
									</x-danger-button>
								</x-slot>
							</x-modal>
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
	<livewire:practice-info :practices="$practices"/>
</x-card>

@push('notifications')
	<x-notification/>
@endpush