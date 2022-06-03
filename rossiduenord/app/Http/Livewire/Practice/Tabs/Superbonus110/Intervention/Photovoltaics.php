<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Intervention;

	use Livewire\Component;

	class Photovoltaics extends Component
	{
		public $practice;
		public $condomino_id = null;
		public $is_common = 0;
		protected $listeners = [
			'photovoltaic-added' => '$refresh'
		];

		public function render() {
			$this->photovoltaics = $this->practice->photovoltaics()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->get();
			return view('livewire.practice.tabs.superbonus110.intervention.photovoltaics');
		}
	}
