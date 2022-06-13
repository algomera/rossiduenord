<?php

	namespace App\Http\Livewire\Modals;

	use LivewireUI\Modal\ModalComponent;

	class ComputoMetrico extends ModalComponent
	{
		public static function modalMaxWidth(): string {
			return '7xl';
		}

		public function render() {
			return view('livewire.modals.computo-metrico');
		}
	}
