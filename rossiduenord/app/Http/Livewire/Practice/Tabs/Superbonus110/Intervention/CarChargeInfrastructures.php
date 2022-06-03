<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use Livewire\Component;

	class CarChargeInfrastructures extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;
		protected $listeners = [
			'car-charge-infrastructure-added' => '$refresh'
		];

		public function render() {
//			$this->building_automations = $this->practice->building_automations()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.car-charge-infrastructures');
		}
	}
