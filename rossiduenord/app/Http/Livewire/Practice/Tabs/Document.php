<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Practice as PracticeModel;
	use App\Sub_folder;
	use Livewire\Component;

	class Document extends Component
	{
		public PracticeModel $practice;
		public $sub_folders;
		public $tabs = [
			'first' => 'Prima',
			'during' => 'Durante',
			'after' => 'Al termine',
			'casing' => 'Involucro'
		];
		public $selectedTab = 'first';

		public function render() {
			$this->sub_folders = Sub_folder::where('practice_id', '=', $this->practice->id)->where('folder_type', '=', $this->selectedTab)->orderBy('created_at', 'DESC')->get();
			return view('livewire.practice.tabs.document');
		}
	}
