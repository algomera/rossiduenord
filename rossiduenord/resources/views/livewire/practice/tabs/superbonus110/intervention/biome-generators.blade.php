<div>
	<div class="flex flex-col items-start">
		<label for="condensing_boiler"
		       class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span>IB. Generatori a biomassa</span>
			<x-button
					wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-biome-generator', {{ json_encode(['practice' => $practice->id, 'condomino_id' => $condomino_id, 'is_common' => $is_common]) }})"
					type="button" size="sm">
				<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
			</x-button>
		</label>
		<p class="text-xs text-gray-500 mt-1">Installazione di impianti di climatizzazione invernale dotati di
			generatori di calore alimentati da biomasse combustibili</p>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($biome_generators as $i => $biome_generator)
				<li class="py-4 flex">
					<div class="flex items-center justify-center text-sm bg-gray-50 border border-gray-200 font-semibold h-8 w-8 rounded-full flex-shrink-0">
						{{ $i + 1 }}
					</div>
					<div class="ml-3">
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($biome_generator->tipo_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo sostituito:</span>
									<span>{{ $biome_generator->tipo_sostituito }}</span>
								</p>
							@endisset
							@isset($biome_generator->p_nom_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">P. nom. sostituito:</span>
									<span>{{ $biome_generator->p_nom_sostituito }} kW</span>
								</p>
							@endisset
							@isset($biome_generator->classe_generatore)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Classe generatore:</span>
									<span>{{ $biome_generator->classe_generatore }}</span>
								</p>
							@endisset
							@isset($biome_generator->tipo_generatore)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo generatore:</span>
									<span>{{ $biome_generator->tipo_generatore }}</span>
								</p>
							@endisset
							@isset($biome_generator->use_destination)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Impianto destinato a:</span>
									<span>{{ $biome_generator->use_destination }}</span>
								</p>
							@endisset
							@isset($biome_generator->tipo_di_alimentazione)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo di alimentazione:</span>
									<span>{{ $biome_generator->tipo_di_alimentazione }}</span>
								</p>
							@endisset
							@isset($biome_generator->p_utile_nom)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Pot. utile nom.:</span>
									<span>{{ $biome_generator->p_utile_nom }} kW</span>
								</p>
							@endisset
							@isset($biome_generator->p_al_focolare)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Pot. al focolare:</span>
									<span>{{ $biome_generator->p_al_focolare }} kW</span>
								</p>
							@endisset
							@isset($biome_generator->rend_utile_alla_pot_nom)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Rend. utile alla pot. nom.:</span>
									<span>{{ $biome_generator->rend_utile_alla_pot_nom }} %</span>
								</p>
							@endisset
							@isset($biome_generator->sup_riscaldata)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Sup. riscaldata:</span>
									<span>{{ $biome_generator->sup_riscaldata }} m²</span>
								</p>
							@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessun generatore inserito
				</li>
			@endforelse
		</ul>
	</div>
</div>