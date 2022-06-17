<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoInterventionFolder;
	use Livewire\Component;

	class Intervention extends Component
	{
		public $tree = [];
		public $selected = null;

		public function mount() {
			$items = ComputoInterventionFolder::tree()->get();
			$this->tree = $items->toTree();
		}

		public function render() {
			return view('livewire.practice.modals.computo.tabs.computo.intervention');
		}
	}
