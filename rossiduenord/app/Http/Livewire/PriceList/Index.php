<?php

	namespace App\Http\Livewire\PriceList;

	use App\ComputoPriceList;
	use App\ComputoPriceListRow;
	use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
	use Livewire\Component;
	use Livewire\WithFileUploads;

	class Index extends Component
	{
		use AuthorizesRequests;
		use WithFileUploads;

		public $price_lists = [];
		public $uploaded_price_lists = [];

		protected $listeners = [
			'price_list-added'   => '$refresh',
			'price_list-removed' => '$refresh'
		];

		protected $rules = [
			'price_lists.*' => 'file'
		];

		public function upload($id) {
			$this->authorize('upload_price_list');

			foreach ($this->uploaded_price_lists as $p) {
				foreach ($p as $k => $item) {
					ComputoPriceListRow::create([
						'folder_id' => $id,
						'code' => 'ASDASD -- ' . $k,
						'description' => 'lorem ipsum',
						'um' => 'cm',
						'price' => 30.50,
						'mat' => 10
					]);
				}
			}

			$this->emit('price_list-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiunta'),
				'subtitle' => __('Il prezzario è stato aggiunto con successo!')
			]);
			$this->uploaded_price_lists = [];
		}

		public function delete($id) {
			$this->authorize('delete_price_list');
			$price_list = ComputoPriceList::find($id);
			$price_list->delete();
			$this->emit('document-removed');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Rimozione'),
				'subtitle' => __('Il prezzario è stato eliminato con successo!')
			]);
		}

		public function render() {
			$this->price_lists = ComputoPriceList::all();
			return view('livewire.price-list.index');
		}
	}
