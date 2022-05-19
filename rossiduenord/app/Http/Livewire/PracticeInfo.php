<?php

	namespace App\Http\Livewire;

	use Livewire\Component;

	class PracticeInfo extends Component
	{
		public $practices;

		public function render() {
			return view('livewire.practice-info');
		}
	}
