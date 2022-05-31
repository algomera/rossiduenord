<x-card class="p-4">
    <form wire:submit.prevent="save" class="space-y-5">
        <x-input wire:model.defer="description_surface" type="text" name="description_surface" id="description_surface" label="Descrizione"></x-input>
        <x-input wire:model.defer="surface" type="text" name="surface" id="surface" label="Superficie (m²)"></x-input>
        <x-input wire:model.defer="trasm_ante" type="text" name="trasm_ante" id="trasm_ante" label="Trasm. ante (W/m²k)"></x-input>
        <x-input wire:model.defer="trasm_post" type="text" name="trasm_post" id="trasm_post" label="Trasm. post (W/m²k)"></x-input>
        <x-input wire:model.defer="trasm_term" type="text" name="trasm_term" id="trasm_term" label="Trasm. Term. Period. YIE (W/m²k)"></x-input>
        <x-input wire:model.defer="confine" type="text" name="confine" id="confine" label="Confine"></x-input>
        <x-input wire:model.defer="insulation" type="text" name="insulation" id="insulation" label="Coibentazione"></x-input>

        <div class="flex justify-end space-x-3">
            <x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
            <x-button type="submit">Salva</x-button>
        </div>
    </form>
</x-card>