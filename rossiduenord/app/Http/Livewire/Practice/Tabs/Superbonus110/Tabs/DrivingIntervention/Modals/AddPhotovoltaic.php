<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddPhotovoltaic extends ModalComponent
	{
		public $practice;
		public $condomino_id;
		public $is_common;

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->practice->building_automations()->create([
				'condomino_id'            => $this->condomino_id,
				'is_common'               => $this->is_common,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Fotovoltaico salvato con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.photovoltaics', 'photovoltaic-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-photovoltaic');
		}
	}
