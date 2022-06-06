<?php

	namespace App\Http\Livewire\Users;

	use App\User;
	use Livewire\Component;

	class Index extends Component
	{
		public $users;
		public $business;
		protected $listeners = [
			'user-added'   => '$refresh',
			'user-updated' => '$refresh',
		];

		public function render() {
			if (auth()->user()->role === 'admin') {
				$this->users = User::all();
			} else {
				$this->users = User::whereHas('user_data', function ($q) {
					$q->where('parent', auth()->user()->id);
				})->get();
			}
			$this->business = User::role('business')->get();
			return view('livewire.users.index');
		}
	}
