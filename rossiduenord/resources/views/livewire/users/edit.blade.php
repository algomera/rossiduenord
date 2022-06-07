<x-card class="p-4">
	<form wire:submit.prevent="save" class="space-y-5">
		<div class="grid grid-cols-12 gap-6">
			<div class="col-span-12">
				<x-select wire:model="role" name="role" id="role" label="Tipologia Profilo" required>
					<option value="null" selected disabled>Seleziona..</option>
					@foreach(config('gestione_accessi.' . auth()->user()->role) as $k => $role)
						<option value="{{ $k }}" wire:key="{{$loop->index}}">{{ ucfirst($role) }}</option>
					@endforeach
				</x-select>
			</div>

			<div class="col-span-12" x-data="{ show: @entangle('showBusiness') }" x-show="show">
				<div>
					<x-label>A chi vuoi associare questo utente?</x-label>
					<div class="sm:flex sm:items-center sm:flex-wrap">
						@foreach($business as $b)
							<div class="flex items-center sm:mr-5 mb-2">
								<input wire:model="selectedBusiness"
								       name="business[]" id="business_{{ $b->id }}" type="checkbox"
								       value="{{ $b->id }}"
								       class="focus:ring-indigo-500 h-4 w-4 text-indigo-600 border-gray-300 rounded">
								<label for="business_{{ $b->id }}"
								       class="ml-3 block text-sm font-medium text-gray-700">{{ ucfirst($b->name) }}</label>
							</div>
						@endforeach
					</div>
					<x-input-error for="selectedBusiness"></x-input-error>
				</div>
			</div>

			<div class="col-span-12">
				<x-input wire:model.defer="name" type="text" name="name" id="name" label="Nome" required></x-input>
			</div>
			<div class="col-span-12">
				<x-input wire:model.defer="email" type="email" name="email" id="email" label="Email" required></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="password" type="password" name="password" id="password" label="Password"></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="password_confirmation" type="password" name="password_confirmation"
				         id="password_confirmation" label="Conferma Password"></x-input>
			</div>
		</div>

		<x-button>Aggiorna</x-button>
	</form>
</x-card>