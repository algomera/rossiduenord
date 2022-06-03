<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-12 gap-4">
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="codice_pod" type="text" name="codice_pod" id="codice_pod"
				         label="Codice POD"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="potenza_di_picco" type="text" name="potenza_di_picco" id="potenza_di_picco"
				         label="Potenza di picco" append="kW"></x-input>
			</div>
		</div>
		<div class="flex justify-end space-x-3">
			<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
			<x-button type="submit">Salva</x-button>
		</div>
	</form>
</x-card>