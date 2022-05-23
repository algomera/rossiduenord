<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\SubjectRole;
	use Illuminate\Validation\Rule;
	use Livewire\Component;

	class Subject extends Component
	{
		public $practice;
		public $subject;
		public $consultant;
		public $lending_bank;
		public $general_contractor;
		public $construction_company;
		public $hydrothermal_sanitary_company;
		public $photovoltaic_company;
		public $technician_APE_Ante;
		public $structural_engineer;
		public $work_director;
		public $technical_assev;
		public $fiscal_assev;
		public $phiscal_transferee;
		public $insurer;
		public $area_manager;
		public $technician_energy_efficient;
		public $technician_APE_Post;
		public $metric_calc_technician;
		public $consultant_list;
		public $lending_bank_list;
		public $general_contractor_list;
		public $construction_company_list;
		public $hydrothermal_sanitary_company_list;
		public $photovoltaic_company_list;
		public $technician_APE_Ante_list;
		public $structural_engineer_list;
		public $work_director_list;
		public $technical_assev_list;
		public $fiscal_assev_list;
		public $phiscal_transferee_list;
		public $insurer_list;
		public $area_manager_list;
		public $technician_energy_efficient_list;
		public $technician_APE_Post_list;
		public $metric_calc_technician_list;
		protected $listeners = [
			'subject-selected'   => '$refresh',
			'anagrafica-created'   => 'setSubject'
		];

		// TODO: Fix refresh/autoselect quando un'anagrafica viene creata
		public function setSubject($id, $role) {
			$r = SubjectRole::find($role)->pluck('slug');
			$this->practice->subject[$r[0]] = $id;
			$this->practice->subject->save();
			$this->emitSelf('subject-selected');
		}

		public function mount() {
			$this->subject = $this->practice->subject;
			$this->consultant_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 3);
			})->get();
			$this->lending_bank_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 4);
			})->get();
			$this->general_contractor_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 5);
			})->get();
			$this->construction_company_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 6);
			})->get();
			$this->hydrothermal_sanitary_company_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 7);
			})->get();
			$this->photovoltaic_company_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 8);
			})->get();
			$this->technician_APE_Ante_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 9);
			})->get();
			$this->structural_engineer_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 10);
			})->get();
			$this->work_director_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 11);
			})->get();
			$this->technical_assev_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 12);
			})->get();
			$this->fiscal_assev_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 13);
			})->get();
			$this->phiscal_transferee_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 15);
			})->get();
			$this->insurer_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 16);
			})->get();
			$this->area_manager_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 17);
			})->get();
			$this->technician_energy_efficient_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 18);
			})->get();
			$this->technician_APE_Post_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 19);
			})->get();
			$this->metric_calc_technician_list = auth()->user()->anagrafiche()->whereHas('roles', function ($q) {
				$q->where('subject_role_id', 20);
			})->get();
			$this->consultant = $this->practice->subject['consultant'];
			$this->lending_bank = $this->practice->subject['lending_bank'];
			$this->general_contractor = $this->practice->subject['general_contractor'];
			$this->construction_company = $this->practice->subject['construction_company'];
			$this->hydrothermal_sanitary_company = $this->practice->subject['hydrothermal_sanitary_company'];
			$this->photovoltaic_company = $this->practice->subject['photovoltaic_company'];
			$this->technician_APE_Ante = $this->practice->subject['technician_APE_Ante'];
			$this->structural_engineer = $this->practice->subject['structural_engineer'];
			$this->work_director = $this->practice->subject['work_director'];
			$this->technical_assev = $this->practice->subject['technical_assev'];
			$this->fiscal_assev = $this->practice->subject['fiscal_assev'];
			$this->phiscal_transferee = $this->practice->subject['phiscal_transferee'];
			$this->insurer = $this->practice->subject['insurer'];
			$this->area_manager = $this->practice->subject['area_manager'];
			$this->technician_energy_efficient = $this->practice->subject['technician_energy_efficient'];
			$this->technician_APE_Post = $this->practice->subject['technician_APE_Post'];
			$this->metric_calc_technician = $this->practice->subject['metric_calc_technician'];
		}

		protected function rules() {
			return [
				'general_contractor'            => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'construction_company'          => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'hydrothermal_sanitary_company' => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'photovoltaic_company'          => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'technician_APE_Ante'           => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'technician_energy_efficient'   => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'technician_APE_Post'           => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'structural_engineer'           => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'metric_calc_technician'        => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'work_director'                 => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'technical_assev'               => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'fiscal_assev'                  => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'phiscal_transferee'            => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'lending_bank'                  => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'insurer'                       => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'consultant'                    => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'area_manager'                  => [
					'nullable',
					'exists:anagrafiche,id',
					Rule::exists('anagrafiche', 'id')->where(function ($q) {
						$q->where('user_id', auth()->id());
					})
				],
				'project_manager'               => 'nullable | string | min:3 | max:100',
				'responsible_technician'        => 'nullable | string | min:3 | max:100',
			];
		}

		public function updated($name, $value) {
			$this->practice->subject[$name] = empty($value) ? null : (int)$value;
			$this->practice->subject->save();
			$this->emitSelf('subject-selected');
		}

		public function save() {
			$this->validate();
		}

		public function render() {
			return view('livewire.practice.tabs.subject');
		}
	}
