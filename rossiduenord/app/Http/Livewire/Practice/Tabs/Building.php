<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Practice as PracticeModel;
	use Livewire\Component;

	class Building extends Component
	{
		public PracticeModel $practice;
		public $condomini;
		public $building;
		protected $rules = [
			'building.practice_id'              => 'nullable | numeric',
			'building.intervention_name'        => 'required | string |min:2',
			'building.company_role'             => 'required | string',
			'building.intervention_tipology'    => 'required | string',
			'building.build_address'            => 'nullable | string |min:5| max:150',
			'building.build_civic_number'       => 'nullable | string',
			'building.common'                   => 'nullable | string |min:2 |max:100',
			'building.province'                 => 'nullable | string |min:2|max:2',
			'building.region'                   => 'nullable | string',
			'building.cap'                      => 'nullable |numeric',
			'building.fiscal_code'              => 'required | min:11 | max:11',
			'building.condominio'               => 'required | string',
			// 'iban' => 'required | string |min:27 |max:27|regex:/^([A-Z]{2}[ \-]?[0-9]{2})(?=(?:[ \-]?[A-Z0-9]){9,30}$)((?:[ \-]?[A-Z0-9]{3,5}){2,7})([ \-]?[A-Z0-9]{1,3})?$/',
			'building.build_type'               => 'required | string',
			'building.zone'                     => 'required | string',
			'building.section'                  => 'nullable ',
			'building.foil'                     => 'required',
			'building.particle'                 => 'required',
			'building.subaltern'                => 'required',
			'building.unit_building_number'     => 'required',
			'building.pertinence_number'        => 'required',
			'building.resolution_stairs'        => 'nullable',
			'building.note'                     => 'nullable | string',
			'building.cultural_constraints'     => 'nullable | string',
			'building.denied_intervents'        => 'nullable | string',
			'building.mountain_common'          => 'nullable | string',
			'building.infringment_common'       => 'nullable | string',
			'building.sismic_events_zone'       => 'nullable | string',
			'building.isUnderRenovation'        => 'nullable | string',
			'building.nonMetan_area'            => 'nullable | string',
			'building.building_authorization'   => 'nullable | string',
			'building.license_number'           => 'nullable | string',
			'building.license_date'             => 'nullable | string',
			'building.construction_date'        => 'nullable | numeric',
			'building.administrator_fullname'   => 'nullable | string |min:5 |max:150',
			'building.administrator_surname'    => 'nullable | string |min:3 |max:75',
			'building.administrator_name'       => 'nullable | string |min:3 |max:75',
			'building.administrator_fiscalcode' => 'nullable | string |min:16 |max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
			'building.administrator_address'    => 'nullable | string |min:5 |max:150',
			'building.administrator_city'       => 'nullable | string |min:3 |max:50',
			'building.administrator_province'   => 'nullable | string |min:2 |max:2',
			'building.administrator_cap'        => 'nullable | numeric',
			'building.administrator_telephone'  => 'nullable | numeric | min:10',
			'building.administrator_cellphone'  => 'nullable | numeric| min:10',
			'building.administrator_email'      => 'nullable | string |min:3 |max:50',
			'building.imported_excel_file'      => 'nullable | file | mimes:xls,xlsx,csv | max:512'
		];

		public function mount() {
			$this->condomini = $this->practice->condomini;
			$this->building = $this->practice->building;
		}

		public function save() {
			//			$validated = $this->validate();
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('L\'immobile è stato aggiornato con successo!')
			]);
			$this->emitUp('change-tab', 'superbonus');
		}

		public function render() {
			return view('livewire.practice.tabs.building');
		}
	}
