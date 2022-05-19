<?php

	namespace App\Http\Livewire\Practice;

	use App\Practice;
	use Illuminate\Http\Request;
	use Livewire\Component;

	class PracticeIndex extends Component
	{
		public $practices;
		public $tot_sal;
		public $expected_sal;

		public function mount(Request $request) {
			//$this->authorize('access_practices');
			if (auth()->user()->role === 'technical_asseverator' || auth()->user()->role === 'fiscal_asseverator') {
				$business = auth()->user()->business->pluck('id');
				$q = Practice::query()->whereIn('user_id', $business);
			} else {
				$q = Practice::query()->where('user_id', auth()->id());
			}
			if ($request->get('practical_month') !== null) {
				$q->where('month', '=', $request->get('practical_month'));
			}
			if ($request->get('practical_phase') !== null) {
				$q->where('practical_phase', '=', $request->get('practical_phase'));
			}
			if ($request->get('practical_description') !== null) {
				$q->where('description', 'LIKE', '%' . $request->get('practical_description') . '%');
			}
			if ($request->get('practical_number') !== null) {
				$q->where('id', '=', $request->get('practical_number'));
			}
			$this->practices = $q->get();
			//importo sal finale
			$this->tot_sal = $this->practices->sum('import_sal');
			$this->expected_sal = $this->practices->sum('import');
		}

		public function render() {
			return view('livewire.practice.practice-index');
		}
	}
