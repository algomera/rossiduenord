<?php

namespace App\Http\Controllers\Business;

use App\{Practice, Subject, Applicant, Building, Bonus};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.building.create');
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
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(building $building)
    {
        $practice = $building->practice;
        $applicant = $practice->applicant;
        $subject = $practice->subject;
        $condomini = $practice->condomini;
        return view('business.building.edit', compact('condomini', 'practice', 'subject', 'applicant', 'building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, building $building)
    {
        $validated = $request->validate([
            'practice_id' => 'nullable | integer',
            'intervention_name' => 'nullable | string |min:2',
            'company_role' => 'nullable | string',
            'intervention_tipology' => 'nullable | string',
            'build_address' => 'nullable | string |min:5| max:150',
            'build_civic_number' => 'nullable | integer',
            'common' => 'nullable | string |min:2 |max:100',
            'province' => 'nullable | string |min:2|max:2',
            'region' => 'nullable | string',
            'cap' => 'nullable |integer',
            'fiscal_code' => 'nullable | string |min:16|max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
            'iban' => 'nullable | string |min:27 |max:27|regex:/^([A-Z]{2}[ \-]?[0-9]{2})(?=(?:[ \-]?[A-Z0-9]){9,30}$)((?:[ \-]?[A-Z0-9]{3,5}){2,7})([ \-]?[A-Z0-9]{1,3})?$/',
            'build_type' => 'nullable | string',
            'zone' => 'nullable | string',
            'section' => 'nullable | integer |min:1',
            'foil' => 'nullable | integer |min:1',
            'particle' => 'nullable | integer |min:1',
            'subaltern' => 'nullable | string |min:2',
            'unit_builidg_number' => 'nullable | integer |min:1',
            'pertinence_number' => 'nullable | integer |min:1',
            'resolution_stairs' => 'nullable | integer |min:1',
            'note' => 'nullable | string',
            'cultural_constraints' => 'nullable | string',
            'denied_intervents' => 'nullable | string',
            'mountain_common' => 'nullable | string',
            'infringment_common' => 'nullable | string',
            'sismic_events_zone' => 'nullable | string',
            'isUnderRenovation' => 'nullable | string',
            'nonMetan_area' => 'nullable | string',
            'building_authorization' => 'nullable | string',
            'license_number' => 'nullable | integer |min:3',
            'license_date' => 'nullable | string |min:3',
            'construction_date' => 'nullable | integer',
            'administrator_fullname' => 'nullable | string |min:5 |max:150',
            'administrator_surname' => 'nullable | string |min:3 |max:75',
            'administrator_name' => 'nullable | string |min:3 |max:75',
            'administrator_fiscalcode' => 'nullable | string |min:16 |max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
            'administrator_address' => 'nullable | string |min:5 |max:150',
            'administrator_city' => 'nullable | string |min:3 |max:50',
            'administrator_province' => 'nullable | string |min:2 |max:2',
            'administrator_cap' => 'nullable | integer',
            'administrator_telephone' => 'nullable | integer',
            'administrator_cellphone' => 'nullable | integer',
            'administrator_email' => 'nullable | string |min:3 |max:50',
        ]);

        $building->update($validated);
        $practice = $building->practice;

        if($request->get('condomini')) {
            $building->practice->condomini()->createMany($request->get('condomini'));
        }

        return redirect()->route('business.superbonus.index', [$practice]);
//        return view('business.superbonus.index', compact('building','practice','applicant','subject'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(building $building)
    {
        //
    }
}
