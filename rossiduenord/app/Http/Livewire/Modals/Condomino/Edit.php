<?php

	namespace App\Http\Livewire\Modals\Condomino;

	use App\Condomini as CondominiModel;
	use LivewireUI\Modal\ModalComponent;

	class Edit extends ModalComponent
	{
		public CondominiModel $condomino;
		protected $rules = [
			'condomino.name'            => 'required|string',
			'condomino.surname'         => 'required|string',
			'condomino.phone'           => 'required|string',
			'condomino.email'           => 'required|string',
			'condomino.cf'              => 'required|string',
			'condomino.millesimi_inv'   => 'required|string',
			'condomino.foglio'          => 'required|string',
			'condomino.part'            => 'required|string',
			'condomino.sub'             => 'required|string',
			'condomino.categ_catastale' => 'required|string',
			'condomino.sup_catastale'   => 'required|string',
			'condomino.comproprietari'  => 'boolean',
		];

		public function mount(CondominiModel $condomino) {
			$this->condomino = $condomino;
		}

		public function save() {
			$this->condomino->update();

			$this->closeModal();
			$this->emitTo('practice.tabs.superbonus110.tabs.towed-intervention', 'condomino-edited');
			$this->emitTo('practice.tabs.superbonus110.tabs.towed-intervention.condomino-section', 'condomino-edited');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiornamento'),
				'subtitle' => __('Il condomino è stato aggiornato con successo!')
			]);
		}

		public function render() {
			return view('livewire.modals.condomino.edit');
		}
	}
