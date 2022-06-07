<?php

	namespace App\Http\Livewire\Users;

	use App\User;
	use App\UserData;
	use LivewireUI\Modal\ModalComponent;
	use Spatie\Permission\Models\Role;
	use App\Notifications\CredentialEmailNotification;

	class Create extends ModalComponent
	{
		public $role;
		public $name;
		public $email;
		public $password;
		public $password_confirmation;
		public $showBusiness = false;
		public $business;
		public $selectedBusiness = [];
		protected $rules = [
			'role'                  => 'required|string',
			'name'                  => 'required|string',
			'email'                 => 'required|email:rfc,dns|unique:users,email',
			'password'              => 'required|string|min:8|confirmed',
			'password_confirmation' => 'required|same:password',
			'business'              => 'nullable'
		];

		public function mount() {
			$this->business = User::role('business')->get();
		}

		public function updatingRole($value) {
			if (in_array($value, config('users_businesses'))) {
				$this->showBusiness = true;
			} else {
				$this->showBusiness = false;
				$this->selectedBusiness = [];
			}
		}

		public function save() {
			$validated = $this->validate();
			// Creazione User
			$user = User::create([
				'email'    => $validated['email'],
				'password' => bcrypt($validated['password'])
			]);
			// Creazione UserData
			UserData::create([
				'user_id' => $user->id,
				'parent'  => auth()->user()->id,
				'name'    => $validated['name'],
			]);
			// Assegnazione ruolo
			$role = Role::findByName($validated['role']);
			$user->assignRole($role);
			// Assegnazione User/Business
			$roles = [
				'technical_asseverator',
				'fiscal_asseverator',
				'collaborator',
				'consultant'
			];
			if (in_array($this->role, config('users_businesses'))) {
				$user->business()->sync($this->selectedBusiness);
			}
			$this->closeModal();
			$this->emitTo('users.index', 'user-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Utente Creato'),
				'subtitle' => __('L\'utente è stato creato con successo!')
			]);
			$user->notify(new CredentialEmailNotification($user, $this->password));
		}

		public function render() {
			return view('livewire.users.create');
		}
	}
