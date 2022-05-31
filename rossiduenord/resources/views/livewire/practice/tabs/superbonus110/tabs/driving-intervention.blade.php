<x-card class="space-y-5 border p-4 rounded-md">
	<form wire:submit.prevent="save" class="space-y-5">
		<x-section-heading class="pt-0 border-t-0">Interventi trainanti oggetto dei lavori</x-section-heading>
		<div class="space-y-3">
			<div class="flex items-center mt-3">
				<input wire:model="driving_intervention.thermical_isolation_intervention"
				       id="thermical_isolation_intervention"
				       name="thermical_isolation_intervention" type="checkbox"
				       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
				<label for="thermical_isolation_intervention"
				       class="ml-3 block text-sm font-medium text-gray-700">Intervento di isolamento termico delle
					superfici opache verticali, orizzontali e inclinate</label>
			</div>
			<div>
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
					          wire:click="$emit('openModal', 'practice.tabs.superbonus110.tabs.driving-intervention.modals.add-surface', {{ json_encode(['practice' => $practice->id, 'intervention' => 'driving', 'condomino_id' => null, 'is_common' => 0, 'type' => $currentSurface]) }})"
					          prepend="plus" iconColor="text-white">
						Aggiungi {{ strtoupper($currentSurface) }}
					</x-button>
				</div>
				@switch($currentSurface)
					@case('PV')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.pv-surface
								:practice="$practice" :currentSurface="$currentSurface"/>
						@break
					@case('PO')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.po-surface
								:practice="$practice" :currentSurface="$currentSurface"/>
						@break
					@case('PS')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.ps-surface
								:practice="$practice" :currentSurface="$currentSurface"/>
						@break
					@case('POND')
						<livewire:practice.tabs.superbonus110.tabs.driving-intervention.surface.pond-surface
								:practice="$practice" :currentSurface="$currentSurface"/>
						@break
				@endswitch
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
			<x-button>Salva</x-button>
		</div>
	</form>
</x-card>