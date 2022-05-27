<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Practice as PracticeModel;
	use Livewire\Component;

	class Contract extends Component
	{
		public PracticeModel $practice;

		public function mount(PracticeModel $practice) {
			$this->practice = $practice;
		}

		public function render() {
			return view('livewire.practice.tabs.contract');
		}
	}
