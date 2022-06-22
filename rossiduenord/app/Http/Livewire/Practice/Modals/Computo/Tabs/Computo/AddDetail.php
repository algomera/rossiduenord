<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoInterventionRow;
	use App\ComputoInterventionRowDetail;
	use LivewireUI\Modal\ModalComponent;
	use NXP\MathExecutor;

	class AddDetail extends ModalComponent
	{
		public $intervention_row_id;
		public $practice_id;
		public $selectedIntervention;
		public $row;
		public $note;
		public $expression;
		public $nps;
		public $length;
		public $width;
		public $hps;
		public $total = 0;
		protected $rules = [
			'note'       => 'string',
			'expression' => 'string',
			'nps'        => 'string',
			'length'     => 'string',
			'width'      => 'string',
			'hps'        => 'string',
		];

		public static function closeModalOnEscapeIsForceful(): bool {
			return false;
		}

		public static function closeModalOnClickAway(): bool {
			return false;
		}

		public static function destroyOnClose(): bool {
			return true;
		}

		public function updatingExpression() {
			$this->total = 0;
			$this->nps = null;
			$this->length = null;
			$this->width = null;
			$this->hps = null;
		}

		public function resetExpression() {
			$this->expression = null;
		}

		public function calculate() {
			$executor = new MathExecutor();
			$this->expression = str_replace(',', '.', $this->expression);
			$this->nps = str_replace(',', '.', $this->nps);
			$this->length = str_replace(',', '.', $this->length);
			$this->width = str_replace(',', '.', $this->width);
			$this->hps = str_replace(',', '.', $this->hps);
			$nps = $this->nps ?: 1;
			$length = $this->length ?: 1;
			$width = $this->width ?: 1;
			$hps = $this->hps ?: 1;
			if ($this->nps || $this->length || $this->width || $this->hps) {
				$expression = "{$nps} * {$length} * {$width} * {$hps}";
				$this->total = round($executor->execute($expression), 2);
			} elseif($this->expression) {
				$this->total = round($executor->execute($this->expression), 2);
			}
		}

		public function mount($intervention_row_id, $practice_id, $selectedIntervention, $row) {
			$this->intervention_row_id = $intervention_row_id;
			$this->practice_id = $practice_id;
			$this->selectedIntervention = $selectedIntervention;
			$this->row = $row;
		}

		public function save() {
			$validated = $this->validate();
			//			$intervention_row = ComputoInterventionRow::updateOrCreate([
			//				'practice_id'            => $this->practice_id,
			//				'intervention_folder_id' => $this->selectedIntervention,
			//				'price_row_id'           => $this->row,
			//			]);
			$intervention_row = ComputoInterventionRow::where('id', $this->intervention_row_id)->where('practice_id', $this->practice_id)->where('intervention_folder_id', $this->selectedIntervention)->where('price_row_id', $this->row)->first();
			$intervention_row->details()->create([
				'note'       => $validated['note'],
				'expression' => $validated['expression'],
				'nps'        => $validated['nps'],
				'length'     => $validated['length'],
				'width'      => $validated['width'],
				'hps'        => $validated['hps'],
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Dettaglio salvato con successo!')
			]);
			$this->emitTo('practice.modals.computo.tabs.computo.add-details', 'detail-row-added');
			$this->emitTo('practice.modals.computo.tabs.computo.intervention', 'detail-row-added');
		}

		public function render() {
			return view('livewire.practice.modals.computo.tabs.computo.add-detail');
		}
	}
