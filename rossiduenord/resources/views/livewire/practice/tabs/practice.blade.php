<x-card class="border p-4 rounded-md">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
			<div class="col-span-12 sm:col-span-4">
				<x-input-euro wire:model.defer="import" name="import" id="import" label="Importo stimato" required/>
			</div>
			<div class="col-span-12 sm:col-span-4">
				<x-select wire:model.defer="practical_phase" name="practical_phase" id="practical_phase"
				          label="Fase Pratica" required>
					<option value="null" selected disabled>Nessuna</option>
					<option value="In istruttoria">In istruttoria</option>
					<option value="In progettazione">In progettazione</option>
					<option value="In offertazione">In offertazione</option>
					<option value="In contrattualizzazione lavoro">In contrattualizzazione lavoro</option>
					<option value="In contrattualizazione cessione/finanziamento">In contrattualizazione
						cessione/finanziamento
					</option>
					<option value="Contrattualizzato">Contrattualizzato</option>
					<option value="In fatturazione">In fatturazione</option>
					<option value="In pagamento">In pagamento</option>
					<option value="Operazione terminata con successo">Operazione terminata con successo</option>
					<option value="Operazione rinunciata">Operazione rinunciata</option>
				</x-select>
			</div>
			<div class="col-span-12 sm:col-span-4">
				<x-select wire:model.defer="real_estate_type" name="real_estate_type" id="real_estate_type"
				          label="Tipo Immobile" required>
					<option value="null" selected disabled>Seleziona</option>
					<option value="Condominio">Condominio</option>
					<option value="Unifamiliare">Unifamiliare</option>
					<option value="Fabbricato industriale">Fabbricato industriale</option>
				</x-select>
			</div>
			<div class="col-span-12">
				<x-input wire:model.defer="policy_name" name="policy_name" id="policy_name" type="text"
				         label="Denominazione" required></x-input>
			</div>
			<div class="col-span-6 sm:col-span-10 lg:col-span-4">
				<x-input wire:model.defer="address" name="address" id="address" type="text" label="Indirizzo"
				         required></x-input>
			</div>
			<div class="col-span-6 sm:col-span-2 lg:col-span-1">
				<x-input wire:model.defer="civic" name="civic" id="civic" class="uppercase" type="text" label="N." required></x-input>
			</div>
			<div class="col-span-6 sm:col-span-4 lg:col-span-2">
				<x-input wire:model.defer="common" name="common" id="common" type="text" label="Comune"
				         required></x-input>
			</div>
			<div class="col-span-6 sm:col-span-2 lg:col-span-1">
				<x-input x-mask="aa" wire:model.defer="province" name="province" id="province" class="uppercase"
				         type="text"
				         label="Provincia"
				         required></x-input>
			</div>
			<div class="col-span-6 sm:col-span-4 lg:col-span-2">
				<x-select wire:model.defer="region" name="region" id="region"
				          label="Regione" required>
					<option value="null" selected disabled>Seleziona</option>
					<option value="Abruzzo">Abruzzo</option>
					<option value="Basilicata">Basilicata</option>
					<option value="Calabria">Calabria</option>
					<option value="Campania">Campania</option>
					<option value="Emilia-Romagna">Emilia-Romagna</option>
					<option value="Friuli Venezia Giulia">Friuli Venezia Giulia</option>
					<option value="Lazio">Lazio</option>
					<option value="Liguria">Liguria</option>
					<option value="Lombardia">Lombardia</option>
					<option value="Marche">Marche</option>
					<option value="Molise">Molise</option>
					<option value="Piemonte">Piemonte</option>
					<option value="Puglia">Puglia</option>
					<option value="Sardegna">Sardegna</option>
					<option value="sicilia">Sicilia</option>
					<option value="Toscana">Toscana</option>
					<option value="Trentino-Alto Adige">Trentino-Alto Adige</option>
					<option value="Umbria">Umbria</option>
					<option value="Valle d'Aosta">Valle d'Aosta</option>
					<option value="Veneto">Veneto</option>
				</x-select>
			</div>
			<div class="col-span-6 sm:col-span-2 lg:col-span-2">
				<x-input x-mask="99999" wire:model.defer="cap" name="cap" id="cap" type="text" label="CAP"
				         required></x-input>
			</div>
			<div class="col-span-12 sm:col-span-4">
				<x-input wire:model.defer="work_start" name="work_start" id="work_start" type="date"
				         label="Inizio lavori"
				         required></x-input>
			</div>
			<div class="col-span-12 sm:col-span-4">
				<x-input-euro wire:model.defer="c_m" name="c_m" id="c_m" label="Importo C.M" required></x-input-euro>
			</div>
			<div class="col-span-12 sm:col-span-4">
				<x-input-euro wire:model.defer="assev_tecnica" name="assev_tecnica" id="assev_tecnica"
				              label="Assev. Tecnica (no IVA)" required></x-input-euro>
			</div>
			<div class="col-span-12">
				<x-textarea wire:model.defer="description" name="description" id="description" cols="30" rows="3"
				            label="Descrizione"></x-textarea>
			</div>
			<div class="col-span-12 sm:col-span-4">
				<x-input wire:model.defer="referent_email" name="referent_email" id="referent_email" type="email"
				         label="Email di riferimento"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-4">
				<x-input x-mask="999 9999999" wire:model.defer="referent_mobile" name="referent_mobile"
				         id="referent_mobile" type="text"
				         label="Cellulare di riferimento"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-4" x-data="{ show: @entangle('policy') }">
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
				<div class="grid grid-cols-1 sm:grid-cols-12 gap-4" x-show="show">
					<div class="col-span-12 sm:col-span-4">
						<x-input wire:model.defer="superbonus_work_start" id="superbonus_work_start"
						         name="superbonus_work_start" type="month"
						         label="Data lavorazione"></x-input>
					</div>
					<div class="col-span-12 sm:col-span-4">
						<x-select wire:model.defer="sal" id="sal" name="sal" label="SAL">
							<option value="Sal 1">Sal 1</option>
							<option value="Sal 2">Sal 2</option>
							<option value="Sal finale">Sal 3</option>
						</x-select>
					</div>
					<div class="col-span-12 sm:col-span-4">
						<x-input-euro wire:model.defer="import_sal" name="import_sal" id="import_sal"
						              label="Importo SAL/Lavori"></x-input-euro>
					</div>
				</div>
			</div>
			<div class="col-span-12">
				<x-textarea wire:model.defer="note" name="note" id="note" cols="30" rows="3" label="Note"></x-textarea>
				<div class="flex items-center mt-3">
					<input wire:model.defer="practice_ok" id="practice_ok" name="practice_ok" type="checkbox"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
					<label for="practice_ok" class="ml-3 block text-sm font-medium text-gray-700">Pratica in
						regola</label>
				</div>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
			<x-button>Salva</x-button>
		</div>
	</form>
</x-card>