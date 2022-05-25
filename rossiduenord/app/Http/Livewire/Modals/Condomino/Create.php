<?php

	namespace App\Http\Livewire\Modals\Condomino;

	use App\Practice as PracticeModel;
	use LivewireUI\Modal\ModalComponent;

	class Create extends ModalComponent
	{
		public PracticeModel $practice;
		public $name;
		public $surname;
		public $phone;
		public $email;
		public $cf;
		public $millesimi_inv;
		public $foglio;
		public $part;
		public $sub;
		public $categ_catastale;
		public $sup_catastale;
		public $comproprietari = false;

		protected $rules = [
			'name'            => 'required|string',
			'surname'         => 'required|string',
			'phone'           => 'required|string',
			'email'           => 'required|string',
			'cf'              => 'required|string',
			'millesimi_inv'   => 'required|string',
			'foglio'          => 'required|string',
			'part'            => 'required|string',
			'sub'             => 'required|string',
			'categ_catastale' => 'required|string',
			'sup_catastale'   => 'required|string',
			'comproprietari'  => 'boolean',
		];

		public function mount(PracticeModel $practice) {
			$this->practice = $practice;
		}

		public function save() {
			$validated = $this->validate();
			$this->practice->condomini()->create($validated);
			$this->closeModal();
			$this->emitTo('practice.tabs.building', 'condomino-created');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Creazione'),
				'subtitle' => __('Il condomino è stato creato con successo!')
			]);
		}

		public function render() {
			return view('livewire.modals.condomino.create');
		}
	}
