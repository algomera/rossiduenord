<?php

	namespace App\Http\Livewire\Anagrafica;

	use App\Anagrafica;
	use LivewireUI\Modal\ModalComponent;

	class Show extends ModalComponent
	{
		public Anagrafica $anagrafica;

		public static function modalMaxWidth(): string {
			return '7xl';
		}

		protected $listeners = [
			'anagrafica-updated' => '$refresh',
		];

		public function mount(Anagrafica $anagrafica) {
			$this->anagrafica = $anagrafica;
		}

		public function render() {
			return view('livewire.anagrafica.show');
		}
	}
