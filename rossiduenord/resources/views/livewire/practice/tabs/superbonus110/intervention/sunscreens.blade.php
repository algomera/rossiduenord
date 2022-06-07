<div>
	<div class="flex items-center">
		<label for="condensing_boiler"
		       class="flex items-center space-x-3 block text-sm font-medium text-gray-700">
			<span>SS. Schermature solari e chiusure oscuranti</span>
			<x-button
					wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-sunscreen', {{ json_encode(['practice' => $practice->id, 'condomino_id' => $condomino_id, 'is_common' => $is_common]) }})"
					type="button" size="sm">
				<x-icon name="plus" class="w-3 h-3 text-white"></x-icon>
			</x-button>
		</label>
	</div>
	<div class="mt-3 px-4 bg-gray-50 rounded-md">
		<ul role="list" class="divide-y divide-gray-200">
			@forelse($sunscreens as $i => $sunscreen)
				<li class="py-4 flex">
					<div class="flex items-center justify-center text-sm bg-gray-50 border border-gray-200 font-semibold h-8 w-8 rounded-full flex-shrink-0">
						{{ $i + 1 }}
					</div>
					<div class="ml-3">
						<div class="flex flex-col mt-1 flex-wrap">
							@isset($sunscreen->tipo_schermatura)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo schermatura/chiusura:</span>
									<span>{{ $sunscreen->tipo_schermatura }}</span>
								</p>
							@endisset
							@isset($sunscreen->installazione)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Installazione:</span>
									<span>{{ $sunscreen->installazione }}</span>
								</p>
							@endisset
							@isset($sunscreen->sup_schermatura)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Sup. schermatura/chiusura oscurante:</span>
									<span>{{ $sunscreen->sup_schermatura }} m²</span>
								</p>
							@endisset
							@isset($sunscreen->sup_finestra_protetta)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Sup. finestra protetta:</span>
									<span>{{ $sunscreen->sup_finestra_protetta }} m²</span>
								</p>
							@endisset
							@isset($sunscreen->resist_termica_suppl)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Resist. termica suppl.:</span>
									<span>{{ $sunscreen->resist_termica_suppl }} m²K/W</span>
								</p>
							@endisset
							@isset($sunscreen->orientamento)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Orientamento:</span>
									<span>{{ $sunscreen->orientamento }}</span>
								</p>
							@endisset
							@isset($sunscreen->tipo_di_calcolo)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Tipo di calcolo:</span>
									<span>{{ $sunscreen->tipo_di_calcolo }}</span>
								</p>
							@endisset
							@isset($sunscreen->gtot)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Gtot</span>
									<span>{{ $sunscreen->gtot }}</span>
								</p>
							@endisset
							@isset($sunscreen->classe_scherm)
								<p class="text-sm text-gray-500 mr-1 mb-1">
									<span class="font-bold">Classe scherm.:</span>
									<span>{{ $sunscreen->classe_scherm }}</span>
								</p>
							@endisset
								@isset($sunscreen->materiale_scherm)
									<p class="text-sm text-gray-500 mr-1 mb-1">
										<span class="font-bold">Materiale scherm.:</span>
										<span>{{ $sunscreen->materiale_scherm }}</span>
									</p>
								@endisset
								@isset($sunscreen->meccanismo_reg)
									<p class="text-sm text-gray-500 mr-1 mb-1">
										<span class="font-bold">Meccanismo reg.:</span>
										<span>{{ $sunscreen->meccanismo_reg }}</span>
									</p>
								@endisset
						</div>
					</div>
				</li>
			@empty
				<li class="py-4 text-sm text-gray-500">
					Nessuna schermatura/chiusura inserita
				</li>
			@endforelse
		</ul>
	</div>
</div>