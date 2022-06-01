<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddBiomeGenerator extends ModalComponent
	{
		public $practice;
		public $condomino_id;
		public $is_common;
		public $tipo_sostituito = 'Caldaia standard';
		public $p_nom_sostituito;
		public $classe_generatore = '4 stelle';
		public $tipo_generatore = 'Caldaia a biomassa';
		public $use_destination = 'Riscaldamento ambiente';
		public $tipo_di_alimentazione = 'Legna';
		public $p_utile_nom;
		public $p_al_focolare;
		public $rend_utile_alla_pot_nom;
		public $sup_riscaldata;

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->practice->biome_generators()->create([
				'condomino_id'            => $this->condomino_id,
				'is_common'               => $this->is_common,
				'tipo_sostituito'         => $this->tipo_sostituito,
				'p_nom_sostituito'        => $this->p_nom_sostituito,
				'classe_generatore'       => $this->classe_generatore,
				'tipo_generatore'         => $this->tipo_generatore,
				'use_destination'         => $this->use_destination,
				'tipo_di_alimentazione'   => $this->tipo_di_alimentazione,
				'p_utile_nom'             => $this->p_utile_nom,
				'p_al_focolare'           => $this->p_al_focolare,
				'rend_utile_alla_pot_nom' => $this->rend_utile_alla_pot_nom,
				'sup_riscaldata'          => $this->sup_riscaldata,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Generatore salvato con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.biome-generators', 'biome-generator-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-biome-generator');
		}
	}