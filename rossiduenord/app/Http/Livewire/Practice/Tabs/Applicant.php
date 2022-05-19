<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use Livewire\Component;

	class Applicant extends Component
	{
		public $applicant;
		public $applicant_type = 'impresa';
		public $company_name = '';
		public $c_f = '';
		public $phone = '';
		public $mobile_phone = '';
		public $email = '';
		public $role = '';
		protected $rules = [
			'applicant_type'    => 'nullable | string',
			'company_name' => 'nullable | string | min:3 | max:100',
			'c_f'          => 'nullable | string | min:16 | max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
			'phone'        => 'nullable | string | min:10|regex: /[0-9]/',
			'mobile_phone' => 'nullable | string | min:10',
			'email'        => 'nullable | email',
			'role'         => 'required | string',
		];
		protected $messages = [
			// company_name
			'company_name.required' => 'Inserisci il nome dell\'impresa prima di procedere',
			'company_name.min'      => 'Il nome è troppo corto',
			'company_name.max'      => 'Il nome è troppo lungo',
			//c_f
			'c_f.min'               => 'Il codice fiscale deve avere un minimo di 16 caratteri',
			'c_f.max'               => 'Il codice fiscale deve avere un massimo di 16 caratteri',
			'c_f.regex'             => 'Il codice fiscale risulta non valido',
			//phone number
			'phone.required'        => 'Inserisci un numero di telefono',
			'phone.min'             => 'Il numero di telefono deve essere composto da almeno 10 caratteri',
			//mobile phone
			'mobile_phone.required' => 'Inserisci un numero di cellulare',
			'mobile_phone.min'      => 'Il numero di cellulare deve essere composto da almeno 10 caratteri',
			//email
			'email.required'        => 'Inserisci una email prima di procedere',
			'email.email'           => 'Assicurati di aver inserito correttamente la mail',
			//role
			'role.required'         => 'Inserisci il ruolo prima di procedere',
		];

		public function mount() {
			$this->applicant_type = $this->applicant->applicant_type;
			$this->company_name = $this->applicant->company_name;
			$this->c_f = $this->applicant->c_f;
			$this->phone = $this->applicant->phone;
			$this->mobile_phone = $this->applicant->mobile_phone;
			$this->email = $this->applicant->email;
			$this->role = $this->applicant->role;
		}

		public function save() {
			$validated = $this->validate();
			// phone number validation
//			if ($validated['phone'] != null) {
//				$validated['phone'] = str_replace(' ', '', $validated['phone']);
//				preg_match('/^(\d{3})(\d{3})(\d{4})$/', $validated['phone'], $matches);
//				$validated['phone'] = $matches[1] . ' ' . $matches[2] . ' ' . $matches[3];
//			}
//			if ($validated['mobile_phone'] != null) {
//				$validated['mobile_phone'] = str_replace(' ', '', $validated['mobile_phone']);
//				preg_match('/^(\d{3})(\d{3})(\d{4})$/', $validated['mobile_phone'], $matches);
//				$mobile_phone = $matches[1] . ' ' . $matches[2] . ' ' . $matches[3];
//				$validated['mobile_phone'] = $mobile_phone;
//			}
			$validated['c_f'] = strtoupper($validated['c_f']);
			$this->applicant->update($validated);
//			return redirect()->route('practice.edit', $this->applicant);
		}

		public function render() {
			return view('livewire.practice.tabs.applicant');
		}
	}
