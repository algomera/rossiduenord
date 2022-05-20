<?php

	namespace App\Http\Livewire\Practice;

	use App\Practice;
	use Livewire\Component;

	class Show extends Component
	{
		public $practice;
		public $tabs = [
			'applicant'  => 'Richiedente',
			'practice'   => 'Pratica',
			'subjects'   => 'Subappaltatori',
			'building'   => 'Immobile',
			'media'      => 'Foto e Video',
			'documents'  => 'Documenti richiesti',
			'superbonus' => 'Superbonus',
			'contracts'  => 'Contratti',
			'policies'   => 'Polizze'
		];
		public $selectedTab = 'practice';

		protected $listeners = [
			'change-tab' => 'changeTab'
		];

		public function mount(Practice $practice) {
			$this->practice = $practice;
		}

		public function changeTab($tab) {
			$this->selectedTab = $tab;
		}

		public function render() {
			return view('livewire.practice.show');
		}
	}
