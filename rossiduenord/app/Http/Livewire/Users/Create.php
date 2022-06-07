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
		public $parents = [];

		protected function rules() {
			return [
				'role'                  => 'required|string',
				'name'                  => 'required|string',
				'email'                 => 'required|email:rfc,dns|unique:users,email',
				'password'              => 'required|string|min:8|confirmed',
				'password_confirmation' => 'required|same:password',
				'business'              => 'nullable',
				'selectedBusiness'      => $this->showBusiness ? 'required' : 'nullable',
			];
		}

		public function mount() {
			$this->business = User::role('business')->get();
		}

		public function updatingRole($value) {
			$this->parents = [];
			if (config('users_businesses.' . $value)) {
				$p = config('users_businesses.' . $value);
				foreach ($p as $k => $name) {
					$this->parents[$name] = User::role($k)->get();
				}
				if (config('users_businesses.' . $value)) {
					$this->showBusiness = true;
				} else {
					$this->showBusiness = false;
					$this->selectedBusiness = [];
				}
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
			$user->business()->sync($this->selectedBusiness);
			$this->closeModal();
			$this->emitTo('users.index', 'user-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Utente Creato'),
				'subtitle' => __('L\'utente è stato creato con successo!')
			]);
			if (app()->isProduction()) {
				$user->notify(new CredentialEmailNotification($user, $this->password));
			}
		}

		public function render() {
			return view('livewire.users.create');
		}
	}
