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
			'data_project.filed_province'             => 'nullable|string|size:2',
			'data_project.filed_date'                 => 'nullable|date|date_format:Y-m-d|before_or_equal:today',
			'data_project.filed_protocol'             => 'nullable|string',
			'data_project.technical_report_exclusion' => 'nullable|boolean',
			'data_project.work_start'                 => 'nullable|date|date_format:Y-m-d|before_or_equal:end_of_works',
			'data_project.end_of_works'               => 'nullable|date|date_format:Y-m-d|before_or_equal:today',
			'data_project.type_building'              => 'nullable|string',
			'data_project.building_unit'              => 'nullable|numeric',
			'data_project.relevance'                  => 'nullable|numeric',
			'data_project.centralized_system'         => 'nullable|boolean',
			'data_project.gross_surface_area'         => 'nullable|numeric',
			'data_project.np'                         => 'nullable|numeric',
			'data_project.np_validated'               => 'nullable|numeric',
			'data_project.np_not_validated'           => 'nullable|numeric',
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