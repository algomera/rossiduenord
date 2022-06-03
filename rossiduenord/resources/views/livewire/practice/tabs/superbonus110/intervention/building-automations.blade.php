<div>
	<div class="flex items-center">
		<label class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span>BA. Building Automation</span>
			@if(!$building_automations->count())
				<x-button
						wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-building-automation', {{ json_encode(['practice' => $practice->id, 'condomino_id' => $condomino_id, 'is_common' => $is_common]) }})"
						type="button" size="sm">
					<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
				</x-button>
			@endif
		</label>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($building_automations as $i => $building_automation)
				<li class="py-4 flex">
					<div>
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($building_automation->ba_winter_acs)
								@if($building_automation->ba_winter_acs !== 'notDefine')
									<p class="flex items-center text-sm text-gray-500 mr-1 mb-1">
										<span class="font-bold">Climatizzazione invernale:</span>
										<x-icon name="{{ $building_automation->ba_winter_acs === 'no' ? 'close' : 'check' }}"
										        class="w-5 h-5 {{ $building_automation->ba_winter_acs === 'no' ? 'text-red-500' : 'text-green-500' }}"></x-icon>
									</p>
								@endif
							@endisset
							@isset($building_automation->ba_summer_acs)
								@if($building_automation->ba_summer_acs !== 'notDefine')
									<p class="flex items-center text-sm text-gray-500 mr-1 mb-1">
										<span class="font-bold">Climatizzazione estiva:</span>
										<x-icon name="{{ $building_automation->ba_summer_acs === 'no' ? 'close' : 'check' }}"
										        class="w-5 h-5 {{ $building_automation->ba_summer_acs === 'no' ? 'text-red-500' : 'text-green-500' }}"></x-icon>
									</p>
								@endif
							@endisset
							@isset($building_automation->ba_hot_water_production)
								@if($building_automation->ba_hot_water_production !== 'notDefine')
									<p class="flex items-center text-sm text-gray-500 mr-1 mb-1">
										<span class="font-bold">Produzione di acqua calda sanitaria:</span>
										<x-icon name="{{ $building_automation->ba_hot_water_production === 'no' ? 'close' : 'check' }}"
										        class="w-5 h-5 {{ $building_automation->ba_hot_water_production === 'no' ? 'text-red-500' : 'text-green-500' }}"></x-icon>
									</p>
								@endif
							@endisset
							@isset($building_automation->ba_usable_area)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Superficie utile degli ambienti controllati:</span>
									<span>{{ $building_automation->ba_usable_area }} m²</span>
									<span class="block text-xs italic">I dispositivi installati hanno caratteristiche e funzioni conformi a quanto previsto dal “decreto requisiti ecobonus”</span>
								</p>
							@endisset
							@isset($building_automation->ba_project_cost)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Il costo previsto per Building automation BA ammonta a *:</span>
									<span>{{ $building_automation->ba_project_cost }} €</span>
									<span class="block text-xs italic">* Incluso iva e spese professionali (es. progettazione, direzione lavori, assservazione tecnica e fiscale)</span>
								</p>
							@endisset
							@isset($building_automation->ba_max_cost)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">La spesa massima ammissibile dal “decreto requisiti ecobonus” è pari a:</span>
									<span>{{ $building_automation->ba_max_cost }} €</span>
								</p>
							@endisset
							@isset($building_automation->ba_energetic_savings)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Il risparmio di energia primaria non rinnovabile di progetto è:</span>
									<span>{{ $building_automation->ba_energetic_savings }} KWh/anno</span>
								</p>
							@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessun building automation inserito
				</li>
			@endforelse
		</ul>
	</div>
</div>