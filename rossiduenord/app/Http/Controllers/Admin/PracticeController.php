<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Practice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $p = Practice::all();
        
        if($request->get('practical_month') !== null) {
            $p = Practice::where('month', '=', $request->get('practical_month'))->get();
        }

        if($request->get('practical_phase') !== null) {
            $p = Practice::where('practical_phase', '=', $request->get('practical_phase'))->get();
        }

        if($request->get('practical_description') !== null) {
            $p = Practice::where('description', 'LIKE', '%' . $request->get('practical_description') . '%')->get();
        }

        if($request->get('practical_number') !== null) {
            $p = Practice::where('id', '=', $request->get('practical_number'))->get();
        }

        $practices = $p;
        $tot_sal = $practices->sum('import_sal');
        $expected_sal = $practices->sum('import');

        return view('admin.practice.index', compact('practices','tot_sal','expected_sal'));
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Practice  $practice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Practice $practice)
    {
        //
    }
}
