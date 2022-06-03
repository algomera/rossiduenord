<div class="space-y-5">
	<x-section-heading class="!py-0 !border-t-0">Interventi trainati oggetto dei lavori</x-section-heading>
	@isset($condomino_id)
		<livewire:practice.tabs.superbonus110.tabs.towed-intervention.condomino-section :condomino="$condomino"/>
	@endisset
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="space-y-3">
			<div class="flex items-center mt-3">
				<input wire:model="towed_intervention.thermical_isolation_intervention"
				       id="thermical_isolation_intervention"
				       name="thermical_isolation_intervention" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="thermical_isolation_intervention"
				       class="ml-3 block text-sm font-medium text-gray-700">1. Intervento di isolamento termico delle
					superfici opache verticali, orizzontali e inclinate</label>
			</div>
			<x-label>Le superfici oggetto dell'intervento sono:</x-label>
			<div class="flex items-center justify-between">
				<nav class="flex space-x-4">
					<div wire:click="$set('currentSurface', 'PV')"
					     class="flex items-center space-x-2 @if($currentSurface === 'PV') bg-gray-100 text-gray-700 @else text-gray-500 hover:text-gray-700 @endif px-3 py-2 font-medium text-sm rounded-md cursor-pointer">
						<span>(PV) Pareti Verticali</span>
					</div>

					<div wire:click="$set('currentSurface', 'PO')"
					     class="flex items-center space-x-2 @if($currentSurface === 'PO') bg-gray-100 text-gray-700 @else text-gray-500 hover:text-gray-700 @endif px-3 py-2 font-medium text-sm rounded-md cursor-pointer">
						<span>(PO) Coperture</span>
					</div>

					<div wire:click="$set('currentSurface', 'PS')"
					     class="flex items-center space-x-2 @if($currentSurface === 'PS') bg-gray-100 text-gray-700 @else text-gray-500 hover:text-gray-700 @endif px-3 py-2 font-medium text-sm rounded-md cursor-pointer">
						<span>(PS) Pavimenti</span>
					</div>

					<div wire:click="$set('currentSurface', 'POND')"
					     class="flex items-center space-x-2 @if($currentSurface === 'POND') bg-gray-100 text-gray-700 @else text-gray-500 hover:text-gray-700 @endif px-3 py-2 font-medium text-sm rounded-md cursor-pointer">
						<span>(POND) Cop. non disperdenti</span>
					</div>
				</nav>
				<x-button type="button"
				          wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-surface', {{ json_encode(['practice' => $practice->id, 'intervention' => 'towed', 'condomino_id' => $condomino_id, 'is_common' => $is_common, 'type' => $currentSurface]) }})"
				          prepend="plus" iconColor="text-white">
					Aggiungi {{ strtoupper($currentSurface) }}
				</x-button>
			</div>
			<div>
				@switch($currentSurface)
					@case('PV')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.pv-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="towed"
								:condomino_id="$condomino_id"/>
						@break
					@case('PO')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.po-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="towed"
								:condomino_id="$condomino_id"/>
						@break
					@case('PS')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.ps-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="towed"
								:condomino_id="$condomino_id"/>
						@break
					@case('POND')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.pond-surface
								:practice="$practice" :currentSurface="$currentSurface" intervention="towed"
								:condomino_id="$condomino_id"/>
						@break
				@endswitch
			</div>
			<div>
				<x-label for="total_intervention_surface">Superficie totale oggetto dell'intervento *:</x-label>
				<div class="w-44 mb-1">
					<x-input wire:model.defer="towed_intervention.total_intervention_surface" type="number"
					         name="total_intervention_surface"
					         id="total_intervention_surface" append="m²"></x-input>
				</div>
			</div>
			<div>
				<x-label>Il costo complessivo previsto in progetto dei lavori sulle pratiche opache ammonta a *:
				</x-label>
				<div class="w-44 mb-1">
					<x-input x-mask:dynamic="$money($input, ',')"
					         wire:model.defer="towed_intervention.total_expected_cost"
					         name="total_expected_cost" id="total_expected_cost"
					         type="text"
					         label="Importo stimato" placeholder="0,00" append="€"></x-input>
				</div>
				<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es. progettazione, direzione
					lavori, asseverazione tecnica e fiscale)</p>
			</div>
			<x-card class="p-4 border rounded-md">
				Sezione Infissi
			</x-card>
			<x-card class="p-4 border rounded-md">
				<div class="space-y-3">
					<livewire:practice.tabs.superbonus110.intervention.sunscreens :practice="$practice"
					                                                              :condomino_id="$condomino_id"
					                                                              :is_common="$is_common"/>
					<div>
						<x-label for="ss_project_cost">Le spese previste in progetto dei lavori al punto SS ammontano a
							*:
						</x-label>
						<div class="w-44 mb-1">
							<x-input x-mask:dynamic="$money($input, ',')"
							         wire:model.defer="towed_intervention.ss_project_cost"
							         name="ss_project_cost" id="ss_project_cost"
							         type="text" placeholder="0,00" append="€"></x-input>
						</div>
					</div>
					<div>
						<x-label for="ss_project_cost">La spesa massima ammissibile è pari a:</x-label>
						<div class="w-44 mb-1">
							<x-input x-mask:dynamic="$money($input, ',')"
							         wire:model.defer="towed_intervention.ss_max_cost"
							         name="ss_max_cost" id="ss_max_cost"
							         type="text" placeholder="0,00" append="€"></x-input>
						</div>
					</div>
					<div>
						<x-label for="ss_project_cost">Il risparmio di energia primaria non rinnovabile di progetto è
							:
						</x-label>
						<div class="w-44 mb-1">
							<x-input wire:model.defer="towed_intervention.ss_energetic_savings"
							         name="ss_energetic_savings" id="ss_energetic_savings"
							         type="number" append="KWh" hint="all'anno"></x-input>
						</div>
					</div>
				</div>
			</x-card>
			<hr>
			<div class="flex items-center mt-3">
				<input wire:model="towed_intervention.wacs_replacement"
				       id="wacs_replacement"
				       name="wacs_replacement" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="wacs_replacement"
				       class="ml-3 block text-sm font-medium text-gray-700">2. Intervento di sostituzione degli impianti
					di climatizzazione invernale esistenti</label>
			</div>
			<div class="space-y-5">
				<x-label>Con impianti dotati di:</x-label>
				<livewire:practice.tabs.superbonus110.intervention.condensing-boilers :practice="$practice"
				                                                                      :condomino_id="$condomino_id"
				                                                                      :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.condensing-hot-air-generators :practice="$practice"
				                                                                                 :condomino_id="$condomino_id"
				                                                                                 :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.absorption-heat-pumps :practice="$practice"
				                                                                         :condomino_id="$condomino_id"
				                                                                         :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.hybrid-systems :practice="$practice"
				                                                                  :condomino_id="$condomino_id"
				                                                                  :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.microgeneration-systems :practice="$practice"
				                                                                           :condomino_id="$condomino_id"
				                                                                           :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.water-heatpumps-installations :practice="$practice"
				                                                                                 :condomino_id="$condomino_id"
				                                                                                 :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.biome-generators :practice="$practice"
				                                                                    :condomino_id="$condomino_id"
				                                                                    :is_common="$is_common"/>
				<strong>BA MANCANTE</strong>
				<div>
					<x-label>Destinati a:</x-label>
					<div class="sm:flex sm:items-center sm:flex-wrap">
						<div class="flex items-center sm:mr-5 mb-2">
							<input wire:model="towed_intervention.use_winter"
							       name="use_winter" type="checkbox"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
							<label for="use_winter"
							       class="ml-3 block text-sm font-medium text-gray-700">Climatizzazione
								invernale</label>
						</div>
						<div class="flex items-center sm:mr-5 mb-2">
							<input wire:model="towed_intervention.use_summer"
							       name="use_summer" type="checkbox"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
							<label for="use_summer"
							       class="ml-3 block text-sm font-medium text-gray-700">Climatizzazione estiva</label>
						</div>
						<div class="flex items-center sm:mr-5 mb-2">
							<input wire:model="towed_intervention.use_water"
							       name="use_water" type="checkbox"
							       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
							<label for="use_water"
							       class="ml-3 block text-sm font-medium text-gray-700">Produzione di acqua calda
								sanitaria</label>
						</div>
					</div>
				</div>
				<livewire:practice.tabs.superbonus110.intervention.solar-panels :practice="$practice"
				                                                                :condomino_id="$condomino_id"
				                                                                :is_common="$is_common"/>
				<strong>FV MANCANTE</strong><br>
				<strong>AC MANCANTE</strong><br>
				<strong>CR MANCANTE</strong><br>
				<strong>EBA MANCANTE</strong>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
			<x-button>Salva</x-button>
		</div>
	</form>
</div>