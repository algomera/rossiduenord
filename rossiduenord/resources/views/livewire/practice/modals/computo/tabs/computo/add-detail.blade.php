<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-12 gap-4">
			<div class="col-span-12">
				<x-textarea wire:model.defer="note" name="note" id="note" rows="5"
				         label="Commento"></x-textarea>
			</div>
			<div class="col-span-12">
				<x-input wire:model.defer="expression" type="text" name="expression" id="expression"
				         label="Espressione"></x-input>
			</div>
			<div class="col-span-12">
				<x-input wire:model.defer="nps" type="text" name="nps" id="nps"
				         label="NPS"></x-input>
			</div>
			<div class="col-span-12">
				<x-input wire:model.defer="length" type="text" name="length" id="length"
				         label="Lunghezza"></x-input>
			</div>
			<div class="col-span-12">
				<x-input wire:model.defer="width" type="text" name="width" id="width"
				         label="Larghezza"></x-input>
			</div>
			<div class="col-span-12">
				<x-input wire:model.defer="hps" type="text" name="hps" id="hps"
				         label="H-P-S"></x-input>
			</div>
			<div class="col-span-12">
				Totale: XXXX
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
			<x-button type="submit">Salva</x-button>
		</div>
	</form>
</x-card>