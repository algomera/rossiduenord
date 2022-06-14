<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs;

	use App\ComputoInterventionFolder;
	use Livewire\Component;

	class Computo extends Component
	{
		public $intervention_types = [];
		public $selectedTab = null;
		public $selectedInterventionType = null;

		public function mount() {
			$folders = ComputoInterventionFolder::all();
			foreach ($folders as $folder) {
				if($folder->parent_id !== null) {
					$this->intervention_types[$folder->parent_id]['childs'][] = $folder->name;
				} else {
					$this->intervention_types[$folder->id]['label'] = $folder->name;
				}
			}
		}

		public function render() {
			return view('livewire.practice.modals.computo.tabs.computo');
		}
	}
