<?php

	namespace App\Http\Livewire\PriceList;

	use App\ComputoPriceList;
	use LivewireUI\Modal\ModalComponent;

	class Create extends ModalComponent
	{
		public $name;
		protected $rules = [
			'name' => 'required|string'
		];

		public function save() {
			ComputoPriceList::create([
				'user_id' => auth()->user()->isAdmin() ? null : auth()->user()->id,
				'name' => $this->name
			]);

			$this->closeModal();
			$this->emitTo('price-list.index', 'price_list-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Prezzario Creato'),
				'subtitle' => __('Il prezzario è stato creato con successo!')
			]);
		}

		public function render() {
			return view('livewire.price-list.create');
		}
	}