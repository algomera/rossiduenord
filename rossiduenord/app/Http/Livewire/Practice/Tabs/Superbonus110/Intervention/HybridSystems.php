<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use Livewire\Component;

	class HybridSystems extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;

		protected $listeners = [
			'hybrid-system-added' => '$refresh'
		];

		public function render() {
			$this->hybrid_systems = $this->practice->hybrid_systems()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.hybrid-systems');
		}
	}
