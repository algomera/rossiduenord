<?php

namespace App\Http\Controllers\Business;
use App\Business;
use App\Http\Controllers\Controller;
use App\User;
use App\UserData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function businessHome()
    {
        return view('business.dashboard');
    }

    public function editbusinessData()
    {
        return view('business.data');
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
        return redirect()->route('business.dashboard')->with('message', "Profilo completato!");

    }
}
