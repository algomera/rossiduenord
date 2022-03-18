<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Applicant;
use App\Practice;
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
        $new_practice = Practice::create($practice_data);

        $string = 'string';

        // return redirect()->route('business.practice.index', ['practice'=> $new_practice]);
        return view('business.applicant.edit', compact('applicant'));
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
        //
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
            'c_f' => 'nullable | string | min:16 | max:16 ',
            'phone' => 'nullable | numeric',
            'mobile_phone' => 'nullable | numeric | min:10',
            'email' => 'nullable | email',
            'role' => 'nullable | string',
        ]);

        //$practice = Practice::all()->where('applicant_id', '=', $applicant->id);
    
        $practices = DB::table('practices')
                ->where('applicant_id', '=', $applicant->id)
                ->get();

        $practice = $practices[0];
        //dd($practice);
        $applicant->update($validated);
        return view('business.practice.edit', compact('practice'));

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
