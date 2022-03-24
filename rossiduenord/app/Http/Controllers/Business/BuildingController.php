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
        //
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
            'intervention_name' => 'nullable | string',
            'company_role' => 'nullable | string',
            'intervention_tipology' => 'nullable | string',
            'build_address' => 'nullable | string',
            'build_civic_number' => 'nullable | string',
            'common' => 'nullable | string',
            'province' => 'nullable | string',
            'region' => 'nullable | string',
            'cap' => 'nullable | string',
            'fiscal_code' => 'nullable | string',
            'iban' => 'nullable | string',
            'build_type' => 'nullable | string',
            'zone' => 'nullable | string',
            'section' => 'nullable | string',
            'foil' => 'nullable | string',
            'particle' => 'nullable | string',
            'subaltern' => 'nullable | string',
            'unit_builidg_number' => 'nullable | string',
            'pertinence_number' => 'nullable | string',
            'resolution_stairs' => 'nullable | string',
            'note' => 'nullable | string',
            'cultural_constraints' => 'nullable | string',
            'denied_intervents' => 'nullable | string',
            'mountain_common' => 'nullable | string',
            'infringment_common' => 'nullable | string',
            'sismic_events_zone' => 'nullable | string',
            'isUnderRenovation' => 'nullable | string',
            'nonMetan_area' => 'nullable | string',
            'building_authorization' => 'nullable | string',
            'license_number' => 'nullable | string',
            'license_date' => 'nullable | string',
            'construction_date' => 'nullable | string',
            'administrator_fullname' => 'nullable | string',
            'administrator_surname' => 'nullable | string',
            'administrator_name' => 'nullable | string',
            'administrator_fiscalcode' => 'nullable | string',
            'administrator_address' => 'nullable | string',
            'administrator_city' => 'nullable | string',
            'administrator_province' => 'nullable | string',
            'administrator_cap' => 'nullable | string',
            'administrator_telephone' => 'nullable | string',
            'administrator_cellphone' => 'nullable | string',
            'administrator_email' => 'nullable | string',
        ]);

        $building->update($validated);
        //dd($building);
        //$id = ['practice_id' => $building->id];
        //$bonus = Bonus::create($id);
        //dd($bonus);
        //dd($building);
        return redirect()->route('business.superbonus.index');

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
