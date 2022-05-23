<?php

	namespace App\Http\Livewire\Anagrafica;

	use App\Anagrafica;
	use App\SubjectRole;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		public $anagrafica;
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
		protected function rules() {
			return [
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
				'email'                     => 'nullable|string|email|max:100|unique:anagrafiche,email,' . $this->anagrafica->id,
				'email_pec'                 => 'nullable|string|email|max:100|unique:anagrafiche,email_pec,' . $this->anagrafica->id,
				'ticket_code'               => 'nullable|string',
				'date_of_birth'             => 'nullable|date|date_format:Y-m-d|before:today',
				'common_of_birth'           => 'nullable|string',
				'province_of_birth'         => 'nullable|string|min:2|max:2|regex: /[A-Za-z]/',
				'order_or_college'          => 'nullable|string',
				'order_or_college_province' => 'nullable|string|min:2|max:2|regex: /[A-Za-z]/',
				'order_or_college_number'   => 'nullable|string|regex: /[0-9]/',
			];
		}

		public static function modalMaxWidth(): string {
			return '7xl';
		}

		public function mount($id) {
			$this->anagrafica = Anagrafica::find($id);
			$this->subject_type = $this->anagrafica->subject_type;
			$this->consultant_type = $this->anagrafica->consultant_type;
			$this->company_name = $this->anagrafica->company_name;
			$this->first_name = $this->anagrafica->first_name;
			$this->last_name = $this->anagrafica->last_name;
			$this->address = $this->anagrafica->address;
			$this->zip = $this->anagrafica->zip;
			$this->city = $this->anagrafica->city;
			$this->province = $this->anagrafica->province;
			$this->iban = $this->anagrafica->iban;
			$this->vat = $this->anagrafica->vat;
			$this->fiscal_code = $this->anagrafica->fiscal_code;
			$this->phone = $this->anagrafica->phone;
			$this->fax = $this->anagrafica->fax;
			$this->email = $this->anagrafica->email;
			$this->email_pec = $this->anagrafica->email_pec;
			$this->ticket_code = $this->anagrafica->ticket_code;
			$this->date_of_birth = $this->anagrafica->date_of_birth;
			$this->common_of_birth = $this->anagrafica->common_of_birth;
			$this->province_of_birth = $this->anagrafica->province_of_birth;
			$this->order_or_college = $this->anagrafica->order_or_college;
			$this->order_or_college_province = $this->anagrafica->order_or_college_province;
			$this->order_or_college_number = $this->anagrafica->order_or_college_number;
			foreach ($this->anagrafica->roles->pluck('id') as $role) {
				$this->roles[] = $role;
			}

			$this->subject_roles = SubjectRole::all();
		}

		public function save() {
			$validated = $this->validate();
			$this->anagrafica->update($validated);
			$this->anagrafica->roles()->sync($this->roles);
			$this->closeModalWithEvents([
				Index::getName() => 'anagrafica-updated',
			]);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Anagrafica Aggiornata'),
				'subtitle' => __('L\'anagrafica è stata aggiornata con successo!')
			]);
		}

		public function render() {
			return view('livewire.anagrafica.edit');
		}
	}
