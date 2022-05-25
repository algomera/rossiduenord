<form wire:submit.prevent="save" class="space-y-5">
	<div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
		<div class="sm:col-span-4">
			<x-input x-mask:dynamic="$money($input, ',')" wire:model.defer="import" name="import" id="import" type="text"
			         label="Importo stimato" placeholder="0,00" required></x-input>
		</div>
		<div class="sm:col-span-4">
			<x-select wire:model.defer="practical_phase" name="practical_phase" id="practical_phase"
			          label="Fase Pratica" required>
				<option selected value="">Nessuna</option>
				<option {{ $practice->practical_phase == 'In istruttoria' ? 'selected' : ''}} {{old('practical_phase') == 'In istruttoria' ? 'selected' : ''}} value="In istruttoria">
					In istruttoria
				</option>
				<option {{ $practice->practical_phase == 'In progettazione' ? 'selected' : ''}} {{old('practical_phase') == 'In progettazione' ? 'selected' : ''}} value="In progettazione">
					In progettazione
				</option>
				<option {{ $practice->practical_phase == 'In offertazione' ? 'selected' : ''}} {{old('practical_phase') == 'In offertazione' ? 'selected' : ''}} value="In offertazione">
					In offertazione
				</option>
				<option {{ $practice->practical_phase == 'In contrattualizzazione lavoro' ? 'selected' : ''}} {{old('practical_phase') == 'In contrattualizzazione lavoro' ? 'selected' : ''}} value="In contrattualizzazione lavoro">
					In contrattualizzazione lavoro
				</option>
				<option {{ $practice->practical_phase == 'In contrattualizazione cessione/finanziamento' ? 'selected' : ''}} {{old('practical_phase') == 'In contrattualizazione cessione/finanziamento' ? 'selected' : ''}} value="In contrattualizazione cessione/finanziamento">
					In contrattualizazione cessione/finanziamento
				</option>
				<option {{ $practice->practical_phase == 'Contrattualizzato' ? 'selected' : ''}} {{old('practical_phase') == 'Contrattualizzato' ? 'selected' : ''}} value="Contrattualizzato">
					Contrattualizzato
				</option>
				<option {{ $practice->practical_phase == 'In fatturazione' ? 'selected' : ''}} {{old('practical_phase') == 'In fatturazion' ? 'selected' : ''}} value="In fatturazione">
					In fatturazione
				</option>
				<option {{ $practice->practical_phase == 'In pagamento' ? 'selected' : ''}} {{old('practical_phase') == 'In pagamento' ? 'selected' : ''}} value="In pagamento">
					In pagamento
				</option>
				<option {{ $practice->practical_phase == 'Operazione terminata con successo' ? 'selected' : ''}} {{old('practical_phase') == 'Operazione terminata con successo' ? 'selected' : ''}} value="Operazione terminata con successo">
					Operazione terminata con successo
				</option>
				<option {{ $practice->practical_phase == 'Operazione rinunciata' ? 'selected' : ''}} {{old('practical_phase') == 'Operazione rinunciata' ? 'selected' : ''}} value="Operazione rinunciata">
					Operazione rinunciata
				</option>
			</x-select>
		</div>
		<div class="sm:col-span-4">
			<x-select wire:model.defer="real_estate_type" name="real_estate_type" id="real_estate_type"
			          label="Tipo Immobile" required>
				<option selected value="">Seleziona</option>
				<option {{ $practice->real_estate_type == 'Condominio' ? 'selected' : ''}} {{old('real_estate_type') == 'Condominio' ? 'selected' : ''}} value="Condominio">
					Condominio
				</option>
				<option {{ $practice->real_estate_type == 'Unifamiliare' ? 'selected' : ''}} {{old('real_estate_type') == 'Unifamiliare' ? 'selected' : ''}} value="Unifamiliare">
					Unifamiliare
				</option>
				<option {{ $practice->real_estate_type == 'Fabbricato industriale' ? 'selected' : ''}} {{old('real_estate_type') == 'Fabbricato industriale' ? 'selected' : ''}} value="Fabbricato industriale">
					Fabbricato industriale
				</option>
			</x-select>
		</div>
		<div class="col-span-12">
			<x-input wire:model.defer="policy_name" name="policy_name" id="policy_name" type="text"
			         label="Denominazione" required></x-input>
		</div>
		<div class="col-span-10 lg:col-span-4">
			<x-input wire:model.defer="address" name="address" id="address" type="text" label="Indirizzo"
			         required></x-input>
		</div>
		<div class="col-span-2 lg:col-span-1">
			<x-input wire:model.defer="civic" name="civic" id="civic" type="text" label="N." required></x-input>
		</div>
		<div class="col-span-4 lg:col-span-2">
			<x-input wire:model.defer="common" name="common" id="common" type="text" label="Comune" required></x-input>
		</div>
		<div class="col-span-2 lg:col-span-1">
			<x-input x-mask="aa" wire:model.defer="province" name="province" id="province" type="text" label="Provincia"
			         required></x-input>
		</div>
		<div class="col-span-4 lg:col-span-2">
			<x-select wire:model.defer="region" name="region" id="region"
			          label="Regione" required>
				<option selected value="">Seleziona</option>
				<option {{ $practice->region == 'Abruzzo' ? 'selected' : ''}} {{old('region') == 'Abruzzo' ? 'selected' : ''}} value="Abruzzo">
					Abruzzo
				</option>
				<option {{ $practice->region == 'Basilicata' ? 'selected' : ''}} {{old('region') == 'Basilicata' ? 'selected' : ''}} value="Basilicata">
					Basilicata
				</option>
				<option {{ $practice->region == 'Calabria' ? 'selected' : ''}} {{old('region') == 'Calabria' ? 'selected' : ''}} value="Calabria">
					Calabria
				</option>
				<option {{ $practice->region == 'Campania' ? 'selected' : ''}} {{old('region') == 'Campania' ? 'selected' : ''}} value="Campania">
					Campania
				</option>
				<option {{ $practice->region == 'Emilia-Romagna' ? 'selected' : ''}} {{old('region') == 'Emilia-Romagna' ? 'selected' : ''}} value="Emilia-Romagna">
					Emilia-Romagna
				</option>
				<option {{ $practice->region == 'Friuli Venezia Giulia' ? 'selected' : ''}} {{old('region') == 'Friuli Venezia Giulia' ? 'selected' : ''}} value="Friuli Venezia Giulia">
					Friuli Venezia Giulia
				</option>
				<option {{ $practice->region == 'Lazio' ? 'selected' : ''}} {{old('region') == 'Lazio' ? 'selected' : ''}} value="Lazio">
					Lazio
				</option>
				<option {{ $practice->region == 'Liguria' ? 'selected' : ''}} {{old('region') == 'Liguria' ? 'selected' : ''}} value="Liguria">
					Liguria
				</option>
				<option {{ $practice->region == 'Lombardia' ? 'selected' : ''}} {{old('region') == 'Lombardia' ? 'selected' : ''}} value="Lombardia">
					Lombardia
				</option>
				<option {{ $practice->region == 'Marche' ? 'selected' : ''}} {{old('region') == 'Marche' ? 'selected' : ''}} value="Marche">
					Marche
				</option>
				<option {{ $practice->region == 'Molise' ? 'selected' : ''}} {{old('region') == 'Molise' ? 'selected' : ''}} value="Molise">
					Molise
				</option>
				<option {{ $practice->region == 'Piemonte' ? 'selected' : ''}} {{old('region') == 'Piemonte' ? 'selected' : ''}} value="Piemonte">
					Piemonte
				</option>
				<option {{ $practice->region == 'Puglia' ? 'selected' : ''}} {{old('region') == 'Puglia' ? 'selected' : ''}} value="Puglia">
					Puglia
				</option>
				<option {{ $practice->region == 'Sardegna' ? 'selected' : ''}} {{old('region') == 'Sardegna' ? 'selected' : ''}} value="Sardegna">
					Sardegna
				</option>
				<option {{ $practice->region == 'sicilia' ? 'selected' : ''}} {{old('region') == 'sicilia' ? 'selected' : ''}} value="sicilia">
					Sicilia
				</option>
				<option {{ $practice->region == 'Toscana' ? 'selected' : ''}} {{old('region') == 'Toscana' ? 'selected' : ''}} value="Toscana">
					Toscana
				</option>
				<option {{ $practice->region == 'Trentino-Alto Adige' ? 'selected' : ''}} {{old('region') == 'Trentino-Alto Adige' ? 'selected' : ''}} value="Trentino-Alto Adige">
					Trentino-Alto Adige
				</option>
				<option {{ $practice->region == 'Umbria' ? 'selected' : ''}} {{old('region') == 'Umbria' ? 'selected' : ''}} value="Umbria">
					Umbria
				</option>
				<option {{ $practice->region == 'Valle d\'Aosta' ? 'selected' : ''}} {{old('region') == 'Valle d\'Aosta' ? 'selected' : ''}} value="Valle d'Aosta">
					Valle d'Aosta
				</option>
				<option {{ $practice->region == 'Veneto' ? 'selected' : ''}} {{old('region') == 'Veneto' ? 'selected' : ''}} value="Veneto">
					Veneto
				</option>
			</x-select>
		</div>
		<div class="col-span-2 lg:col-span-2">
			<x-input x-mask="99999" wire:model.defer="cap" name="cap" id="cap" type="text" label="CAP" required></x-input>
		</div>
		<div class="sm:col-span-4">
			<x-input wire:model.defer="work_start" name="work_start" id="work_start" type="date" label="Inizio lavori"
			         required></x-input>
		</div>
		<div class="sm:col-span-4">
			<x-input x-mask:dynamic="$money($input, ',')" wire:model.defer="c_m" name="c_m" id="c_m" type="text"
			         label="Importo C.M" placeholder="0,00" required></x-input>
		</div>
		<div class="sm:col-span-4">
			<x-input x-mask:dynamic="$money($input, ',')" wire:model.defer="assev_tecnica" name="assev_tecnica"
			         id="assev_tecnica" type="text" label="Assev. Tecnica (no IVA)" placeholder="0,00"
			         required></x-input>
		</div>
		<div class="col-span-12">
			<x-textarea wire:model.defer="description" name="description" id="description" cols="30" rows="3"
			            label="Descrizione"></x-textarea>
		</div>
		<div class="sm:col-span-4">
			<x-input wire:model.defer="referent_email" name="referent_email" id="referent_email" type="email"
			         label="Email di riferimento"></x-input>
		</div>
		<div class="sm:col-span-4">
			<x-input x-mask="999 9999999" wire:model.defer="referent_mobile" name="referent_mobile" id="referent_mobile" type="text"
			         label="Cellulare di riferimento"></x-input>
		</div>
		<div class="sm:col-span-4" x-data="{ show: @entangle('policy') }">
			<div class="flex items-center">
				<input wire:model="policy" id="policy" name="policy" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="policy" class="ml-3 block text-sm font-medium text-gray-700">Richiedi Polizza</label>
			</div>
			<div class="mt-1" x-show="show">
				<x-input wire:model.defer="request_policy" id="request_policy" name="request_policy" type="text"
				         placeholder="Richiedente"></x-input>
			</div>
		</div>
		<div class="col-span-12 flex flex-col space-y-4" x-data="{ show: @entangle('superbonus') }">
			<div class="flex items-center space-x-3">
				<x-label class="!mb-0">Tipologia intervento:</x-label>
				<input wire:model="superbonus" id="superbonus" name="superbonus" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="superbonus" class="block text-sm font-medium text-gray-700">Superbonus 110%</label>
			</div>
			<div class="flex items-center space-x-3" x-show="show">
				<x-input wire:model.defer="superbonus_work_start" id="superbonus_work_start" name="superbonus_work_start" type="month"
				         label="Data lavorazione"></x-input>
				<x-select wire:model.defer="sal" id="sal" name="sal" label="SAL">
					<option {{ $practice->sal == 'Sal 1' ? 'selected' : ''}} {{old('sal') == 'Sal 1' ? 'selected' : ''}} value="Sal 1">
						Sal 1
					</option>
					<option {{ $practice->sal == 'Sal 2' ? 'selected' : ''}} {{old('sal') == 'Sal 2' ? 'selected' : ''}} value="Sal 2">
						Sal 2
					</option>
					<option {{ $practice->sal == 'Sal 3' ? 'selected' : ''}} {{old('sal') == 'Sal finale' ? 'selected' : ''}} value="Sal finale">
						Sal 3
					</option>
				</x-select>
				<x-input x-mask:dynamic="$money($input, ',')" wire:model.defer="import_sal" id="import_sal"
				         name="import_sal" type="text" label="Importo SAL/Lavori" placeholder="0,00"></x-input>
			</div>
		</div>
		<div class="col-span-12">
			<x-textarea wire:model.defer="note" name="note" id="note" cols="30" rows="3" label="Note"></x-textarea>
			<div class="flex items-center mt-3">
				<input wire:model.defer="practice_ok" id="practice_ok" name="practice_ok" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="practice_ok" class="ml-3 block text-sm font-medium text-gray-700">Pratica in regola</label>
			</div>
		</div>
	</div>

	<div class="flex justify-end space-x-3">
		<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
		<x-button>Salva</x-button>
	</div>
</form>
