<?php

namespace App\Http\Controllers\Business;

use App\{Practice, Subject, Applicant, Building, Bonus};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice, Subject $subject, Applicant $applicant, Building $building, Bonus $bonus)
    {

        $practice = $subject->practice;
        $applicant = $practice->applicant;
        $building = $practice->building;
        return view('business.subject.edit', compact('practice', 'subject', 'applicant', 'building', 'bonus'));
    }

    public function subject_edit(Practice $practice)
    {
        $building = $practice->building;
        $subject = $practice->subject;
        $applicant = $practice->applicant;

        return view('business.subject.edit', compact('practice','subject','building','applicant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $validated = $request->validate([
            'practice_id' => 'nullable | integer',
            'general_contractor' => 'nullable | string',
            'construction_company' => 'nullable | string',
            'hydrothermal_sanitary_company' => 'nullable | string',
            'photovoltaic_company' => 'nullable | string',
            'technician_APE_Ante' => 'nullable | string',
            'technician_energy_efficient' => 'nullable | string',
            'technician_APE_Post' => 'nullable | string',
            'structural_engineer' => 'nullable | string',
            'metric_calc_technician' => 'nullable | string',
            'work_director' => 'nullable | string',
            'technical_assev' => 'nullable | string',
            'fiscal_assev' => 'nullable | string',
            'phiscal_transferee' => 'nullable | string',
            'lending_bank' => 'nullable | string',
            'insurer' => 'nullable | string',
            'consultant' => 'nullable | string',
            'signaler' => 'nullable | string',
            'area_manager' => 'nullable | string',
            'project_manager' => 'nullable | string',
            'responsible_technician' => 'nullable | string',
        ]);
        
        $subject->update($validated);
        $id = ['practice_id' => $subject->practice_id ];
        // $building = Building::create($id);

        $practice = $subject->practice;
        $applicant = $practice->applicant;
        $building = $practice->building;

        return view('business.building.edit', compact('practice','applicant', 'building', 'subject'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
