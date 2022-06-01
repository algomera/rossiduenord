<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs;

	use App\Practice as PracticeModel;
	use Livewire\Component;

	class DrivingIntervention extends Component
	{
		public PracticeModel $practice;
		public $driving_intervention;
		public $currentSurface = 'PV';
		public $surfaces = [];
		protected $rules = [
			'driving_intervention.thermical_isolation_intervention' => 'nullable|boolean',
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
			'driving_intervention.winter_acs_replacing'             => 'nullable|boolean',
			'driving_intervention.total_power'                      => 'nullable|integer',
			'driving_intervention.generators'                       => 'nullable|string',
			'driving_intervention.use_winter'                       => 'nullable|boolean',
			'driving_intervention.use_summer'                       => 'nullable|boolean',
			'driving_intervention.use_water'                        => 'nullable|boolean',
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

		public function save() {
			$validated = $this->validate();
			dd($validated);
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
