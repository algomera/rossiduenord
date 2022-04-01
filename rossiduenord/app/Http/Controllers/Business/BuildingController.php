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
            'intervention_name' => 'required | string |min:2',
            'company_role' => 'required | string',
            'intervention_tipology' => 'required | string',
            'build_address' => 'required | string |min:5| max:150',
            'build_civic_number' => 'required | integer',
            'common' => 'required | string |min:2 |max:100',
            'province' => 'required | string |min:2|max:2',
            'region' => 'required | string',
            'cap' => 'required |integer',
            'fiscal_code' => 'required | string |min:16|max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
            'iban' => 'required | string |min:27 |max:27|regex:/^([A-Z]{2}[ \-]?[0-9]{2})(?=(?:[ \-]?[A-Z0-9]){9,30}$)((?:[ \-]?[A-Z0-9]{3,5}){2,7})([ \-]?[A-Z0-9]{1,3})?$/',
            'build_type' => 'required | string',
            'zone' => 'required | string',
            'section' => 'required | integer |min:1',
            'foil' => 'required | integer |min:1',
            'particle' => 'required | integer |min:1',
            'subaltern' => 'required | string |min:2',
            'unit_builidg_number' => 'required | integer |min:1',
            'pertinence_number' => 'required | integer |min:1',
            'resolution_stairs' => 'required | integer |min:1',
            'note' => 'required | string',
            'cultural_constraints' => 'required | string',
            'denied_intervents' => 'required | string',
            'mountain_common' => 'required | string',
            'infringment_common' => 'required | string',
            'sismic_events_zone' => 'required | string',
            'isUnderRenovation' => 'required | string',
            'nonMetan_area' => 'required | string',
            'building_authorization' => 'required | string',
            'license_number' => 'required | integer |min:3',
            'license_date' => 'required | string |min:3',
            'construction_date' => 'required | integer',
            'administrator_fullname' => 'required | string |min:5 |max:150',
            'administrator_surname' => 'required | string |min:3 |max:75',
            'administrator_name' => 'required | string |min:3 |max:75',
            'administrator_fiscalcode' => 'required | string |min:16 |max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
            'administrator_address' => 'required | string |min:5 |max:150',
            'administrator_city' => 'required | string |min:3 |max:50',
            'administrator_province' => 'required | string |min:2 |max:2',
            'administrator_cap' => 'required | integer',
            'administrator_telephone' => 'required | integer',
            'administrator_cellphone' => 'required | integer',
            'administrator_email' => 'required | string |min:3 |max:50',
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
