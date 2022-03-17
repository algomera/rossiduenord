<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\Applicant;
use App\Practice;
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
            'applicant' => 'required | string',
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
        
        $aplicat = Applicant::create($validated);
        dd($aplicat);
        return redirect()->route('business.practice.create');
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
        //
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
