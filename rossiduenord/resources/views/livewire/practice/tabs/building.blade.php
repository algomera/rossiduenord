<form wire:submit.prevent="save" class="space-y-5">
	<div>
		<x-section-heading class="!border-0 pt-0">
			Dati dell'immobile
		</x-section-heading>

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
				<x-label class="!mb-0" required>Tipologia intervento:</x-label>
				<input wire:model="building.intervention_tipology" id="intervention_tipology"
				       name="intervention_tipology" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="intervention_tipology" class="block text-sm font-medium text-gray-700">Superbonus
					110%</label>
				<x-input-error for="building.intervention_tipology"></x-input-error>
			</div>
			{{-- Riga indirizzo pratica?! --}}
			<div class="col-span-6">
				<x-input x-mask="***********" wire:model.defer="building.fiscal_code" type="text" name="fiscal_code"
				         id="fiscal_code" class="uppercase"
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
							<input wire:model="building.nonMetan_area" type="radio" value="notDefine"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">N.D</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.nonMetan_area" type="radio" value="no"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
							<x-label class="mb-0">No</x-label>
						</div>
						<div class="flex items-center space-x-1">
							<input wire:model="building.nonMetan_area" type="radio" value="yes"
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
				<x-input wire:model.defer="building.license_number" type="text" name="license_number"
				         id="license_number" label="N. licenza/totolo"></x-input>
			</div>
			<div class="col-span-3">
				<x-input wire:model.defer="building.license_date" type="date" name="license_date" id="license_date"
				         label="Data licenza/totolo"></x-input>
			</div>
			<div class="col-span-3">
				<x-input x-mask="9999" wire:model.defer="building.construction_date" type="text"
				         name="construction_date"
				         id="construction_date" label="Anno costruzione"></x-input>
			</div>
		</div>
	</div>

	<livewire:components.condomini-section :practice="$practice" />
	<x-input-error for="condomini"></x-input-error>

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
				<x-input x-mask="aaaaaa99a99a999a" wire:model.defer="building.administrator_fiscalcode" type="text"
				         name="administrator_fiscalcode" id="administrator_fiscalcode" class="uppercase"
				         label="Codice Fiscale"></x-input>
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
				<x-input x-mask="aa" wire:model.defer="building.administrator_province" type="text"
				         name="administrator_province"
				         id="administrator_province" class="uppercase" label="Provincia"></x-input>
			</div>
			<div class="col-span-2">
				<x-input x-mask="99999" wire:model.defer="building.administrator_cap" type="text"
				         name="administrator_cap"
				         id="administrator_cap" label="CAP"></x-input>
			</div>
			<div class="col-span-4">
				<x-input x-mask="999 9999999" wire:model.defer="building.administrator_telephone" type="text"
				         name="administrator_telephone"
				         id="administrator_telephone" label="Telefono"></x-input>
			</div>
			<div class="col-span-4">
				<x-input x-mask="999 9999999" wire:model.defer="building.administrator_cellphone" type="text"
				         name="administrator_cellphone"
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