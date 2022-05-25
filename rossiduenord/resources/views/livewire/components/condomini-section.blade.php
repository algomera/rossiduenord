<div>
	<x-section-heading>
		Anagrafica e lista dei condomini
		<x-slot name="actions">
			<div class="flex items-center justify-between w-full">
				<x-button type="button" prepend="plus" iconColor="text-white"
				          wire:click="$emit('openModal', 'modals.condomino.create', {{ json_encode([$practice->id]) }})">
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
			<li class="py-4 text-sm text-gray-500">
				Nessun condomino inserito
			</li>
		@endforelse
	</ul>
	<div class="flex items-center justify-between mt-5">
		<div class="flex items-center space-x-5">
			<label class="block">
				<span class="sr-only">Scegli..</span>
				<input wire:model="tmp_excel_file" type="file" class="block w-full text-sm text-slate-500
			      file:mr-4 file:py-2 file:px-4
			      file:rounded-full file:border-0
			      file:text-sm file:font-semibold
			      file:bg-indigo-50 file:text-indigo-700
			      hover:file:bg-indigo-100
			    "/>
			</label>
			@if($tmp_excel_file)
				<x-button wire:click="importExcel" type="button" prepend="upload" iconColor="text-white">
					Carica file
				</x-button>
			@endif
			<div wire:loading wire:target="tmp_excel_file" class="ml-2">
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