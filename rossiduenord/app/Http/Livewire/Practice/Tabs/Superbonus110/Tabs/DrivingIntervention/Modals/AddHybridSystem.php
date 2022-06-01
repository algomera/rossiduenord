<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Modals;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class AddHybridSystem extends ModalComponent
	{
		public $practice;
		public $condomino_id;
		public $is_common;
		public $tipo_sostituito = 'Caldaia standard';
		public $p_nom_sostituito;
		public $condensing_potenza_nominale;
		public $condensing_rend_utile_nom;
		public $condensing_efficienza_ns;
		public $tipo_di_alimentazione = 'Gas Naturale (metano)';
		public $heat_tipo_di_pdc = 'Aria/Aria';
		public $heat_tipo_roof_top;
		public $heat_potenza_nominale;
		public $heat_p_elettrica_assorbita;
		public $heat_inverter;
		public $heat_cop;
		public $heat_sonde_geotermiche;

		public function mount(PracticeModel $practice, $condomino_id, $is_common) {
			$this->practice = $practice;
			$this->condomino_id = $condomino_id;
			$this->is_common = $is_common;
		}

		public function save() {
			$this->practice->hybrid_systems()->create([
				'condomino_id'                => $this->condomino_id,
				'is_common'                   => $this->is_common,
				'tipo_sostituito'             => $this->tipo_sostituito,
				'p_nom_sostituito'            => $this->p_nom_sostituito,
				'condensing_potenza_nominale' => $this->condensing_potenza_nominale,
				'condensing_rend_utile_nom'   => $this->condensing_rend_utile_nom,
				'condensing_efficienza_ns'    => $this->condensing_efficienza_ns,
				'tipo_di_alimentazione'       => $this->tipo_di_alimentazione,
				'heat_tipo_di_pdc'            => $this->heat_tipo_di_pdc,
				'heat_tipo_roof_top'          => $this->heat_tipo_roof_top,
				'heat_potenza_nominale'       => $this->heat_potenza_nominale,
				'heat_p_elettrica_assorbita'  => $this->heat_p_elettrica_assorbita,
				'heat_inverter'               => $this->heat_inverter,
				'heat_cop'                    => $this->heat_cop,
				'heat_sonde_geotermiche'      => $this->heat_sonde_geotermiche,
			]);
			$this->closeModal();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Salvataggio'),
				'subtitle' => __('Sistema ibrido salvato con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.intervention.hybrid-systems', 'hybrid-system-added');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.modals.add-hybrid-system');
		}
	}