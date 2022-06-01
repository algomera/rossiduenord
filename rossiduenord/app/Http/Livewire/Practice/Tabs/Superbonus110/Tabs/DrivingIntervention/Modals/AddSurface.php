<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use App\Surface;
	use LivewireUI\Modal\ModalComponent;

	class AddSurface extends ModalComponent
	{
		public $practice;
		public $intervention;
		public $condomino_id;
		public $is_common;
		public $type;
		public $description_surface;
		public $surface;
		public $trasm_ante;
		public $trasm_post;
		public $trasm_term;
		public $confine;
		public $insulation;
		protected $rules = [
			'type'                => 'nullable',
			'description_surface' => 'nullable',
			'surface'             => 'nullable|numeric|between:0,99999.99',
			'trasm_ante'          => 'nullable|numeric|between:0,99999.99',
			'trasm_post'          => 'nullable|numeric|between:0,99999.99',
			'trasm_term'          => 'nullable|numeric|between:0,99999.99',
			'confine'             => 'nullable',
			'insulation'          => 'nullable',
		];

		public function mount(PracticeModel $practice, $intervention, $condomino_id, $is_common, $type) {
			$this->practice = $practice;
			$this->intervention = $intervention;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
			$this->type = $type;
		}

		public function save() {
			$validated = $this->validate();
			$validated['intervention'] = $this->intervention;
			$validated['condomino_id'] = $this->condomino_id;
			$validated['is_common'] = $this->is_common;
			$validated['type'] = $this->type;
			$this->practice->surfaces()->create($validated);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Superficie ' . $this->type . ' salvata con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.tabs.driving-intervention.surface.' . strtolower($this->type) . '-surface', 'surface-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-surface');
		}
	}