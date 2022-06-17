<?php

	namespace App\Http\Livewire\Practice\Modals\Computo\Tabs\Computo;

	use App\ComputoPriceList;
	use App\ComputoPriceListRow;
	use Livewire\Component;

	class PriceList extends Component
	{
		public $price_lists = [];
		public $tree = [];
		public $selected = null;
		public $selectedPriceList;
		public $price_list_rows = [];

		public function mount() {
			$this->price_lists = ComputoPriceList::where('user_id', null)->orWhere('user_id', auth()->user()->id)->get();
			if ($this->price_lists->count() > 0) {
				$this->selectedPriceList = $this->price_lists[0]->id;
			}
		}

		public function updatingSelectedPriceList() {
			$this->selected = null;
		}

		public function render() {
			$items = ComputoPriceListRow::tree(3)->get();
			$this->tree = $items->toTree();
			$this->price_list_rows = ComputoPriceListRow::where('parent_id', $this->selected)->get();

			return view('livewire.practice.modals.computo.tabs.computo.price-list');
		}
	}
