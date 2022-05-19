<?php

	namespace App\Http\Livewire\Practice;

	use App\Helpers\Contracts;
	use App\Helpers\folder_documents;
	use App\Helpers\Policies;
	use App\Practice;
	use Illuminate\Http\Request;
	use Livewire\Component;

	class PracticeIndex extends Component
	{
		public $practices;
		public $tot_sal;
		public $expected_sal;

		protected $listeners = [
			'practice-deleted' => '$refresh',
		];

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

		public function createPractice() {
			// Create new Applicant related by User
			$applicant = auth()->user()->applicant()->create();
			// Create new Practice
			$practice = Practice::create([
				'applicant_id'=> $applicant->id,
				'user_id' => auth()->user()->id
			]);
			// Create all models related by Practice
			$practice->subject()->create();
			$practice->building()->create();
			$practice->data_project()->create();
			$practice->driving_intervention()->create();
			$practice->towed_intervention()->create();
			$practice->final_state()->create();
			$practice->variant()->create();

			// folder document creation
			folder_documents::addFolders($practice->id);
			Contracts::createInitialContracts($practice->id);
			Policies::createInitialPolicies($practice->id);
			return redirect()->route('practice.edit', $practice);
		}

		public function deletePractice($id) {
			Practice::find($id)->delete();

			$this->dispatchBrowserEvent('close-modal');

			$this->dispatchBrowserEvent('open-notification', [
				'title'    => __('Pratica Eliminata'),
				'subtitle' => __('La pratica è stata eliminata con successo!')
			]);

			$this->emit('practice-deleted');
		}

		public function render() {
			return view('livewire.practice.practice-index');
		}
	}
