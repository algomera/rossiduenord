<?php

	namespace App\Http\Livewire\Anagrafica;

	use App\SubjectRole;
	use Livewire\Component;

	class Index extends Component
	{
		public $anagrafiche;

		protected $listeners = [
			'anagrafica-added' => '$refresh',
			'anagrafica-updated' => '$refresh',
		];

		public function render() {
			$this->anagrafiche = auth()->user()->anagrafiche;
			return view('livewire.anagrafica.index');
		}
	}
