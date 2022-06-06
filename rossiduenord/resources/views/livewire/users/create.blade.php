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
					<x-label>A chi vuoi associare l'utente?</x-label>
					<div id="asseverator_business" class="form-group">
						<div id="business" class="row">
							@foreach($business as $b)
								<div class="col-3">
									<input wire:model="selectedBusiness" type="checkbox" id="business_{{ $b->id }}" name="business[]"
									       value="{{ $b->id }}">
									<label for="business_{{ $b->id }}"> {{ ucfirst($b->name) }}</label>
								</div>
							@endforeach
						</div>
					</div>
				</div>
			</div>

			<div class="col-span-12">
				<x-input wire:model.defer="name" type="text" name="name" id="name" label="Nome" required></x-input>
			</div>
			<div class="col-span-12">
				<x-input wire:model.defer="email" type="email" name="email" id="email" label="Email" required></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="password" type="password" name="password" id="password" label="Password"
				         required></x-input>
			</div>
			<div class="col-span-12 sm:col-span-6">
				<x-input wire:model.defer="password_confirmation" type="password" name="password_confirmation"
				         id="password_confirmation" label="Conferma Password" required></x-input>
			</div>
		</div>

		<x-button>Salva</x-button>
	</form>
</x-card>