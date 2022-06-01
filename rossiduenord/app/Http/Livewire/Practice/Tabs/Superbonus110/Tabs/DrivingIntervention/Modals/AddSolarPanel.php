<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddSolarPanel extends ModalComponent
	{
		public $practice;
		public $condomino_id;
		public $is_common;
		public $sup_lorda_singolo_modulo;
		public $num_moduli;
		public $sup_totale;
		public $tipo_di_collettori = 'Piani vetrati';
		public $tipo_di_installazione = 'Tetto piano';
		public $inclinazione;
		public $orientamento = 'Nord';
		public $q_col_q_sol;
		public $ql;
		public $accumulo_in_litri;
		public $destinazione_calore = 'Acqua sanitaria';
		public $tipo_impianto_integrato_o_sostituito = 'Boiler elettrico';
		public $certificazione_solar_keymark;
		public $impianto_factory_made = 'notDefine';

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->practice->solar_panels()->create([
				'condomino_id'                         => $this->condomino_id,
				'is_common'                            => $this->is_common,
				'sup_lorda_singolo_modulo'             => $this->sup_lorda_singolo_modulo,
				'num_moduli'                           => $this->num_moduli,
				'sup_totale'                           => $this->sup_totale,
				'tipo_di_collettori'                   => $this->tipo_di_collettori,
				'tipo_di_installazione'                => $this->tipo_di_installazione,
				'inclinazione'                         => $this->inclinazione,
				'orientamento'                         => $this->orientamento,
				'q_col_q_sol'                          => $this->q_col_q_sol,
				'ql'                                   => $this->ql,
				'accumulo_in_litri'                    => $this->accumulo_in_litri,
				'destinazione_calore'                  => $this->destinazione_calore,
				'tipo_impianto_integrato_o_sostituito' => $this->tipo_impianto_integrato_o_sostituito,
				'certificazione_solar_keymark'         => $this->certificazione_solar_keymark,
				'impianto_factory_made'                => $this->impianto_factory_made,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Collettore salvato con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.solar-panels', 'solar-panel-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-solar-panel');
		}
	}
