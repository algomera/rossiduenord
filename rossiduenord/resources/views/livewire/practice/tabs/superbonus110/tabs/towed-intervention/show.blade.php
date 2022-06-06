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
				<x-label for="total_expected_cost">Il costo complessivo previsto in progetto dei lavori sulle pratiche
					opache ammonta a *:
				</x-label>
				<div class="w-44 mb-1">
					<x-input-euro wire:model.defer="towed_intervention.total_expected_cost"
					              name="total_expected_cost" id="total_expected_cost" label="Importo stimato"/>
				</div>
				<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es. progettazione, direzione
					lavori, asseverazione tecnica e fiscale)</p>
			</div>
			<x-card class="p-4 border rounded-md">
				<div class="space-y-3">
					Sezione Infissi
					<div>
						<x-label for="in_project_cost">Le spese previste in progetto dei lavori al punto IN ammontano a
							*:
						</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.in_project_cost"
							              name="in_project_cost" id="in_project_cost"/>
						</div>
						<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es. progettazione,
							direzione
							lavori, asseverazione tecnica e fiscale)</p>
					</div>
					<div>
						<x-label for="work_expected_cost">La spesa prevista per gli interventi di cui ai punti PV, PO,
							PS e IN ammonta a
							*:
						</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.work_expected_cost"
							              name="work_expected_cost" id="work_expected_cost"/>
						</div>
						<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es. progettazione,
							direzione
							lavori, asseverazione tecnica e fiscale)</p>
					</div>
					<div>
						<x-label for="in_max_cost">La spesa massima ammissibile è pari a:</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.in_max_cost"
							              name="in_max_cost" id="in_max_cost"/>
						</div>
					</div>
					<div>
						<x-label for="in_energetic_savings">Il risparmio di energia primaria non rinnovabile di progetto
							è
							:
						</x-label>
						<div class="w-44 mb-1">
							<x-input wire:model.defer="towed_intervention.in_energetic_savings"
							         name="in_energetic_savings" id="in_energetic_savings"
							         type="number" append="KWh" hint="all'anno"></x-input>
						</div>
					</div>
				</div>
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
							<x-input-euro wire:model.defer="towed_intervention.ss_project_cost"
							              name="ss_project_cost" id="ss_project_cost"/>
						</div>
					</div>
					<div>
						<x-label for="ss_max_cost">La spesa massima ammissibile è pari a:</x-label>
						<div class="w-44 mb-1">
							<x-input-euro wire:model.defer="towed_intervention.ss_max_cost"
							              name="ss_max_cost" id="ss_max_cost"/>
						</div>
					</div>
					<div>
						<x-label for="ss_energetic_savings">Il risparmio di energia primaria non rinnovabile di progetto
							è
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
				<livewire:practice.tabs.superbonus110.intervention.heat-pumps :practice="$practice"
				                                                              :condomino_id="$condomino_id"
				                                                              :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.absorption-heat-pumps :practice="$practice"
				                                                                         :condomino_id="$condomino_id"
				                                                                         :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.hybrid-systems :practice="$practice"
				                                                                  :condomino_id="$condomino_id"
				                                                                  :is_common="$is_common"/>
				<x-card class="border p-4 rounded-md">
					<div class="space-y-3">
						<livewire:practice.tabs.superbonus110.intervention.water-heatpumps-installations
								:practice="$practice"
								:condomino_id="$condomino_id"
								:is_common="$is_common"/>
						<div>
							<x-label for="sa_project_cost">Il costo complessivo previsto degli interventi sull'impianto
								(Punto 2) ammonta a
								*:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.sa_project_cost"
								              name="sa_project_cost" id="sa_project_cost"/>
							</div>
							<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es.
								progettazione, direzione
								lavori, asseverazione tecnica e fiscale)</p>
						</div>
						<div>
							<x-label for="sa_max_cost">La spesa massima ammissibile per la sostituzione degli
								impianti è pari a:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.sa_max_cost"
								              name="sa_max_cost" id="sa_max_cost"/>
							</div>
						</div>
						<div>
							<x-label for="sa_energetic_savings">Il risparmio di energia primaria non rinnovabile di
								progetto
								è
								:
							</x-label>
							<div class="w-44 mb-1">
								<x-input wire:model.defer="towed_intervention.sa_energetic_savings"
								         name="sa_energetic_savings" id="sa_energetic_savings"
								         type="number" append="KWh" hint="all'anno"></x-input>
							</div>
						</div>
					</div>
				</x-card>
				<x-card class="border p-4 rounded-md">
					<div class="space-y-3">
						<livewire:practice.tabs.superbonus110.intervention.microgeneration-systems :practice="$practice"
						                                                                           :condomino_id="$condomino_id"
						                                                                           :is_common="$is_common"/>
						<div>
							<x-label for="co_project_cost">Il costo previsto per i sistemi di microgenerazione CO
								ammonta a *:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.co_project_cost"
								              name="co_project_cost" id="co_project_cost"/>
							</div>
							<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es.
								progettazione, direzione
								lavori, asseverazione tecnica e fiscale)</p>
						</div>
						<div>
							<x-label for="co_max_cost">La spesa massima ammissibile per l'intervento è pari a:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.co_max_cost"
								              name="co_max_cost" id="co_max_cost"/>
							</div>
						</div>
						<div>
							<x-label for="co_energetic_savings">Il risparmio di energia primaria non rinnovabile di
								progetto
								è
								:
							</x-label>
							<div class="w-44 mb-1">
								<x-input wire:model.defer="towed_intervention.co_energetic_savings"
								         name="co_energetic_savings" id="co_energetic_savings"
								         type="number" append="KWh" hint="all'anno"></x-input>
							</div>
						</div>
					</div>
				</x-card>
				<x-card class="border p-4 rounded-md">
					<div class="space-y-3">
						<livewire:practice.tabs.superbonus110.intervention.biome-generators :practice="$practice"
						                                                                    :condomino_id="$condomino_id"
						                                                                    :is_common="$is_common"/>
						<div>
							<x-label for="ib_project_cost">Il costo previsto per i generatori a biomassa IB
								ammonta a *:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.ib_project_cost"
								              name="ib_project_cost" id="ib_project_cost"/>
							</div>
							<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es.
								progettazione, direzione
								lavori, asseverazione tecnica e fiscale)</p>
						</div>
						<div>
							<x-label for="ib_max_cost">La spesa massima ammissibile per l'intervento è pari a:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.ib_max_cost"
								              name="ib_max_cost" id="ib_max_cost"/>
							</div>
						</div>
						<div>
							<x-label for="ib_energetic_savings">Il risparmio di energia primaria non rinnovabile di
								progetto
								è
								:
							</x-label>
							<div class="w-44 mb-1">
								<x-input wire:model.defer="towed_intervention.ib_energetic_savings"
								         name="ib_energetic_savings" id="ib_energetic_savings"
								         type="number" append="KWh" hint="all'anno"></x-input>
							</div>
						</div>
					</div>
				</x-card>
				<livewire:practice.tabs.superbonus110.intervention.building-automations :practice="$practice"
				                                                                        :condomino_id="$condomino_id"
				                                                                        :is_common="$is_common"/>
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
				<x-card class="p-4 border rounded-md">
					<div class="space-y-3">
						<livewire:practice.tabs.superbonus110.intervention.solar-panels :practice="$practice"
						                                                                :condomino_id="$condomino_id"
						                                                                :is_common="$is_common"/>
						<div>
							<x-label for="ss_project_cost">Il costo previsto per i collettori solari ST ammonta a
								*:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.st_project_cost"
								              name="st_project_cost" id="st_project_cost"/>
							</div>
							<p class="mt-1 text-xs text-gray-500">* Incluso IVA e spese professionali (es.
								progettazione, direzione
								lavori, asseverazione tecnica e fiscale)</p>
						</div>
						<div>
							<x-label for="st_project_cost">La spesa massima ammissibile è pari a:</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.st_max_cost"
								              name="st_max_cost" id="st_max_cost"/>
							</div>
						</div>
						<div>
							<x-label for="st_project_cost">Il risparmio di energia primaria non rinnovabile di progetto
								è:
							</x-label>
							<div class="w-44 mb-1">
								<x-input wire:model.defer="towed_intervention.st_energetic_savings"
								         name="st_energetic_savings" id="st_energetic_savings"
								         type="number" append="KWh" hint="all'anno"></x-input>
							</div>
						</div>
					</div>
				</x-card>
				<x-card class="p-4 border rounded-md">
					<div class="space-y-3">
						<livewire:practice.tabs.superbonus110.intervention.photovoltaics :practice="$practice"
						                                                                 :condomino_id="$condomino_id"
						                                                                 :is_common="$is_common"/>
						<div>
							<x-label for="ss_project_cost">Il costo previsto per il fotovoltaico FV ammonta a
								*:
							</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.fv_project_cost"
								              name="fv_project_cost" id="fv_project_cost"/>
							</div>
						</div>
						<div>
							<x-label for="fv_project_cost">La spesa massima ammissibile è pari a:</x-label>
							<div class="w-44 mb-1">
								<x-input-euro wire:model.defer="towed_intervention.fv_max_cost"
								              name="fv_max_cost" id="fv_max_cost"/>
							</div>
						</div>
						<hr>
						<livewire:practice.tabs.superbonus110.intervention.storage-systems :practice="$practice"
						                                                                   :condomino_id="$condomino_id"
						                                                                   :is_common="$is_common"/>
					</div>
				</x-card>

				<livewire:practice.tabs.superbonus110.intervention.car-charge-infrastructures :practice="$practice"
				                                                                              :condomino_id="$condomino_id"
				                                                                              :is_common="$is_common"/>
				<livewire:practice.tabs.superbonus110.intervention.delete-barriers :practice="$practice"
				                                                                   :condomino_id="$condomino_id"
				                                                                   :is_common="$is_common"/>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
			<x-button>Salva</x-button>
		</div>
	</form>
</div>