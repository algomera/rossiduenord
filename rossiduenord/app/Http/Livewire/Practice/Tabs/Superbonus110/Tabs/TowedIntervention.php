<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs;

	use App\Practice as PracticeModel;
	use Livewire\Component;

	class TowedIntervention extends Component
	{
		public PracticeModel $practice;
		public $condomini;
		public $tabs = [
			0 => 'Parti comuni',
		];
		public $selectedTab = 0;
		public $currentSurface = 'PV';

		protected $rules = [
			'towed_intervention.thermical_isolation_intervention' => 'nullable|boolean',
			'towed_intervention.total_vertical_walls'             => 'nullable',
			'towed_intervention.vw_realized_1'                    => 'nullable|integer',
			'towed_intervention.vw_realized_2'                    => 'nullable|integer',
			'towed_intervention.total_intervention_surface'       => 'nullable',
			'towed_intervention.total_expected_cost'              => 'nullable|integer',
			'towed_intervention.max_possible_cost'                => 'nullable|integer',
			'towed_intervention.total_isolation_cost_1'           => 'nullable|integer',
			'towed_intervention.total_isolation_cost_2'           => 'nullable|integer',
			'towed_intervention.final_isolation_cost'             => 'nullable|integer',
			'towed_intervention.dispersing_covers'                => 'nullable|integer',
			'towed_intervention.isolation_energetic_savings'      => 'nullable|integer',
			'towed_intervention.winter_acs_replacing'             => 'nullable|boolean',
			'towed_intervention.total_power'                      => 'nullable|integer',
			'towed_intervention.generators'                       => 'nullable|string',
			'towed_intervention.use_winter'                       => 'nullable|boolean',
			'towed_intervention.use_summer'                       => 'nullable|boolean',
			'towed_intervention.use_water'                        => 'nullable|boolean',
			'towed_intervention.total_acs_project_cost'           => 'nullable|integer',
			'towed_intervention.total_cost_installations'         => 'nullable|integer',
			'towed_intervention.total_replacing_cost_1'           => 'nullable|integer',
			'towed_intervention.total_replacing_cost_2'           => 'nullable|integer',
			'towed_intervention.final_replacing_cost'             => 'nullable|integer',
			'towed_intervention.replacing_energetic_savings'      => 'nullable|integer',
		];

		public function render() {
			$this->condomini = $this->practice->condomini;
			return view('livewire.practice.tabs.superbonus110.tabs.towed-intervention');
		}
	}
