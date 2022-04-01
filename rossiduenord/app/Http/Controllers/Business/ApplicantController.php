<?php

namespace App\Http\Controllers\Business;
use App\{FinalState,
    Practice,
    Subject,
    Applicant,
    Building,
    Bonus,
    Data_project,
    TrainatedVertWall,
    Variant,
    VerticalWall};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ApplicantController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.applicant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Practice $practice, Applicant $applicant)
    {
        $validated = $request->validate([
            'applicant' => 'nullable | string',
            'name' => 'nullable | string | min:3 | max:100',
            'lastName' => 'nullable | string | min:3 | max:100',
            'c_f' => 'nullable | string | min:16 | max:16 ',
            'phone' => 'nullable | numeric',
            'mobile_phone' => 'nullable | numeric | min:10',
            'email' => 'nullable | email',
            'role' => 'nullable | string',
        ]);

        $user_id = Auth::user()->id;
        $validated['user_id'] = $user_id;

        //new applicant creation
        $applicant = Applicant::create($validated);
        //takig the id of new applicant
        $applicant_id = $applicant['id'];
        //insert into new practice
        $practice_data= ['applicant_id'=> $applicant_id];
        //new practice creation
        $practice = Practice::create($practice_data);
        $practice_id = $practice['id'];
        $data = ['practice_id'=> $practice_id];
        // subject creation
        $subject = Subject::create($data);
        // building creation
        $building = Building::create($data);
        // $new_project = new Data_project($data);
        // $new_project->practice()->associate($practice)->save();
        Data_project::create($data);

        VerticalWall::create($data);

        TrainatedVertWall::create($data);

        FinalState::create($data);

        Variant::create($data);

        return view('business.applicant.edit', compact('applicant','practice','subject','building'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function show(Applicant $applicant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice, Subject $subject, Applicant $applicant, Building $building, Bonus $bonus)
    {
        $practice = $applicant->practice[0];
        $building = $practice->building;
        $subject = $practice->subject;
        // $subject = $practice->subject;
        return view('business.applicant.edit', compact('practice', 'subject', 'applicant', 'building', 'bonus'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Applicant $applicant)
    {
        $validated = $request->validate([
            'applicant' => 'required | string',
            'name' => 'required | string | min:3 | max:100',
            'lastName' => 'required | string | min:3 | max:100',
            'c_f' => 'required | string | min:16 | max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i ',
            'phone' => 'required | numeric',
            'mobile_phone' => 'required | numeric | min:10',
            'email' => 'required | email',
            'role' => 'required | string',
        ]);

        // $practices = DB::table('practices')
        // ->where('applicant_id', '=', $applicant->id)
        // ->get();
        // $practice = $practices[0];

        $applicant->update($validated);
        $practice =$applicant->practice[0];
        $subject = $practice->subject;
        $building = $practice->building;

        return view('business.practice.edit', compact('practice','applicant','building','subject'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Applicant  $applicant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Applicant $applicant)
    {
        //
    }
}
