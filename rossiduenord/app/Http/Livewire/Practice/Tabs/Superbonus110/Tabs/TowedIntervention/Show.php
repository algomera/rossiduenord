<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\TowedIntervention;

	use App\Condomini;
	use App\Practice as PracticeModel;
	use Livewire\Component;

	class Show extends Component
	{
		public PracticeModel $practice;
		public $towed_intervention;
		public $condomino_id = null;
		public $condomino = null;
		public $is_common = 0;
		public $currentSurface = 'PV';

		public function mount() {
			$this->towed_intervention = $this->practice->towed_intervention;
			$this->condomino = Condomini::find($this->condomino_id);
		}

		public function save() {
			//
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.towed-intervention.show');
		}
	}
