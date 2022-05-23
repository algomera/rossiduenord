<?php

	namespace App\Http\Livewire\Anagrafica;

	use App\SubjectRole;
	use LivewireUI\Modal\ModalComponent;

	class Create extends ModalComponent
	{
		public $subject_roles;
		public $subject_type;
		public $consultant_type;
		public $company_name;
		public $first_name;
		public $last_name;
		public $address;
		public $zip;
		public $city;
		public $province;
		public $iban;
		public $vat;
		public $fiscal_code;
		public $phone;
		public $fax;
		public $email;
		public $email_pec;
		public $ticket_code;
		public $date_of_birth;
		public $common_of_birth;
		public $province_of_birth;
		public $order_or_college;
		public $order_or_college_province;
		public $order_or_college_number;
		public $roles = [];
		protected $rules = [
			'subject_type'              => 'required',
			'consultant_type'           => 'nullable',
			'company_name'              => 'required|string',
			'first_name'                => 'required|string',
			'last_name'                 => 'required|string',
			'address'                   => 'nullable|string',
			'zip'                       => 'nullable|string|min:5|regex: /[0-9]/',
			'city'                      => 'required|string',
			'province'                  => 'nullable|string|min:2|max:2|regex: /[A-Za-z]/',
			'iban'                      => 'nullable | string |min:32 |max:32',
			'vat'                       => 'nullable|string',
			'fiscal_code'               => 'nullable | string |min:16|max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
			'phone'                     => 'nullable|string|min:10|regex: /[0-9]/',
			'fax'                       => 'nullable|string|min:10|regex: /[0-9]/',
			'email'                     => 'nullable|string|email|max:100|unique:anagrafiche',
			'email_pec'                 => 'nullable|string|email|max:100|unique:anagrafiche',
			'ticket_code'               => 'nullable|string',
			'date_of_birth'             => 'nullable|date|date_format:Y-m-d|before:today',
			'common_of_birth'           => 'nullable|string',
			'province_of_birth'         => 'nullable|string|min:2|max:2|regex: /[A-Za-z]/',
			'order_or_college'          => 'nullable|string',
			'order_or_college_province' => 'nullable|string|min:2|max:2|regex: /[A-Za-z]/',
			'order_or_college_number'   => 'nullable|string|regex: /[0-9]/',
		];

		public static function modalMaxWidth(): string {
			return '7xl';
		}

		public function mount($role = null) {
			if ($role) {
				foreach ($role as $r) {
					$this->roles[] = $r;
				}
			}
			$this->subject_roles = SubjectRole::all();
		}

		public function save() {
			$validated = $this->validate();
			$anagrafica = auth()->user()->anagrafiche()->create($validated);
			$anagrafica->roles()->sync($this->roles);
			$this->closeModal();
			// TODO: $this->emit non aggiorna la view "anagrafica.index"
			$this->emit('anagrafica-added');
			$this->emitTo('practice.tabs.subject', 'anagrafica-created', $anagrafica->id, $this->roles);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Anagrafica Creata'),
				'subtitle' => __('L\'anagrafica è stata creata con successo!')
			]);
		}

		public function render() {
			return view('livewire.anagrafica.create');
		}
	}
