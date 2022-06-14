<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs;

	use App\ComputoInterventionFolder;
	use Livewire\Component;

	class Computo extends Component
	{
		public $intervention_types = [];
		public $selectedTab = null;

		public function mount() {
			$folders = ComputoInterventionFolder::all();
			foreach ($folders as $k => $folder) {
				$this->intervention_types[$k] = $folder;
				if ($folder->folders->count()) {
					$this->intervention_types[$k]['childs'] = $folder->folders;
				}
			}
		}

		public function render() {
			return view('livewire.practice.modals.computo.tabs.computo');
		}
	}
