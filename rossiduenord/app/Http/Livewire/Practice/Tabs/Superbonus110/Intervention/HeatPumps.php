<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use Livewire\Component;

	class HeatPumps extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'heat-pump-added' => '$refresh'
		];

		public function render() {
			$this->heat_pumps = $this->practice->heat_pumps()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.heat-pumps');
		}
	}
