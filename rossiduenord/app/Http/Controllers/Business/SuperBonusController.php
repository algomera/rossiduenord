<?php

namespace App\Http\Controllers\Business;
use App\{Practice, Subject, Applicant, Building, Data_project};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuperBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Applicant $applicant, Practice $practice, Subject $subject, Building $building, Data_project $data_project)
    {

        return view('business.superbonus.index', compact('building','practice', 'applicant','subject'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data_project = Data_project::findOrFail($id);

        $practice = $data_project->practice;
        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        return view('business.superbonus.data_project', compact('applicant', 'practice', 'building', 'subject', 'data_project'));
    }

        /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function update_data_project(Request $request, $id)
    {
        $data_project = Data_project::find($id);
        // Form Validation
        $validated = $request->validate([
            'practice_id' => 'nullable',
            'technical_report' => 'nullable',
            'filed_common' => 'nullable',
            'filed_province' => 'nullable',
            'filed_date' => 'nullable',
            'filed_protocol' => 'nullable',
            'technical_report_exclusion' => 'nullable',
            'work_start' => 'nullable',
            'end_of_works' => 'nullable',
            'condominium_building' => 'nullable',
            'building_unit' => 'nullable',
            'relevance' => 'nullable',
            'centralized_system' => 'nullable',
            'single_family_property' => 'nullable',
            'multi_family_property' => 'nullable',
            'gross_surface_area' => 'nullable',
            'np' => 'nullable',
            'np_validated' => 'nullable',
            'np_not_validated' => 'nullable',
        ]);

        // Update data
        $data_project->update($validated);

        // Redirect to next tab
        $practice = $data_project->practice;
        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        return view('business.superbonus.driving_intervention.vertical_wall', compact('applicant', 'practice', 'building', 'subject', 'data_project'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practice $practice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practice $practice)
    {
        //
    }
}
