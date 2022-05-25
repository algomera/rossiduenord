<form wire:submit.prevent="save" class="space-y-5">
	<div>
		<x-section-heading class="!border-0 pt-0">
			Dati dell'immobile
		</x-section-heading>

		<input type="hidden" id="practice_id" name="practice_id" value="{{ $building->practice_id}}">

		<div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
			<div class="col-span-12">
				<x-input wire:model.defer="building.intervention_name" type="text" name="intervention_name"
				         id="intervention_name" label="Nome Intervento" required></x-input>
			</div>
			<div class="col-span-12">
				<x-select wire:model.defer="building.company_role" name="company_role" id="company_role"
				          label="Ruolo dell'impresa" required>
					<option value="">Seleziona</option>
					<option value="General Contractor/Coordinatore">General Contractor/Coordinatore</option>
					<option value="Responsabile di un intervento trainante">Responsabile di un intervento trainante
					</option>
					<option value="Responsabile di un intervento trainato">Responsabile di un intervento trainato
					</option>
					<option value="Società beneficiaria dell_intervento">Società beneficiaria dell'intervento</option>
				</x-select>
			</div>
			<div class="col-span-12 flex items-center space-x-3">
				<x-label class="!mb-0">Tipologia intervento:</x-label>
				<input wire:model="building.intervention_tipology" id="intervention_tipology"
				       name="intervention_tipology" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="intervention_tipology" class="block text-sm font-medium text-gray-700">Superbonus
					110%</label>
			</div>
			{{-- Riga indirizzo pratica?! --}}
			<div class="col-span-6">
				<x-input wire:model.defer="building.fiscal_code" type="text" name="fiscal_code" id="fiscal_code"
				         label="Codice Fiscale" required></x-input>
			</div>
			<div class="col-span-6">
				<x-input wire:model.defer="building.condominio" type="text" name="condominio" id="condominio"
				         label="Nome Condominio" required></x-input>
			</div>
			<div class="col-span-6">
				<x-select wire:model.defer="building.build_type" name="build_type" id="build_type"
				          label="Tipo di condominio" required>
					<option value="">Seleziona</option>
					<option value="Standard">Standard</option>
					<option value="Popolare">Popolare</option>
					<option value="Lusso">Lusso</option>
				</x-select>
			</div>
			<div class="col-span-6">
				<x-select wire:model.defer="building.zone" name="zone" id="zone" label="Zona" required>
					<option selected value="">Seleziona</option>
					<option value="Centrale">Centrale</option>
					<option value="Periferica">Periferica</option>
					<option value="Pregio">Pregio</option>
				</x-select>
			</div>
			<div class="col-span-1">
				<x-input wire:model.defer="building.section" type="text" name="section" id="section"
				         label="Sezione"></x-input>
			</div>
			<div class="col-span-1">
				<x-input wire:model.defer="building.foil" type="text" name="foil" id="foil" label="Foglio"
				         required></x-input>
			</div>
			<div class="col-span-1">
				<x-input wire:model.defer="building.particle" type="text" name="particle" id="particle"
				         label="Particella" required></x-input>
			</div>
			<div class="col-span-1">
				<x-input wire:model.defer="building.subaltern" type="text" name="subaltern" id="subaltern"
				         label="Subalterno" required></x-input>
			</div>
			<div class="col-span-2">
				<x-input wire:model.defer="building.unit_building_number" type="text" name="unit_building_number"
				         id="unit_building_number" label="N. unità immobiliari" required></x-input>
			</div>
			<div class="col-span-1">
				<x-input wire:model.defer="building.pertinence_number" type="text" name="pertinence_number"
				         id="pertinence_number" label="N. pertinenze" required></x-input>
			</div>
			<div class="col-span-1">
				<x-input wire:model.defer="building.resolution_stairs" type="text" name="resolution_stairs"
				         id="resolution_stairs" label="Scale delibere"></x-input>
			</div>
			<div class="col-span-12">
				<x-textarea wire:model.defer="building.note" name="note" id="note" label="Note"></x-textarea>
			</div>
			<div class="col-span-12">
				<div class="flex flex-col p-4 border-t">
					<x-label class="text-wrap">L'edificio è sottoposto a
						vincoli previsti dal codice dei beni culturali e del paesaggio
					</x-label>
					<div class="flex items-center space-x-4">
						<div class="flex items-center space-x-1">
							<input wire:model="building.cultural_constraints" type="radio" value="notDefine"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">N.D</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.cultural_constraints" type="radio" value="no"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">No</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.cultural_constraints" type="radio" value="yes"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">Si</x-label>
						</div>
					</div>
				</div>
				<div class="flex flex-col p-4">
					<x-label>Interventi trainanti al 110%
						sono vietati dai regolamenti edilizi, urbanistici e ambientali
					</x-label>
					<div class="flex items-center space-x-4">
						<div class="flex items-center space-x-1">
							<input wire:model="building.denied_intervents" type="radio" value="notDefine"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">N.D</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.denied_intervents" type="radio" value="no"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">No</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.denied_intervents" type="radio" value="yes"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">Si</x-label>
						</div>
					</div>
				</div>
				<div class="flex flex-col p-4">
					<x-label>L’edificio è situato in un comune
						montano
					</x-label>
					<div class="flex items-center space-x-4">
						<div class="flex items-center space-x-1">
							<input wire:model="building.mountain_common" type="radio" value="notDefine"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">N.D</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.mountain_common" type="radio" value="no"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">No</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.mountain_common" type="radio" value="yes"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">Si</x-label>
						</div>
					</div>
				</div>
				<div class="flex flex-col p-4">
					<x-label>L’edificio è situato in un
						comune interessato da procedura di infrazione comunitaria
					</x-label>
					<div class="flex items-center space-x-4">
						<div class="flex items-center space-x-1">
							<input wire:model="building.infringment_common" type="radio" value="notDefine"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">N.D</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.infringment_common" type="radio" value="no"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">No</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.infringment_common" type="radio" value="yes"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">Si</x-label>
						</div>
					</div>
				</div>
				<div class="flex flex-col p-4">
					<x-label>L’edificio è in una zona
						colpita da eventi sismici
					</x-label>
					<div class="flex items-center space-x-4">
						<div class="flex items-center space-x-1">
							<input wire:model="building.sismic_events_zone" type="radio" value="notDefine"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">N.D</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.sismic_events_zone" type="radio" value="no"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">No</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.sismic_events_zone" type="radio" value="yes"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">Si</x-label>
						</div>
					</div>
				</div>
				<div class="flex flex-col p-4">
					<x-label>L’edificio è in fase di
						ristrutturazione Art. 3, Com. 1, lettere d), e), f), del D.P.R. 380/2001
					</x-label>
					<div class="flex items-center space-x-4">
						<div class="flex items-center space-x-1">
							<input wire:model="building.isUnderRenovation" type="radio" value="notDefine"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">N.D</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.isUnderRenovation" type="radio" value="no"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">No</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.isUnderRenovation" type="radio" value="yes"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">Si</x-label>
						</div>
					</div>
				</div>
				<div class="flex flex-col p-4">
					<x-label>L’edificio è in un’area non
						metanizzata
					</x-label>
					<div class="flex items-center space-x-4">
						<div class="flex items-center space-x-1">
							<input wire:model="building.isUnderRenovation" type="radio" value="notDefine"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">N.D</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.isUnderRenovation" type="radio" value="no"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">No</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.isUnderRenovation" type="radio" value="yes"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">Si</x-label>
						</div>
					</div>
				</div>
				<div class="flex flex-col p-4">
					<x-label>Autorizzazione edilizia
					</x-label>
					<div class="flex items-center space-x-4">
						<div class="flex items-center space-x-1">
							<input wire:model="building.building_authorization" type="radio" value="notDefine"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">N.D</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.building_authorization" type="radio"
							       value="Licenza/Titolo edilizio"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">Licenza/Titolo edilizio</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.building_authorization" type="radio"
							       value="Concessione in sanatoria"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">Concessione in sanatoria</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.building_authorization" type="radio"
							       value="Edificio storico senza titolo edilizio"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">Edificio storico senza titolo edilizio</x-label>
						</div>
					</div>
				</div>
			</div>
			<div class="col-span-3">
				<x-input type="text" name="license_number" id="license_number" label="N. licenza/totolo"></x-input>
			</div>
			<div class="col-span-3">
				<x-input type="date" name="license_date" id="license_date" label="Data licenza/totolo"></x-input>
			</div>
			<div class="col-span-3">
				<x-input type="text" name="construction_date" id="construction_date" label="Anno costruzione"></x-input>
			</div>
		</div>
	</div>
	<div>
		<x-section-heading>
			Anagrafica e lista dei condomini
			<x-slot name="actions">
				<div class="flex items-center justify-between w-full">
					<x-button type="button" prepend="plus" iconColor="text-white"
					          wire:click="$emit('openModal', 'anagrafica.create')">
						Aggiungi
					</x-button>
					@if($condomini->count())
						<x-button wire:click="exportExcel" type="button" prepend="download" iconColor="text-white">
							Esporta
						</x-button>
					@endif
				</div>
			</x-slot>
		</x-section-heading>
		<ul role="list" class="border-y border-gray-100 divide-y divide-gray-200">
			@forelse($condomini as $i => $condomino)
				<li class="py-4 flex">
					<div class="flex items-center justify-center text-sm bg-gray-50 border border-gray-200 font-semibold h-8 w-8 rounded-full">
						{{ $i + 1 }}
					</div>
					<div class="ml-3">
						<p class="text-sm font-medium text-gray-900">{{ $condomino->name }} {{ $condomino->surname }}</p>
						<p class="text-sm text-gray-500">{{ $condomino->cf }}</p>
						<p class="text-sm text-gray-500">{{ $condomino->email }} • {{ $condomino->phone }}</p>
						<div class="flex items-center space-x-2 mt-1 flex-wrap">
							<p class="text-sm text-gray-500">
								<span class="font-bold">Millesimi:</span>
								<span>{{ $condomino->millesimi_inv }}</span>
							</p>
							<span class="text-gray-500">&middot;</span>
							<p class="text-sm text-gray-500">
								<span class="font-bold">Foglio:</span>
								<span>{{ $condomino->foglio }}</span>
							</p>
							<span class="text-gray-500">&middot;</span>
							<p class="text-sm text-gray-500">
								<span class="font-bold">Part:</span>
								<span>{{ $condomino->part }}</span>
							</p>
							<span class="text-gray-500">&middot;</span>
							<p class="text-sm text-gray-500">
								<span class="font-bold">Sub:</span>
								<span>{{ $condomino->sub }}</span>
							</p>
							<span class="text-gray-500">&middot;</span>
							<p class="text-sm text-gray-500">
								<span class="font-bold">Categ. Catastale:</span>
								<span>{{ $condomino->categ_catastale }}</span>
							</p>
							<span class="text-gray-500">&middot;</span>
							<p class="text-sm text-gray-500">
								<span class="font-bold">Sup. Catastale:</span>
								<span>{{ $condomino->sup_catastale }}</span>
							</p>
							<span class="text-gray-500">&middot;</span>
							<p class="text-sm text-gray-500">
								<span class="font-bold">Comproprietari:</span>
								<span>{{ $condomino->comproprietari ? 'Si' : 'No' }}</span>
							</p>
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">Nessun condomino inserito</li>
			@endforelse
		</ul>
		<div class="flex items-center justify-between mt-5">
			<div class="flex items-center space-x-5">
				<label class="block">
					<span class="sr-only">Scegli..</span>
					<input wire:model="imported_excel_file" type="file" class="block w-full text-sm text-slate-500
			      file:mr-4 file:py-2 file:px-4
			      file:rounded-full file:border-0
			      file:text-sm file:font-semibold
			      file:bg-indigo-50 file:text-indigo-700
			      hover:file:bg-indigo-100
			    "/>
				</label>
				@if($imported_excel_file)
					<x-button wire:click="importExcel" type="button" prepend="upload" iconColor="text-white">
						Carica file
					</x-button>
				@endif
				<div wire:loading wire:target="imported_excel_file" class="ml-2">
					<span class="text-sm text-gray-400">Caricamento..</span>
				</div>
			</div>
			@if($building->imported_excel_file)
				<div class="flex flex-col items-end space-y-2" id="imported_excel_file_box">
					<div class="flex flex-col items-end">
						<span class="text-xs text-gray-700">File caricato:</span>
						<span class="text-sm text-indigo-400 font-italic font-bold">{{ basename($building->imported_excel_file) }}</span>
					</div>
					<div class="flex items-center space-x-3">
						<x-danger-button wire:click="deleteExcel" size="xs" type="button" prepend="trash"
						                 iconColor="text-white">Elimina
						</x-danger-button>
						<x-button wire:click="downloadExcel" size="xs" type="button" prepend="download"
						          iconColor="text-white">
							Scarica
						</x-button>
					</div>
				</div>
			@endif
		</div>
	</div>

	<div>
		<x-section-heading>
			Dati Amministrazione
		</x-section-heading>
		<div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
			<div class="col-span-12">
				<x-input wire:model.defer="building.administrator_fullname" type="text" name="administrator_fullname"
				         id="administrator_fullname" label="Nominativo"></x-input>
			</div>
			<div class="col-span-6">
				<x-input wire:model.defer="building.administrator_name" type="text" name="administrator_name"
				         id="administrator_name" label="Nome"></x-input>
			</div>
			<div class="col-span-6">
				<x-input wire:model.defer="building.administrator_surname" type="text" name="administrator_surname"
				         id="administrator_surname" label="Cognome"></x-input>
			</div>
			<div class="col-span-6">
				<x-input wire:model.defer="building.administrator_fiscalcode" type="text"
				         name="administrator_fiscalcode" id="administrator_fiscalcode" label="Codice Fiscale"></x-input>
			</div>
			<div class="col-start-1 col-span-6">
				<x-input wire:model.defer="building.administrator_address" type="text" name="administrator_address"
				         id="administrator_address" label="Indirizzo"></x-input>
			</div>
			<div class="col-span-3">
				<x-input wire:model.defer="building.administrator_city" type="text" name="administrator_city"
				         id="administrator_city" label="Città"></x-input>
			</div>
			<div class="col-span-1">
				<x-input wire:model.defer="building.administrator_province" type="text" name="administrator_province"
				         id="administrator_province" label="Provincia"></x-input>
			</div>
			<div class="col-span-2">
				<x-input wire:model.defer="building.administrator_cap" type="text" name="administrator_cap"
				         id="administrator_cap" label="CAP"></x-input>
			</div>
			<div class="col-span-4">
				<x-input wire:model.defer="building.administrator_telephone" type="text" name="administrator_telephone"
				         id="administrator_telephone" label="Telefono"></x-input>
			</div>
			<div class="col-span-4">
				<x-input wire:model.defer="building.administrator_cellphone" type="text" name="administrator_cellphone"
				         id="administrator_cellphone" label="Cellulare"></x-input>
			</div>
			<div class="col-span-4">
				<x-input wire:model.defer="building.administrator_email" type="email" name="administrator_email"
				         id="administrator_email" label="Email"></x-input>
			</div>
		</div>
	</div>

	<div class="flex justify-end space-x-3">
		<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
		<x-button>Salva</x-button>
	</div>
</form>

@push('notifications')
	<x-notification/>
@endpush