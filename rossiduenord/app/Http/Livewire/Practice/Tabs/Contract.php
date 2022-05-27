<?php

	namespace App\Http\Livewire\Practice\Tabs;

	use App\Contract as ContractModel;
	use App\Practice as PracticeModel;
	use Illuminate\Support\Facades\Storage;
	use Livewire\Component;
	use Livewire\WithFileUploads;

	class Contract extends Component
	{
		use WithFileUploads;

		public PracticeModel $practice;
		public $file_contract = [];
		public $uploaded_contract = [];
		protected $listeners = [
			'document-added'   => '$refresh',
			'document-removed' => '$refresh'
		];
		protected $rules = [
			'file_policy.*' => 'file'
		];

		public function mount(PracticeModel $practice) {
			$this->practice = $practice;
			$this->file_contract = $practice->contracts;
		}

		public function upload($id) {
			$file = $this->uploaded_contract[$id];
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
			$this->uploaded_contract[$id] = null;
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
			return view('livewire.practice.tabs.contract');
		}
	}
