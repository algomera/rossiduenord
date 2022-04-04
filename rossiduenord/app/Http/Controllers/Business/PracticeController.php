<?php

namespace App\Http\Controllers\Business;

use App\{Practice, Subject, Applicant, Building, Bonus};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $applicants = Applicant::where('user_id', auth()->id())->pluck('id');

        $q = DB::table('practices')
            ->join('applicants', 'practices.applicant_id', '=', 'applicants.id')
            ->whereIn('applicant_id', $applicants)
            ->select('practices.*', 'applicants.*');

        if($request->get('practical_month') !== null) {
            $q->where('month', '=', $request->get('practical_month'));
        }

        if($request->get('practical_phase') !== null) {
            $q->where('practical_phase', '=', $request->get('practical_phase'));
        }

        if($request->get('practical_description') !== null) {
            $q->where('description', 'LIKE', '%' . $request->get('practical_description') . '%');
        }

        if($request->get('practical_number') !== null) {
            $q->where('id', '=', $request->get('practical_number'));
        }

        $practices = $q->get();

//        dd($practices);
        return view('business/practice.index', compact('practices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.practice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        //Practice::create($validated);
        return view('business.subject.show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice, Subject $subject, Applicant $applicant, Building $building, Bonus $bonus)
    {
        $this->authorize('edit-practice', [$practice, $applicant]);

        $practice_data = Carbon::today()->format('d/m/Y');
        $subject = $practice->subject;
        $applicant = $practice->applicant;
        $building = $practice->building;

        return view('business.practice.edit', compact('practice', 'subject', 'applicant', 'building', 'bonus', 'practice_data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practice $practice)
    {
        $validated = $request->validate([
            'applicant_id' => ' numeric | exists:applicants,id',
            'import' => 'required | integer | min:2',
            'practical_phase' => 'required | string',
            'real_estate_type' => 'required | string',
            'month' => 'required | string',
            'year' => 'required | numeric | min:2',
            'policy_name' => 'required | string | min:3',
            'address' => 'required | string | min:5',
            'civic' => 'required | numeric | min:1',
            'common' => 'required | string | min:3',
            'province' => 'required | string | min:2 | max:2',
            'region' => 'required | string',
            'cap' => 'required | string | min:5 | max:5',
            'work_start' => 'required | string',
            'c_m' => 'required | numeric |min:2',
            'assev_tecnica' => 'required | numeric |min:2',
            'nominative' => 'required | string |min:3 |max:150',
            'lastName' => 'required | string | min:3 | max:50',
            'name' => 'required | string | min:3 | max:50',
            'policy' => 'required | string',
            'request_policy' => 'required | string | min:3 |max:30',
            'referent_email' => 'required | email ',
            'description' => 'required | string',
            'bonus' => 'required | string',
            'note' => 'required | string',
            'practice_ok' => 'required | string',
        ],
        [
            //todo  custom errors
            //* import
            'import.required'=>'Inserisci l\'importo prima di procedere',
            'import.min'=>'L\'importo non può essere inferiore alle due cifre',
            //practical_phase
            'practical_phase.required'=>'Innserisci la fase pratica',
            //type
            'real_estate_type.required'=>'Innserisci il tipo di struttura',
            'month.required'=>'Inserisci il mese della pratica',
            'year.required'=>'Inserisci l\'anno della pratica',
            'policy_name.required'=>'Inserisci il nome della pratica',
            'address.required'=> 'Inserisci un indirizzo prima di procedere',
            'address.min'=> 'L\'indirizzo è troppo corto',
            'civic.min'=> 'Il civico non è valido',
            'civic.required'=> 'Inserisci il numero civico prima di procedere',
            'common.required'=> 'Inserisci il comune di provenienza prima di procedere',
            'common.min'=> 'Il comune è troppo corto',
            'province.min'=> 'La provincia non è valida',
            'province.required'=> 'Inserisci la provincia prima di procedere',
            'region.required'=> 'Inserisci la Regione prima di procedere',
            'cap.required'=> 'Inserisci il cap prima di procedere',
            'cap.min'=> 'Il cap deve erre lungo minimo 5 caratteri',
            'cap.max'=> 'Il cap deve erre lungo massimo 5 caratteri',
            'work_start.required'=> 'Inserisci la data di inizio lavori prima di procedere',
            'c_m.required'=> 'Inserisci l\'importo c.m prima di procedere',
            'assev_tecnica.required'=> 'Inserisci l\'importo dell\'Asseverazione tecnica prima di procedere',
            'nominative.required'=>'Inserisci un nominativo prima di procedere',
            'nominative.min'=>'Il nominativo è troppo corto',
            'nominative.max'=>'Il nominativo è troppo lungo',
            'lastName.required'=>'Inserisci un cognome prima di procedere',
            'lastName.min'=>'Il cognome è troppo corto',
            'lastName.max'=>'Il cognome è troppo lungo',
            'name.required'=>'Inserisci un nome prima di procedere',
            'name.min'=>'Il nome è troppo corto',
            'name.max'=>'Il nome è troppo lungo',
            'policy.required'=>'Non hai richiesto la polizza',
            'request_policy.required'=>'Inserisci il nome del richiedente della polizza',
            'referent_email.required'=>'Inserisci la mail di riferimento',
            'description.required'=> 'Inserisci una descrizione',
            'bonus.required'=> 'Seleziona la tipologia di bonus prima di procedere',
            'note.required'=>'Inserisci delle note prima di procedere',
            'practice_ok.required'=>'Inserisci lo stato della pratica prima di procedere',
        ]
    );

        $practice->update($validated);

        return redirect()->route('business.subject.edit', $practice);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $practice = Practice::find($id);
        $practice->delete();
        return redirect()->back()->with('message', "La pratica: $practice->id e stata eliminata!");

    }
}
