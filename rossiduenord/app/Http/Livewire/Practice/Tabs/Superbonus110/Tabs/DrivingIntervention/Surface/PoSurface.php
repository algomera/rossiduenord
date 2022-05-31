<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Surface;

	use App\Surface;
	use Livewire\Component;

	class PoSurface extends Component
	{
		public $currentSurface;
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
				'subtitle' => __('La superficie è stat rimossa con successo!')
			]);
		}

		public function render() {
			$this->surfaces = Surface::where('type', $this->currentSurface)->get();
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.surface.po-surface');
		}
	}
