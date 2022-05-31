<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use Livewire\Component;

	class CondensingBoilers extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'condensing-boiler-added' => '$refresh'
		];

		public function render() {
			$this->condensing_boilers = $this->practice->condensing_boilers()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.condensing-boilers');
		}
	}
