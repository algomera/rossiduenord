<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-3 gap-4 mt-2">
			<fieldset class="col-span-12">
				<x-label>Climatizzazione invernale:</x-label>
				<div class="sm:flex sm:items-center sm:flex-wrap">
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model.defer="ba_winter_acs" name="ba_winter_acs" type="radio"
						       value="notDefine"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="ba_winter_acs"
						       class="ml-3 block text-sm font-medium text-gray-700">N.D</label>
					</div>
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model.defer="ba_winter_acs" name="ba_winter_acs" type="radio"
						       value="no"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="ba_winter_acs"
						       class="ml-3 block text-sm font-medium text-gray-700">No</label>
					</div>
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model.defer="ba_winter_acs" name="ba_winter_acs" type="radio"
						       value="yes"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="ba_winter_acs"
						       class="ml-3 block text-sm font-medium text-gray-700">Si</label>
					</div>
				</div>
			</fieldset>
			<fieldset class="col-span-12">
				<x-label>Climatizzazione estiva:</x-label>
				<div class="sm:flex sm:items-center sm:flex-wrap">
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model.defer="ba_summer_acs" name="ba_summer_acs" type="radio"
						       value="notDefine"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="ba_summer_acs"
						       class="ml-3 block text-sm font-medium text-gray-700">N.D</label>
					</div>
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model.defer="ba_summer_acs" name="ba_summer_acs" type="radio"
						       value="no"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="ba_summer_acs"
						       class="ml-3 block text-sm font-medium text-gray-700">No</label>
					</div>
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model.defer="ba_summer_acs" name="ba_summer_acs" type="radio"
						       value="yes"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="ba_summer_acs"
						       class="ml-3 block text-sm font-medium text-gray-700">Si</label>
					</div>
				</div>
			</fieldset>
			<fieldset class="col-span-12">
				<x-label>Prod. di acqua calda sanitaria:</x-label>
				<div class="sm:flex sm:items-center sm:flex-wrap">
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model.defer="ba_hot_water_production" name="ba_hot_water_production"
						       type="radio" value="notDefine"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="ba_hot_water_production"
						       class="ml-3 block text-sm font-medium text-gray-700">N.D</label>
					</div>
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model.defer="ba_hot_water_production" name="ba_hot_water_production"
						       type="radio"
						       value="no"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="ba_hot_water_production"
						       class="ml-3 block text-sm font-medium text-gray-700">No</label>
					</div>
					<div class="flex items-center sm:mr-5 mb-2">
						<input wire:model.defer="ba_hot_water_production" name="ba_hot_water_production"
						       type="radio"
						       value="yes"
						       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300">
						<label for="ba_hot_water_production"
						       class="ml-3 block text-sm font-medium text-gray-700">Si</label>
					</div>
				</div>
			</fieldset>
		</div>
		<div>
			<x-label>Superficie utile degli ambienti controllati:</x-label>
			<div class="w-full sm:w-44 mb-1">
				<x-input wire:model.defer="ba_usable_area" type="number" name="ba_usable_area" id="ba_usable_area"
				         append="m²"></x-input>
			</div>
			<p class="mt-1 text-xs text-gray-500">I dispositivi installati hanno caratteristiche e funzioni conformi
				a quanto previsto dal “decreto requisiti ecobonus”</p>
		</div>
		<div>
			<x-label for="ss_project_cost">Il costo previsto per Building automation BA ammonta a *:
			</x-label>
			<div class="w-full sm:w-44 mb-1">
				<x-input x-mask:dynamic="$money($input, ',')"
				         wire:model.defer="ba_project_cost"
				         name="ba_project_cost" id="ba_project_cost"
				         type="text" placeholder="0,00" append="€"></x-input>
			</div>
			<p class="mt-1 text-xs text-gray-500">* Incluso iva e spese professionali (es. progettazione, direzione
				lavori, assservazione tecnica e fiscale)</p>
		</div>
		<div>
			<x-label for="ba_max_cost">La spesa massima ammissibile dal "decreto requisiti ecobonus" è pari a:
			</x-label>
			<div class="w-full sm:w-44 mb-1">
				<x-input x-mask:dynamic="$money($input, ',')"
				         wire:model.defer="ba_max_cost"
				         name="ba_max_cost" id="ba_max_cost"
				         type="text" placeholder="0,00" append="€"></x-input>
			</div>
		</div>
		<div>
			<x-label for="ba_energetic_savings">Il risparmio di energia primaria non rinnovabile di progetto è:
			</x-label>
			<div class="w-full sm:w-44 mb-1">
				<x-input wire:model.defer="ba_energetic_savings"
				         name="ba_energetic_savings" id="ba_energetic_savings"
				         type="number" append="KWh" hint="all'anno"></x-input>
			</div>
		</div>

		<div class="flex justify-end space-x-3">
			<x-link-button wire:click="$emit('closeModal')">Annulla</x-link-button>
			<x-button type="submit">Salva</x-button>
		</div>
	</form>
</x-card>