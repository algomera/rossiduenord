<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs;

	use Livewire\Component;

	class Computo extends Component
	{
		public $intervention_types = [];
		public $selectedInterventionType = null;

		public function render() {
			return view('livewire.practice.modals.computo.tabs.computo');
		}
	}
