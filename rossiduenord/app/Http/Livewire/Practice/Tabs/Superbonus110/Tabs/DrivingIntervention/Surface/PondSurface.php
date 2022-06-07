<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Surface;

	use App\Surface;
	use Livewire\Component;

	class PondSurface extends Component
	{
		public $currentSurface;
		public $intervention;
		public $condomino_id = null;
		public $surfaces;

		protected $listeners = [
			'surface-added' => '$refresh'
		];

		public function mount($currentSurface) {
			$this->currentSurface = $currentSurface;
		}

		public function deleteSurface($id) {
			Surface::destroy($id);

			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Cancellazione'),
				'subtitle' => __('La superficie è stata rimossa con successo!')
			]);
		}

		public function render() {
			$this->surfaces = Surface::where('type', $this->currentSurface)->where('intervention', $this->intervention)->where('condomino_id', $this->condomino_id)->get();
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.surface.pond-surface');
		}
	}