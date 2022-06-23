<?php

	namespace App\Http\Livewire\Practice\Tabs\Superbonus110\Tabs\DrivingIntervention\Surface;

	use App\Surface;
	use App\SurfaceSal;
	use Livewire\Component;

	class PsSurface extends Component
	{
		public $currentSurface;
		public $intervention;
		public $condomino_id = null;
		public $surfaces;
		public $sals;
		public $sal_1;
		public $sal_2;
		public $sal_f;

		protected $listeners = [
			'surface-added' => '$refresh'
		];

		public function mount($practice, $currentSurface, $is_common = 0) {
			$this->currentSurface = $currentSurface;
			$this->sals = SurfaceSal::firstOrCreate([
				'practice_id' => $practice->id,
				'type' => $this->currentSurface,
				'intervention' => $this->intervention,
				'condomino_id' => $this->condomino_id,
				'is_common' => $is_common,
			]);
			$this->sal_1 = $this->sals->sal_1;
			$this->sal_2 = $this->sals->sal_2;
			$this->sal_f = $this->sals->sal_f;
		}

		public function deleteSurface($id) {
			Surface::destroy($id);

			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Cancellazione'),
				'subtitle' => __('La superficie è stata rimossa con successo!')
			]);
		}

		public function saveSurfaceSal() {
			$this->sals->update([
				'sal_1' => $this->sal_1,
				'sal_2' => $this->sal_2,
				'sal_f' => $this->sal_f,
			]);
		}

		public function render() {
			$this->surfaces = Surface::where('type', $this->currentSurface)->where('intervention', $this->intervention)->where('condomino_id', $this->condomino_id)->get();
			return view('livewire.practice.tabs.superbonus110.tabs.driving-intervention.surface.ps-surface');
		}
	}
