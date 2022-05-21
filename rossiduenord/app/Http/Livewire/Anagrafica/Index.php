<?php

	namespace App\Http\Livewire\Anagrafica;

	use App\SubjectRole;
	use Livewire\Component;

	class Index extends Component
	{
		public $anagrafiche;

		public function mount() {
			$this->subject_roles = SubjectRole::all()->except(21);
			$this->anagrafiche = auth()->user()->anagrafiche;
		}

		public function render() {
			return view('livewire.anagrafica.index');
		}
	}
