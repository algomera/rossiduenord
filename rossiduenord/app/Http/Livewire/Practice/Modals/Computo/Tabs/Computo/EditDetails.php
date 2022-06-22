<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoInterventionRow;
	use LivewireUI\Modal\ModalComponent;

	class EditDetails extends ModalComponent
	{
		public $row;
		public $selectedIntervention = null;
		public $practice_id;
		public $details = [];
		public $intervention_row;
		protected $listeners = [
			'detail-row-added' => '$refresh'
		];

		public static function modalMaxWidth(): string {
			return 'full';
		}

		public static function closeModalOnEscape(): bool {
			return false;
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

		public function mount($row, $selectedIntervention, $practice_id) {
			$this->row = ComputoInterventionRow::find($row);
			$this->selectedIntervention = $selectedIntervention;
			$this->practice_id = $practice_id;
			$this->progressive_number = ComputoInterventionRow::where('practice_id', $this->practice_id)->where('intervention_folder_id', $this->selectedIntervention)->count() + 1;
		}

		public function save() {
			if ($this->row->details->count()) {
				$this->row->update([
					'total' => $this->row->price_row->price * $this->row->details->sum('total')
				]);
				$this->emitTo('practice.modals.computo.tabs.computo.intervention', 'detail-row-added');
				$this->closeModal();
			} else {
				$this->row->delete();
				$this->closeModal();
			}
		}

		public function render() {
			$this->details = $this->row->details;
			return view('livewire.practice.modals.computo.tabs.computo.edit-details');
		}
	}
