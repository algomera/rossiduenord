<?php

	namespace App\Http\Controllers;

	use App\{Applicant, Building, Practice, Subject};
	use Illuminate\Http\Request;

	class PracticeController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function index(Request $request) {
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
			$practices = $q->get();
			//importo sal finale
			$tot_sal = $practices->sum('import_sal');
			$expected_sal = $practices->sum('import');
			return view('pages.practice.index', compact('practices', 'tot_sal', 'expected_sal'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create() {
			return view('pages.practice.create');
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @return \Illuminate\Http\Response
		 */
		public function store(Request $request) {
			//Practice::create($validated);
			return view('pages.subject.show');
		}

		/**
		 * Display the specified resource.
		 *
		 * @param \App\Practice $practice
		 * @return \Illuminate\Http\Response
		 */
		public function show(Practice $practice) {
			//
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param \App\Practice $practice
		 * @return \Illuminate\Http\Response
		 */
		public function edit(Practice $practice, Subject $subject, Applicant $applicant, Building $building) {
			//$this->authorize('edit-practice', [$practice, $applicant]);
			$subject = $practice->subject;
			$applicant = $practice->applicant;
			$building = $practice->building;
			//import formatting
			if ($practice['import'] != null) {
				$practice['import'] = number_format($practice['import'], 2, ',', '.');
			}
			if ($practice['import_sal'] != null) {
				$practice['import_sal'] = number_format($practice['import_sal'], 2, ',', '.');
			}
			return view('pages.practice.edit', compact('practice', 'subject', 'applicant', 'building'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param \Illuminate\Http\Request $request
		 * @param \App\Practice $practice
		 * @return \Illuminate\Http\Response
		 */
		public function update(Request $request, Practice $practice) {
			$validated = $request->validate(['applicant_id' => ' numeric | exists:applicants,id', 'import' => 'required | string', 'practical_phase' => 'required | string', 'real_estate_type' => 'required | string', //            'month' => 'required | string',
				//            'year' => 'required | numeric | min:2',
				'policy_name' => 'required | string | min:3', 'address' => 'required | string | min:5', 'civic' => 'required | string', 'common' => 'required | string | min:3', 'province' => 'required | string | min:2 | max:2', 'region' => 'required | string', 'cap' => 'required | string | min:5 | max:5', 'work_start' => 'required | string', 'c_m' => 'required | numeric', 'assev_tecnica' => 'nullable | numeric', //            'nominative' => 'nullable | string |min:3 |max:150',
				//            'lastName' => 'nullable | string | min:3 | max:50',
				//            'name' => 'nullable | string | min:3 | max:50',
				'policy' => 'nullable | string', 'request_policy' => 'nullable | string | min:3 |max:30', 'referent_email' => 'nullable | email ', 'description' => 'nullable | string', 'bonus' => 'nullable | string', 'month_processing' => 'nullable|string', 'year_processing' => 'nullable | string', 'sal' => 'nullable | string', 'import_sal' => 'nullable | string', 'note' => 'nullable | string', 'practice_ok' => 'nullable | string',], [//todo  custom errors
					//* import
					'import.required' => 'Inserisci l\'importo prima di procedere', 'import.min' => 'L\'importo non pu?? essere inferiore alle due cifre', //practical_phase
					'practical_phase.required' => 'Innserisci la fase pratica', //type
					'real_estate_type.required' => 'Inserisci il tipo di struttura', 'month.required' => 'Inserisci il mese della pratica', 'year.required' => 'Inserisci l\'anno della pratica', 'policy_name.required' => 'Inserisci il nome della pratica', 'address.required' => 'Inserisci un indirizzo prima di procedere', 'address.min' => 'L\'indirizzo ?? troppo corto', 'civic.min' => 'Il civico non ?? valido', 'civic.required' => 'Inserisci il numero civico prima di procedere', 'common.required' => 'Inserisci il comune di provenienza prima di procedere', 'common.min' => 'Il comune ?? troppo corto', 'province.min' => 'La provincia non ?? valida', 'province.required' => 'Inserisci la provincia prima di procedere', 'region.required' => 'Inserisci la Regione prima di procedere', 'cap.required' => 'Inserisci il cap prima di procedere', 'cap.min' => 'Il cap deve erre lungo minimo 5 caratteri', 'cap.max' => 'Il cap deve erre lungo massimo 5 caratteri', 'work_start.required' => 'Inserisci la data di inizio lavori prima di procedere', 'c_m.required' => 'Inserisci l\'importo c.m prima di procedere', 'assev_tecnica.required' => 'Inserisci l\'importo dell\'Asseverazione tecnica prima di procedere', 'nominative.required' => 'Inserisci un nominativo prima di procedere', 'nominative.min' => 'Il nominativo ?? troppo corto', 'nominative.max' => 'Il nominativo ?? troppo lungo', 'lastName.required' => 'Inserisci un cognome prima di procedere', 'lastName.min' => 'Il cognome ?? troppo corto', 'lastName.max' => 'Il cognome ?? troppo lungo', 'name.required' => 'Inserisci un nome prima di procedere', 'name.min' => 'Il nome ?? troppo corto', 'name.max' => 'Il nome ?? troppo lungo', 'policy.required' => 'Non hai richiesto la polizza', 'request_policy.required' => 'Inserisci il nome del richiedente della polizza', 'referent_email.required' => 'Inserisci la mail di riferimento', 'description.required' => 'Inserisci una descrizione', 'bonus.required' => 'Seleziona la tipologia di bonus prima di procedere', 'note.required' => 'Inserisci delle note prima di procedere', 'practice_ok.required' => 'Inserisci lo stato della pratica prima di procedere',]);
			//formatting values
			if (array_key_exists('province', $validated)) {
				$validated['province'] = strtoupper($validated['province']);
			}
			if ($validated['import'] != null) {
				$validated['import'] = str_replace('.', '', $validated['import']);
				$validated['import'] = str_replace(',', '.', $validated['import']);
			}
			if ($validated['import_sal'] != null) {
				$validated['import_sal'] = str_replace('.', '', $validated['import_sal']);
				$validated['import_sal'] = str_replace(',', '.', $validated['import_sal']);
			}
			$validated['policy'] = isset($validated['policy']);
			$validated['bonus'] = isset($validated['bonus']) ? '110%' : '';
			$practice->update($validated);
			return redirect()->route('subject.edit', $practice);
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param \App\Practice $practice
		 * @return \Illuminate\Http\Response
		 */
		public function destroy($id) {
			$practice = Practice::find($id);
			$practice->delete();
			return redirect()->back()->with('message', "La pratica: $practice->id e stata eliminata!");
		}
	}
