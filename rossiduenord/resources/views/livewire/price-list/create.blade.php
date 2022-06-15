<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<x-input wire:model.defer="name" type="text" name="name" label="Nome" required></x-input>
		<x-button>Salva</x-button>
	</form>
</x-card>