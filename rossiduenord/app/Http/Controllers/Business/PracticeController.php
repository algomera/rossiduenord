<?php

namespace App\Http\Controllers\Business;

use App\Practice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $practices = DB::table('practices')
            ->join('applicants', 'practices.applicant_id', '=', 'applicants.id')
            ->select('practices.*', 'applicants.*')
            ->get();
        //dd($practices);
        return view('business/practice.index', compact('practices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.practice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'applicant_id' => ' integer | exists:applicants,id',
            'import' => 'nullable | numeric',
            'practical_phase' => 'nullable | string',
            'real_estate_type' => 'nullable | string',
            'month' => 'nullable | string',
            'year' => 'nullable | numeric',
            'policy_name' => 'nullable | string',
            'address' => 'nullable | string',
            'civic' => 'nullable | numeric',
            'common' => 'nullable | string',
            'province' => 'nullable | string | min:2 | max:2',
            'region' => 'nullable | string',
            'cap' => 'nullable | string | min:5 | max:5',
            'work_start' => 'nullable | string',
            'c_m' => 'nullable | numeric',
            'assev_tecnica' => 'nullable | numeric',
            'nominative' => 'nullable | string',
            'lastName' => 'nullable | string | min:3 | max:50',
            'name' => 'nullable | string | min:3 | max:50',
            'policy' => 'nullable | boolean',
            'request_policy' => 'nullable | string',
            'referent_email' => 'nullable | email',
            'description' => 'nullable | string',
            'bonus' => 'nullable | string',
            'note' => 'nullable | string',
            'practice_ok' => 'nullable | string',
        ]);

        

        //$applicant = $validated['applicant_id'];
        //dd($validated);
        //dd($validated);
        $validated['applicant_id'] = '1';
        Practice::create($validated);
        return redirect()->route('business.practice.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice)
    {
        return view('business.practice.edit', compact('practice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Practice $practice)
    {
        $validated = $request->validate([
            'applicant_id' => ' integer | exists:applicants,id',
            'import' => 'nullable | numeric',
            'practical_phase' => 'nullable | string',
            'real_estate_type' => 'nullable | string',
            'month' => 'nullable | string',
            'year' => 'nullable | numeric',
            'policy_name' => 'nullable | string',
            'address' => 'nullable | string',
            'civic' => 'nullable | numeric',
            'common' => 'nullable | string',
            'province' => 'nullable | string | min:2 | max:2',
            'region' => 'nullable | string',
            'cap' => 'nullable | string | min:5 | max:5',
            'work_start' => 'nullable | string',
            'c_m' => 'nullable | numeric',
            'assev_tecnica' => 'nullable | numeric',
            'nominative' => 'nullable | string',
            'lastName' => 'nullable | string | min:3 | max:50',
            'name' => 'nullable | string | min:3 | max:50',
            'policy' => 'nullable | string',
            'request_policy' => 'nullable | string',
            'referent_email' => 'nullable | email',
            'description' => 'nullable | string',
            'bonus' => 'nullable | string',
            'note' => 'nullable | string',
            'practice_ok' => 'nullable | string',
        ]);

        // dd($practice); 
        $practice->update($validated);
        $practices = Practice::all();
        return view('business.practice.index', compact('practices')); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $practice = Practice::find($id);
        $practice->delete();
        return redirect()->back()->with('message', "La pratica: $practice->id e stata eliminata!");

    }
}
