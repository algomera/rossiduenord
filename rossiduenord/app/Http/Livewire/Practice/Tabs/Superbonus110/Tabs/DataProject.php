<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs;

	use App\Practice as PracticeModel;
	use App\Data_project as Data_projectModel;
	use Livewire\Component;

	class DataProject extends Component
	{
		public PracticeModel $practice;
		public $data_project;

		public function mount() {
			$this->data_project = $this->practice->data_project;
		}

		protected $rules = [
			'data_project.technical_report'           => 'nullable|string',
			'data_project.filed_common'               => 'nullable|string',
			'data_project.filed_province'             => 'nullable|string',
			'data_project.filed_date'                 => 'nullable|string',
			'data_project.filed_protocol'             => 'nullable|string',
			'data_project.technical_report_exclusion' => 'nullable|boolean',
			'data_project.work_start'                 => 'nullable|string',
			'data_project.end_of_works'               => 'nullable|string',
			'data_project.type_building'              => 'nullable|string',
			'data_project.building_unit'              => 'nullable|string',
			'data_project.relevance'                  => 'nullable|integer',
			'data_project.centralized_system'         => 'nullable|boolean',
			'data_project.gross_surface_area'         => 'nullable|numeric|between:0,99999.99',
			'data_project.np'                         => 'nullable',
			'data_project.np_validated'               => 'nullable',
			'data_project.np_not_validated'           => 'nullable',
		];

		public function save() {
			$validated = $this->validate();

			$this->data_project->update($validated);

			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('Dati aggiornati con successo!')
			]);
			$this->emitTo('practice.tabs.superbonus110.show', 'change-tab', 'driving_intervention');
		}

		public function render() {
			return view('livewire.practice.tabs.superbonus110.tabs.data-project');
		}
	}
