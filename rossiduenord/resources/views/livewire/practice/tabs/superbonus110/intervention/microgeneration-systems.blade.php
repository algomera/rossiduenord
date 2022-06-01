<div>
	<div class="flex items-center">
		<label for="condensing_boiler"
		       class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span>CO. Sistemi di microgenerazione</span>
			<x-button
					wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-microgeneration-system', {{ json_encode(['practice' => $practice->id, 'condomino_id' => $condomino_id, 'is_common' => $is_common]) }})"
					type="button" size="sm">
				<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
			</x-button>
		</label>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($microgeneration_systems as $i => $microgeneration_system)
				<li class="py-4 flex">
					<div class="flex items-center justify-center text-sm bg-gray-50 border border-gray-200 font-semibold h-8 w-8 rounded-full flex-shrink-0">
						{{ $i + 1 }}
					</div>
					<div class="ml-3">
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($microgeneration_system->tipo_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo sostituito:</span>
									<span>{{ $microgeneration_system->tipo_sostituito }}</span>
								</p>
							@endisset
							@isset($microgeneration_system->p_nom_sostituito)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">P. nom. sostituito:</span>
									<span>{{ $microgeneration_system->p_nom_sostituito }} kW</span>
								</p>
							@endisset
							@isset($microgeneration_system->p_elettrica)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Potenza elettrica:</span>
									<span>{{ $microgeneration_system->p_elettrica }} kW</span>
								</p>
							@endisset
							@isset($microgeneration_system->p_immessa)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Potenza immessa:</span>
									<span>{{ $microgeneration_system->p_immessa }} kW</span>
								</p>
							@endisset
							@isset($microgeneration_system->p_term_recuperata)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Potenza termica recuperata:</span>
									<span>{{ $microgeneration_system->p_term_recuperata }} kW</span>
								</p>
							@endisset
							@isset($microgeneration_system->pes)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">PES:</span>
									<span>{{ $microgeneration_system->pes }} %</span>
								</p>
							@endisset
							@isset($microgeneration_system->tipo_di_alimentazione)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo di alimentazione:</span>
									<span>{{ $microgeneration_system->tipo_di_alimentazione }}</span>
								</p>
							@endisset
							@isset($microgeneration_system->tipo_intervento)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo intervento:</span>
									<span>{{ $microgeneration_system->tipo_intervento }}</span>
								</p>
							@endisset
							@isset($microgeneration_system->potenza_risc_suppl)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Potenza risc. suppl.:</span>
									<span>{{ $microgeneration_system->potenza_risc_suppl }} kW</span>
								</p>
							@endisset
							@isset($microgeneration_system->efficienza_ns)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Efficienza ns:</span>
									<span>{{ $microgeneration_system->efficienza_ns }} %</span>
								</p>
							@endisset
							@isset($microgeneration_system->classe_energ)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Classe energetica:</span>
									<span>{{ $microgeneration_system->classe_energ }}</span>
								</p>
							@endisset
							@isset($microgeneration_system->a_celle_a_combustibile)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">A celle a combustibile:</span>
									<span>{{ $microgeneration_system->a_celle_a_combustibile ? 'Si' : 'No' }}</span>
								</p>
							@endisset
							@isset($microgeneration_system->riscaldatore_suppl)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Riscaldatore suppl.:</span>
									<span>{{ $microgeneration_system->riscaldatore_suppl ? 'Si' : 'No' }}</span>
								</p>
							@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessun sistema inserito
				</li>
			@endforelse
		</ul>
	</div>
</div>