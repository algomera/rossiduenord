<div>
	<form wire:submit.prevent="save" class="space-y-5">

		<div class="grid grid-cols-1 gap-4">
			<x-input wire:model="type" id="type" type="text" name="type" value="{{ old('type') ?? auth()->user()->user_data->type }}" required label="Ragione Sociale"></x-input>
			<x-input wire:model="p_iva" id="p_iva" type="text" name="p_iva" value="{{ old('p_iva') ?? auth()->user()->user_data->p_iva }}" required label="Partita IVA"></x-input>
			<x-input wire:model="c_f" id="c_f" type="text" name="c_f" value="{{ old('c_f') ?? auth()->user()->user_data->c_f }}" required label="Codice Fiscale"></x-input>
			<x-input wire:model="legal_form" id="legal_form" type="text" name="legal_form" value="{{ old('legal_form') ?? auth()->user()->user_data->legal_form }}" required label="Forma legale"></x-input>
			<x-input wire:model="rea" id="rea" type="text" name="rea" value="{{ old('rea') ?? auth()->user()->user_data->rea }}" required label="CCIAA + REA"></x-input>
			<x-input wire:model="c_ateco" id="c_ateco" type="text" name="c_ateco" value="{{ old('c_ateco') ?? auth()->user()->user_data->c_ateco }}" required label="Codice Ateco"></x-input>
			<x-input wire:model="reg_date" id="reg_date" type="text" name="reg_date" value="{{ old('reg_date') ?? auth()->user()->user_data->reg_date }}" required label="Dati registrazione"></x-input>
		</div>

		<x-button>Salva</x-button>
	</form>
</div>