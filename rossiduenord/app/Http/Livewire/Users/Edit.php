<?php

	namespace App\Http\Livewire\Users;

	use App\User as UserModel;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		public $user_id;
		public $role;
		public $name;
		public $email;
		public $password;
		public $password_confirmation;
		public $showBusiness = false;
		public $business;
		public $selectedBusiness = [];

		protected function rules() {
			return [
				'role'                  => 'required|string',
				'name'                  => 'required|string',
				'email'                 => 'required|email:rfc,dns|unique:users,email,' . $this->user_id,
				'password'              => 'sometimes|nullable|min:8|confirmed',
				'password_confirmation' => 'sometimes|same:password',
				'business'              => 'nullable',
				'selectedBusiness'      => 'sometimes',
			];
		}

		public function mount(UserModel $user) {
			$this->user_id = $user->id;
			$this->role = $user->role;
			$this->name = $user->name;
			$this->email = $user->email;
			foreach ($user->business as $business) {
				$this->selectedBusiness[] = $business->id;
			}
			$this->business = UserModel::role('business')->get();
			if (in_array($this->role, config('users_businesses'))) {
				$this->showBusiness = true;
			}
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
			$user = UserModel::find($this->user_id);
			$user->update([
				'email'    => $validated['email'],
				'password' => $validated['password'] ? bcrypt($validated['password']) : $user->getAuthPassword()
			]);
			$user->user_data()->update(['name' => $validated['name']]);
			if ($user->getRoleNames()->first() !== $validated['role']) {
				$user->removeRole($user->getRoleNames()->first());
				$user->assignRole($validated['role']);
			}

			if (in_array($this->role, config('users_businesses'))) {
				$user->business()->sync($this->selectedBusiness);
			} else {
				$user->business()->detach();
			}

			$this->closeModal();
			$this->emitTo('users.index', 'user-updated');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Utente Aggiornato'),
				'subtitle' => __('L\'utente è stato aggiornato con successo!')
			]);
		}

		public function render() {
			return view('livewire.users.edit');
		}
	}
