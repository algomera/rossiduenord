<?php

namespace App\Http\Livewire\Practice;

use App\Practice;
use Livewire\Component;

class PracticeEdit extends Component
{
	public $practice;
	public $tabs = [
		'applicant' => 'Richiedente',
		'practice' => 'Pratica',
		'subjects' => 'Subappaltatori',
		'building' => 'Immobile',
		'media' => 'Foto e Video',
		'documents' => 'Documenti richiesti',
		'superbonus' => 'Superbonus',
		'contracts' => 'Contratti',
		'policies' => 'Polizze'
	];
	public $selectedTab = 'practice';

	public function mount(Practice $practice) {
		$this->practice = $practice;
	}

    public function render()
    {
        return view('livewire.practice.practice-edit');
    }
}
