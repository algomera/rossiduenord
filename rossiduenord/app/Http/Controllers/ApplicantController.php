<?php

namespace App\Http\Controllers;
use App\{Applicant,
	Building,
	Data_project,
	FinalState,
	FolderDocument,
	Practice,
	Subject,
	TowedIntervention,
	Variant,
	DrivingIntervention,};
use App\Helpers\Contracts;
use App\Helpers\folder_documents;
use App\Helpers\Policies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.applicant.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //
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
    public function edit(Applicant $applicant)
    {
        $practice = $applicant->practice;
        $building = $practice->building;
        $subject = $practice->subject;

        return view('pages.applicant.edit', compact('practice', 'subject', 'applicant', 'building'));
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
            'company_name' => 'nullable | string | min:3 | max:100',
//            'name' => 'nullable | string | min:3 | max:100',
//            'lastName' => 'nullable | string | min:3 | max:100',
            'c_f' => 'nullable | string | min:16 | max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
            'phone' => 'nullable | string | min:10|regex: /[0-9]/',
            'mobile_phone' => 'nullable | string | min:10',
            'email' => 'nullable | email',
            'role' => 'required | string',
        ],
        [
            // company_name
            'company_name.required'=> 'Inserisci il nome dell\'impresa prima di procedere',
            'company_name.min'=> 'Il nome è troppo corto',
            'company_name.max'=> 'Il nome è troppo lungo',
            //name
//            'name.required'=> 'Inserisci un nome prima di procedere',
//            'name.required'=> 'Inserisci un nome prima di procedere',
//            'name.min'=> 'Il nome è troppo corto',
//            'name.max'=> 'Il nome è troppo lungo',
            //lastname
//            'lastname.required'=> 'Inserisci un cognome prima di procedere',
//            'lastname.required'=> 'Inserisci un cognome prima di procedere',
//            'lastname.min'=> 'Il cognome è troppo corto',
//            'lastname.max'=> 'Il cognome è troppo lungo',
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

        // phone number validation
        if($validated['phone'] != null){
            $validated['phone'] = str_replace(' ', '',$validated['phone']);
            preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $validated['phone'],  $matches );
            $validated['phone'] = $matches[1] . ' ' .$matches[2] . ' ' . $matches[3];
        }


        if($validated['mobile_phone'] != null){
            $validated['mobile_phone'] = str_replace(' ', '',$validated['mobile_phone']);
            preg_match( '/^(\d{3})(\d{3})(\d{4})$/', $validated['mobile_phone'],  $matches );
             $mobile_phone = $matches[1] . ' ' .$matches[2] . ' ' . $matches[3];
             $validated['mobile_phone'] = $mobile_phone;
        }

        $applicant->update($validated);

        return redirect()->route('practice.edit', $applicant);
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
