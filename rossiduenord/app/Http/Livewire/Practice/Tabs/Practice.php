<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Helpers\Money;
	use Livewire\Component;

	class Practice extends Component
	{
		public $practice;
		public $import;
		public $practical_phase;
		public $real_estate_type;
		public $policy_name;
		public $address;
		public $civic;
		public $common;
		public $province;
		public $region;
		public $cap;
		public $work_start;
		public $c_m;
		public $assev_tecnica;
		public $description;
		public $referent_email;
		public $referent_mobile;
		public $policy;
		public $request_policy;
		public $superbonus;
		public $superbonus_work_start;
		public $sal;
		public $import_sal;
		public $note;
		public $practice_ok;
		protected $rules = [
			'import'                => 'required|string',
			'practical_phase'       => 'required|string',
			'real_estate_type'      => 'required|string',
			'policy_name'           => 'required|string|min:3',
			'address'               => 'required|string|min:5',
			'civic'                 => 'required|string',
			'common'                => 'required|string|min:3',
			'province'              => 'required|string|min:2|max:2',
			'region'                => 'required|string',
			'cap'                   => 'required|string|min:5|max:5',
			'work_start'            => 'required|string',
			'c_m'                   => 'required|string',
			'assev_tecnica'         => 'nullable|string',
			'description'           => 'nullable|string',
			'referent_email'        => 'nullable|email',
			'referent_mobile'       => 'nullable|string',
			'policy'                => 'sometimes|boolean',
			'request_policy'        => 'nullable|string|min:3 |max:30',
			'superbonus'            => 'sometimes|boolean',
			'superbonus_work_start' => 'nullable',
			'sal'                   => 'nullable|string',
			'import_sal'            => 'nullable|string',
			'note'                  => 'nullable|string',
			'practice_ok'           => 'sometimes|boolean',
		];

		public function mount() {
			$this->import = Money::format($this->practice->import);
			$this->practical_phase = $this->practice->practical_phase;
			$this->real_estate_type = $this->practice->real_estate_type;
			$this->policy_name = $this->practice->policy_name;
			$this->address = $this->practice->address;
			$this->civic = $this->practice->civic;
			$this->common = $this->practice->common;
			$this->province = $this->practice->province;
			$this->region = $this->practice->region;
			$this->cap = $this->practice->cap;
			$this->work_start = $this->practice->work_start;
			$this->c_m = Money::format($this->practice->c_m);
			$this->assev_tecnica = Money::format($this->practice->assev_tecnica);
			$this->description = $this->practice->description;
			$this->referent_email = $this->practice->referent_email;
			$this->referent_mobile = $this->practice->referent_mobile;
			$this->policy = $this->practice->policy;
			$this->request_policy = $this->practice->request_policy;
			$this->superbonus = $this->practice->superbonus;
			$this->superbonus_work_start = $this->practice->superbonus_work_start;
			$this->sal = $this->practice->sal;
			$this->import_sal = Money::format($this->practice->import_sal);
			$this->note = $this->practice->note;
			$this->practice_ok = $this->practice->practice_ok;
		}

		public function updatingPolicy() {
			$this->request_policy = null;
		}

		public function updatingSuperbonus() {
			$this->superbonus_work_start = null;
			$this->sal = null;
			$this->import_sal = null;
		}

		public function save() {
			$validated = $this->validate();
			$validated['applicant_id'] = $this->practice->applicant->id;
			if (array_key_exists('province', $validated)) {
				$validated['province'] = strtoupper($validated['province']);
			}
			if ($validated['import'] != null) {
				$validated['import'] = Money::prepare($validated['import']);
			}
			if ($validated['c_m'] != null) {
				$validated['c_m'] = Money::prepare($validated['c_m']);
			}
			if ($validated['import_sal'] != null) {
				$validated['import_sal'] = Money::prepare($validated['import_sal']);
			}
			if ($validated['assev_tecnica'] != null) {
				$validated['assev_tecnica'] = Money::prepare($validated['assev_tecnica']);
			}
			$this->practice->update($validated);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('La pratica è stata aggiornata con successo!')
			]);
			$this->emitUp('change-tab', 'subjects');
		}

		public function render() {
			return view('livewire.practice.tabs.practice');
		}
	}
