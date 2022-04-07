<?php

namespace App\Http\Controllers\Business;
use App\Business;
use App\Http\Controllers\Controller;
use App\User;
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

    public function editbusinessData(Business $business)
    {
        $email = auth()->user()->email;
        $business = DB::table('businesses')->where('email', '=', $email)->first();
        return view('business.data', compact('business'));
    }

    public function updatebusinessData(Request $request, Business $business)
    {
        $business = Business::where('email', auth()->user()->email)->first();
        $validated = $request->validate([
            'type' => 'nullable | string',
            'p_iva' => 'nullable | string | min:11 | max:11',
            'c_f' => 'nullable | string | min:16 | max:16',
            'legal_form' => 'nullable | string ',
            'rea' => 'nullable | string ',
            'c_ateco' => 'nullable | string ',
            'reg_date' => 'nullable | string ',
        ]);
        $business->update($validated);
        return redirect()->route('business.dashboard')->with('message', "Profilo completato!");

    }
}
