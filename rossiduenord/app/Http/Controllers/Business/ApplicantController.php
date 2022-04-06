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
            'phone' => 'nullable | integer | min:10 ',
            'mobile_phone' => 'nullable | integer | min:10',
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

        return redirect()->route('business.applicant.edit', $applicant);
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
            'phone' => 'nullable | string | min:10',
            'mobile_phone' => 'nullable | string | min:10',
            'email' => 'nullable | email',
            'role' => 'required | string',
        ],
        [
            //name
            'name.required'=> 'Inserisci un nome prima di procedere',
            'name.required'=> 'Inserisci un nome prima di procedere',
            'name.min'=> 'Il nome è troppo corto',
            'name.max'=> 'Il nome è troppo lungo',
            //lastname
            'lastname.required'=> 'Inserisci un cognome prima di procedere',
            'lastname.required'=> 'Inserisci un cognome prima di procedere',
            'lastname.min'=> 'Il cognome è troppo corto',
            'lastname.max'=> 'Il cognome è troppo lungo',
            //c_f
            'c_f.min'=>'Il codice fiscale deve avere un minimo di 16 caratteri',
            'c_f.max'=>'Il codice fiscale deve avere un massimo di 16 caratteri',
            'c_f.regex'=> 'Il codice fiscale risulta non valido',
            //phone number
            'phone.required' => 'Inserisci un numero di telefono',
            'phone.min' => 'Il numero di telefono deve essere composto da almeno 10 caratteri',
            //mobile phone
            'mobile_phone.required' => 'Inserisci un numero di cellulare',
            'mobile_phone.min' => 'Il numero di cellulare deve essere composto da almeno 10 caratteri',
            //email
            'email.required'=> 'Inserisci una email prima di procedere',
            'email.email'=> 'Assicurati di aver inserito correttamente la mail',
            //role
            'role.required'=> 'Inserisci il ruolo prima di procedere',
        ]
    );

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
