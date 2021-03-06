<?php

namespace App\Http\Controllers;
use App\Business;
use App\UserData;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function businessHome()
    {
        return view('pages.dashboard');
    }

    public function editbusinessData()
    {
        return view('pages.data');
    }

    public function updatebusinessData(Request $request)
    {
        $business = UserData::where('user_id', auth()->user()->id)->first();
        $validated = $request->validate([
            'type' => 'nullable | string',
            'p_iva' => 'nullable | string | min:11 | max:11',
            'c_f' => 'nullable | string | min:16 | max:16',
            'legal_form' => 'nullable | string ',
            'rea' => 'nullable | string ',
            'c_ateco' => 'nullable | string ',
            'reg_date' => 'nullable | string ',
        ]);
        $validated['c_f'] = strtoupper($validated['c_f']);
        $business->update($validated);
        return redirect()->route('dashboard')->with('message', "Profilo completato!");

    }
}
