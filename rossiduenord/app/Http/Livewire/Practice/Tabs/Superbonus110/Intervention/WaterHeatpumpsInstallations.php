<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use Livewire\Component;

	class WaterHeatpumpsInstallations extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'water-heatpump-installation-added' => '$refresh'
		];

		public function render() {
			$this->water_heatpumps_installations = $this->practice->water_heatpumps_installations()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.water-heatpumps-installations');
		}
	}
