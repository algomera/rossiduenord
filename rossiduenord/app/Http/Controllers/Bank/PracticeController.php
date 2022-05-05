<?php

namespace App\Http\Controllers\Bank;

use App\Http\Controllers\Controller;
use App\Practice;
use App\Applicant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $businesses = User::whereHas('user_data', function ($query) {
            return $query->where('parent', auth()->user()->id);
        })->get()->pluck('id');

        $q = Practice::query()->whereIn('user_id',  $businesses);

        if($request->get('practical_month') !== null) {
            $q->where('month', '=', $request->get('practical_month'));
        }

        if($request->get('practical_phase') !== null) {
            $q->where('practical_phase', '=', $request->get('practical_phase'));
        }

        if($request->get('practical_description') !== null) {
            $q->where('description', 'LIKE', '%' . $request->get('practical_description') . '%');
        }

        if($request->get('practical_number') !== null) {
            $q->where('id', '=', $request->get('practical_number'));
        }

        $practices = $q->get();
        //importo sal finale
        $tot_sal = $practices->sum('import_sal');
        $expected_sal = $practices->sum('import');
        return view('bank/practice.index', compact('practices'));
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
