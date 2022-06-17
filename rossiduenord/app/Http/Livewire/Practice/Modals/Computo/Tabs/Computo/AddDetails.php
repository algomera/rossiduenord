<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoPriceListRow;
	use LivewireUI\Modal\ModalComponent;

	class AddDetails extends ModalComponent
	{
		public $row;
		public $details = [];

		public static function modalMaxWidth(): string {
			return 'full';
		}

		public static function closeModalOnEscapeIsForceful(): bool {
			return false;
		}

		public static function closeModalOnClickAway(): bool {
			return false;
		}

		public static function destroyOnClose(): bool {
			return true;
		}

		public function mount($row) {
			$this->row = ComputoPriceListRow::find($row);
		}

		public function render() {
			return view('livewire.practice.modals.computo.tabs.computo.add-details');
		}
	}
