<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Navigation extends Component
{
    public function render()
    {
        return view('livewire.navigation', [
	        'routes' => $this->registerRoutes()
        ]);
    }

	public function registerRoutes()
	{
		return [
			[
				'name' => 'Home',
				'url' => route('dashboard'),
				'active' => $this->isActiveRoute('dashboard'),
				'icon' => 'home',
			],
			[
				'name' => 'Anagrafiche',
				'url' => route('anagrafiche.index'),
				'active' => $this->isActiveRoute('anagrafiche*'),
				'icon' => 'users',
				'permission' => 'access_anagrafiche'
			],
			[
				'name' => 'Gestione Accessi',
				'url' => route('users.index'),
				'active' => $this->isActiveRoute('users*'),
				'icon' => 'lock-open',
				'permission' => 'access_users'
			],
			[
				'name' => 'Pratiche',
				'url' => route('practice.index'),
				'active' => $this->isActiveRoute('practice*'),
				'icon' => 'collection',
				'permission' => 'access_practices'
			],
			[
				'name' => 'Gestione File/Cartelle',
				'url' => route('folder.index'),
				'active' => $this->isActiveRoute('folder*'),
				'icon' => 'folder',
				'permission' => 'access_folders'
			],
		];
	}

	private function isActiveRoute(string $string)
	{
		return request()->routeIs($string);
	}
}