<form wire:submit.prevent="save" class="space-y-5">
	<div>
		<x-label>Richiedente *</x-label>
		<fieldset class="mt-2">
			<div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
				<div class="flex items-center">
					<input wire:model.defer="applicant_type" id="applicant_type" name="applicant_type" type="radio"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300" value="impresa">
					<label for="applicant_type" class="ml-3 block text-sm font-medium text-gray-700">Impresa/General
						Contractor</label>
				</div>
			</div>
		</fieldset>
	</div>

	<div class="grid grid-cols-1 sm:grid-cols-12 gap-4">
		<div class="col-span-12">
			<x-input wire:model.defer="company_name" id="company_name" type="text" name="company_name" required
			         label="Dati impresa"></x-input>
		</div>
		<div class="col-span-12">
			<x-input x-mask="aaaaaa99a99a999a" wire:model.defer="c_f" id="c_f" type="text" name="c_f" required
			         label="Codice Fiscale" class="uppercase"></x-input>
		</div>
		<div class="col-span-12 md:col-span-6">
			<x-input x-mask="999 9999999" wire:model.defer="phone" id="phone" type="text" name="phone" required
			         label="Telefono"></x-input>
		</div>
		<div class="col-span-12 md:col-span-6">
			<x-input x-mask="999 9999999" wire:model.defer="mobile_phone" id="mobile_phone" type="text"
			         name="mobile_phone" required
			         label="Cellulare"></x-input>
		</div>
		<div class="col-span-12">
			<x-input wire:model.defer="email" id="email" type="email" name="email" required label="Email"></x-input>
		</div>
	</div>

	<div>
		<x-label>Ruolo nella Pratica *</x-label>
		<fieldset class="mt-2">
			<div class="space-y-4 sm:flex sm:items-center sm:space-y-0 sm:space-x-10">
				<div class="flex items-center">
					<input wire:model.defer="role" id="persona_fisica" name="role" type="radio" value="persona_fisica"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
					<label for="persona_fisica" class="ml-3 block text-sm font-medium text-gray-700">Persona
						Fisica</label>
				</div>
				<div class="flex items-center">
					<input wire:model.defer="role" id="amministratore_condominio" name="role" type="radio"
					       value="amministratore_condominio"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
					<label for="amministratore_condominio" class="ml-3 block text-sm font-medium text-gray-700">Amministratore
						di condominio</label>
				</div>
				<div class="flex items-center">
					<input wire:model.defer="role" id="condomino_incaricato" name="role" type="radio"
					       value="condomino_incaricato"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
					<label for="condomino_incaricato" class="ml-3 block text-sm font-medium text-gray-700">Condomino
						incaricato</label>
				</div>
				<div class="flex items-center">
					<input wire:model.defer="role" id="unico_proprietario" name="role" type="radio"
					       value="unico_proprietario"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
					<label for="unico_proprietario" class="ml-3 block text-sm font-medium text-gray-700">Unico
						proprietario di condominio</label>
				</div>
				<div class="flex items-center">
					<input wire:model.defer="role" id="titolare_ditta" name="role" type="radio" value="titolare_ditta"
					       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
					<label for="titolare_ditta" class="ml-3 block text-sm font-medium text-gray-700">Titolare
						Ditta</label>
				</div>
			</div>
		</fieldset>
		<x-input-error for="role"></x-input-error>
	</div>

	<div class="flex justify-end space-x-3">
		<x-link-button href="{{route('dashboard')}}">Annulla</x-link-button>
		<x-button class="hidden" wire:dirty.class.remove="hidden"
		          wire:target="applicant_type, company_name, c_f, phone, mobile_phone, email, role">Salva
		</x-button>
		<x-button type="button" wire:click="$emitUp('change-tab', 'practice')" wire:dirty.class="hidden"
		          wire:target="applicant_type, company_name, c_f, phone, mobile_phone, email, role">Avanti
		</x-button>
	</div>
</form>

@push('notifications')
	<x-notification/>
@endpush
