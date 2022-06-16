<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoInterventionFolder;
	use Livewire\Component;

	class Intervention extends Component
	{
		public $tree = [];
		public $selected = null;

		public function mount() {
			$folders = ComputoInterventionFolder::all();
			foreach ($folders as $k => $folder) {
				$this->tree[$k] = $folder;
				if ($folder->folders->count()) {
					$this->tree[$k]['childs'] = $folder->folders;
				}
			}
		}

		public function render() {
			return view('livewire.practice.modals.computo.tabs.computo.intervention');
		}
	}
