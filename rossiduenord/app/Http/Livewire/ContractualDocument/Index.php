<?php

	namespace App\Http\Livewire\ContractualDocument;

	use App\Contract as ContractModel;
	use App\ContractualDocument;
	use Illuminate\Support\Facades\Storage;
	use Livewire\Component;
	use Livewire\WithFileUploads;

	class Index extends Component
	{
		use WithFileUploads;

		public $selected;
		public $tabs = [];
		public $contractual_documents = [];
		public $file_document = [];
		public $uploaded_contractual_document = [];
		protected $listeners = [
			'document-added'   => '$refresh',
			'document-removed' => '$refresh'
		];
		protected $rules = [
			'file_document.*' => 'file'
		];

		public function mount() {
			if (auth()->user()->role->name === 'business') {
				$this->selected = auth()->user()->id;
			} else if (auth()->user()->childs->count()) {
				$this->selected = auth()->user()->childs->first()->id;
				$this->tabs = auth()->user()->childs;
			}
			else if (auth()->user()->parents->count()) {
				$this->selected = auth()->user()->parents->first()->id;
				$this->tabs = auth()->user()->parents;
			}
		}

		public function upload($id) {
			$file = $this->uploaded_contractual_document[$id];
			$extension = $file->extension();
			$filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
			$path = $file->storeAs('practices/' . $this->practice->id . '/contracts/' . $id . '_document_request', $filename . '.' . $extension);
			$this->practice->contracts()->where('id', $id)->update([
				'uploaded_path' => $path
			]);
			$this->emit('document-added');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Aggiunta'),
				'subtitle' => __('Il file è stato aggiunto con successo!')
			]);
			$this->uploaded_contractual_document[$id] = null;
		}

		public function delete($id) {
			$file = ContractModel::find($id);
			Storage::delete($file->uploaded_path);
			$file->uploaded_path = null;
			$file->save();
			$this->emit('document-removed');
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Rimozione'),
				'subtitle' => __('Il file è stato eliminato con successo!')
			]);
		}

		public function render() {
			$this->contractual_documents = ContractualDocument::all();
			return view('livewire.contractual-document.index');
		}
	}
