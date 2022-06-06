<x-slot name="header">
	<x-page-header>
		Elenco utenti
		<x-slot name="actions">
			<x-button prepend="plus" iconColor="text-white"
			          x-on:click="Livewire.emit('openModal', 'users.create')">
				Aggiungi
			</x-button>
		</x-slot>
	</x-page-header>
</x-slot>
<x-card>
	<x-table.table>
		<x-table.thead>
			<tr>
				<x-table.th>#</x-table.th>
				<x-table.th>Nome</x-table.th>
				<x-table.th>Email</x-table.th>
				<x-table.th>Tipologia</x-table.th>
				<x-table.th>Associato a</x-table.th>
				<x-table.th>Creato da</x-table.th>
				<x-table.th></x-table.th>
			</tr>
		</x-table.thead>
		<x-table.tbody>
			@forelse ($users as $user)
				<tr>
					<x-table.td>{{$user->id}}</x-table.td>
					<x-table.td>{{$user->name}}</x-table.td>
					<x-table.td>{{$user->email}}</x-table.td>
					<x-table.td>
						<div class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800 uppercase">
							{{ $user->role }}
						</div>
					</x-table.td>
					<x-table.td>
						@foreach($user->business as $business)
							<div>
								{{ $business->name }}
							</div>
						@endforeach
					</x-table.td>
					<x-table.td>{{$user->parent->name ?? '-'}}</x-table.td>
					<x-table.td>
						<div class="flex items-center space-x-3">
							{{-- route('user.edit', $user) --}}
							<a href="#"
							   class="text-indigo-600 hover:text-indigo-900">
								<x-icon name="pencil-alt" class="w-5 h-5"></x-icon>
							</a>

							<x-modal>
								<x-slot name="trigger">
									<div class="text-red-600 hover:text-red-900">
										<x-icon name="trash" class="w-5 h-5"></x-icon>
									</div>
								</x-slot>
								<x-slot name="title">
									Conferma eliminazione
								</x-slot>
								Sei sicuro di voler eliminare l'utente {{ $user->name }}?
								<x-slot name="footer">
									<x-link-button x-on:click="open = false">Annulla</x-link-button>
									<x-danger-button class="ml-2" wire:click="deleteUser({{ $user->id }})"
									                 wire:loading.attr="disabled">
										Elimina
									</x-danger-button>
								</x-slot>
							</x-modal>
						</div>
					</x-table.td>
				</tr>
			@empty
				<tr>
					<x-table.td colspan="10" class="text-center text-gray-500 py-4">Nessun risultato</x-table.td>
				</tr>
			@endforelse
		</x-table.tbody>
	</x-table.table>
</x-card>

@push('notifications')
	<x-notification/>
@endpush