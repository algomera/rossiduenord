<?php

	namespace App\Http\Livewire\Components;

	use Illuminate\Support\Facades\Storage;
	use Livewire\Component;

	class CondominiSection extends Component
	{
		public $practice;
		public $building;
		public $condomini;
		public $tmp_excel_file;

		protected $listeners = [
			'condomino-created' => '$refresh'
		];

		public function mount() {
			$this->building = $this->practice->building;
		}

		public function exportExcel() {
			return redirect()->route('condomini.export', $this->practice->id);
		}

		public function importExcel() {
			$extension = $this->tmp_excel_file->extension();
			$filename = pathinfo($this->tmp_excel_file->getClientOriginalName(), PATHINFO_FILENAME);
			// Dovendo avere un solo file caricato, cancello gli altri (se presenti) nella cartella
			if (count(Storage::allFiles('practices/' . $this->practice->id . '/excel'))) {
				$files = Storage::allFiles('practices/' . $this->practice->id . '/excel');
				Storage::delete($files);
			}
			$path = $this->tmp_excel_file->storeAs('practices/' . $this->practice->id . '/excel', $filename . '.' . $extension);
			$this->building->imported_excel_file = $path;
			$this->building->update([
				'imported_excel_file' => $path
			]);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Caricamento'),
				'subtitle' => __('Il file è stato caricato con successo!')
			]);
			$this->tmp_excel_file = null;
		}

		public function downloadExcel() {
			$file = $this->building->imported_excel_file;
			return Storage::download($file);
		}

		public function deleteExcel() {
			$this->building->update([
				'imported_excel_file' => null
			]);
			$files = Storage::allFiles('practices/' . $this->practice->id . '/excel');
			Storage::delete($files);
			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Eliminazione'),
				'subtitle' => __('Il file è stato eliminato con successo!')
			]);
		}

		public function render() {
			$this->condomini = $this->practice->condomini;
			return view('livewire.components.condomini-section');
		}
	}
