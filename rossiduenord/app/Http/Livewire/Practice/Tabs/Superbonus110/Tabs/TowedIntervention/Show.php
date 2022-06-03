<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\TowedIntervention;

	use App\Condomini;
	use App\Practice as PracticeModel;
	use Livewire\Component;

	class Show extends Component
	{
		public PracticeModel $practice;
		public $towed_intervention;
		public $condomino_id = null;
		public $condomino = null;
		public $is_common = 0;
		public $currentSurface = 'PV';
		protected $rules = [
			'towed_intervention.thermical_isolation_intervention' => 'nullable|boolean',
			'towed_intervention.total_intervention_surface'       => 'nullable|string',
			'towed_intervention.total_expected_cost'              => 'nullable|string',
			'towed_intervention.ss_project_cost'                  => 'nullable|string',
			'towed_intervention.ss_max_cost'                      => 'nullable|string',
			'towed_intervention.ss_energetic_savings'             => 'nullable|string',
			'towed_intervention.wacs_replacement'                 => 'nullable|boolean',
			'towed_intervention.use_winter'                       => 'nullable|boolean',
			'towed_intervention.use_summer'                       => 'nullable|boolean',
			'towed_intervention.use_water'                        => 'nullable|boolean',
			'towed_intervention.st_project_cost'                  => 'nullable|string',
			'towed_intervention.st_max_cost'                      => 'nullable|string',
			'towed_intervention.st_energetic_savings'             => 'nullable|string',
			'towed_intervention.fv_project_cost'                  => 'nullable|string',
			'towed_intervention.fv_max_cost'                      => 'nullable|string',
		];

		public function mount() {
			$this->towed_intervention = $this->practice->towed_intervention()->where('condomino_id', $this->condomino_id)->where('is_common', $this->is_common)->first();
			$this->condomino = Condomini::find($this->condomino_id);
		}

		public function save() {
			$this->validate();
			$this->towed_intervention->update();
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.towed-intervention.show');
		}
	}
