<?php

namespace App\Http\Controllers\Business;
use App\{FinalState,
    Practice,
    Subject,
    Applicant,
    Building,
    Data_project,
    Folder_Document,
    TrainatedVertWall,
    Variant,
    VerticalWall};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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

        // superbonus creation
        Data_project::create($data);
        VerticalWall::create($data);
        TrainatedVertWall::create($data);
        FinalState::create($data);
        Variant::create($data);

        $list_folder = [
            [
                'practice_id'=> $practice_id,
                'name' => 'Documenti necessari PRIMA dell\'inizio dei lavori'
            ],
            [
                'practice_id'=> $practice_id,
                'name' => 'Documenti necessari DURANTE i lavori'
            ],
            [
                'practice_id'=> $practice_id,
                'name' => 'Documenti necessari AL TERMINE dei lavori'
            ]

        ];
        for ($i = 0; $i < 3; $i++) { 
            Folder_Document::create($list_folder[$i]);
        }

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
    public function edit(Practice $practice, Subject $subject, Applicant $applicant, Building $building)
    {
        $this->authorize('edit-applicant',  $applicant);
        $practice = $applicant->practice[0];
        $building = $practice->building;
        $subject = $practice->subject;
        
        return view('business.applicant.edit', compact('practice', 'subject', 'applicant', 'building'));
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
            'applicant' => 'nullable | string',
            'name' => 'nullable | string | min:3 | max:100',
            'lastName' => 'nullable | string | min:3 | max:100',
            'c_f' => 'nullable | string | min:16 | max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i ',
            'phone' => 'nullable | numeric',
            'mobile_phone' => 'nullable | numeric | min:10',
            'email' => 'nullable | email',
            'role' => 'nullable | string',
        ]);

        $applicant->update($validated);

        return redirect()->route('business.practice.edit', $applicant);
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
