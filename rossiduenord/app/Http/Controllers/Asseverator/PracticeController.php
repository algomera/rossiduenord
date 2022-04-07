<?php

namespace App\Http\Controllers\Asseverator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Practice;

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
        //dd($practices->created_at);
        //$createdAt = Carbon::parse($practices[0]->created_at->format('d/m/Y'));
        //dd($createdAt);
        //$practice_data = Carbon::today()->format('d/m/Y');
        return view('asseverator/practice.index', compact('practices'));
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
