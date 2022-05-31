<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs;

	use App\Practice as PracticeModel;
	use Livewire\Component;

	class DrivingIntervention extends Component
	{
		public PracticeModel $practice;
		public $driving_intervention;
		public $currentSurface = 'pv';
		protected $rules = [
			'driving_intervention.thermical_isolation_intervention' => 'nullable|string',
			'driving_intervention.total_vertical_walls'             => 'nullable',
			'driving_intervention.vw_realized_1'                    => 'nullable|integer',
			'driving_intervention.vw_realized_2'                    => 'nullable|integer',
			'driving_intervention.vw_sal_f'                         => 'nullable|integer',
			'driving_intervention.total_intervention_surface'       => 'nullable',
			'driving_intervention.total_expected_cost'              => 'nullable|integer',
			'driving_intervention.max_possible_cost'                => 'nullable|integer',
			'driving_intervention.total_isolation_cost_1'           => 'nullable|integer',
			'driving_intervention.total_isolation_cost_2'           => 'nullable|integer',
			'driving_intervention.final_isolation_cost'             => 'nullable|integer',
			'driving_intervention.dispersing_covers'                => 'nullable|integer',
			'driving_intervention.isolation_energetic_savings'      => 'nullable|integer',
			'driving_intervention.winter_acs_replacing'             => 'nullable|string',
			'driving_intervention.total_power'                      => 'nullable|integer',
			'driving_intervention.generators'                       => 'nullable|string',
			'driving_intervention.condensing_boiler'                => 'nullable|string',
			'driving_intervention.heat_pump'                        => 'nullable|string',
			'driving_intervention.absorption_heat_pump'             => 'nullable|string',
			'driving_intervention.hybrid_system'                    => 'nullable|string',
			'driving_intervention.microgeneration_system'           => 'nullable|string',
			'driving_intervention.water_heatpumps_installation'     => 'nullable|string',
			'driving_intervention.biome_generator'                  => 'nullable|string',
			'driving_intervention.solar_panel'                      => 'nullable|string',
			'driving_intervention.solar_panel_use_winter'           => 'nullable|string',
			'driving_intervention.solar_panel_use_summer'           => 'nullable|string',
			'driving_intervention.solar_panel_use_water'            => 'nullable|string',
			'driving_intervention.total_acs_project_cost'           => 'nullable|integer',
			'driving_intervention.total_cost_installations'         => 'nullable|integer',
			'driving_intervention.total_replacing_cost_1'           => 'nullable|integer',
			'driving_intervention.total_replacing_cost_2'           => 'nullable|integer',
			'driving_intervention.final_replacing_cost'             => 'nullable|integer',
			'driving_intervention.replacing_energetic_savings'      => 'nullable|integer',
		];

		public function mount() {
			$this->driving_intervention = $this->practice->driving_intervention;
		}

		public function addInterventionSurface() {
			//
			dd("qui");
		}

		public function save() {
//			$validated = $this->validate();

			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('Dati aggiornati con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.show', 'change-tab', 'towed_intervention');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention');
		}
	}
