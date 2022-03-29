<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Business;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Arr;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.dashboard');
            }
            if (auth()->user()->role == 'financial') {
                return redirect()->route('financial.dashboard');
            }
            if (auth()->user()->role == 'bank') {
                return redirect()->route('bank.dashboard');
            }
            if (auth()->user()->role == 'business') {
                return redirect()->route('business.dashboard');
            }
            if (auth()->user()->role == 'collaborator') {
                return redirect()->route('collaborator.dashboard');
            }
            if (auth()->user()->role == 'consultant') {
                return redirect()->route('consultant.dashboard');
            }
            if (auth()->user()->role == 'asseverator') {
                return redirect()->route('asseverator.dashboard');
            }
            if (auth()->user()->role == 'manager') {
                return redirect()->route('manager.dashboard');
            }
            if (auth()->user()->role == 'provider') {
                return redirect()->route('provider.dashboard');
            }
            if (auth()->user()->role == 'lv1_agent' || 'lv2_agent') {
                return redirect()->route('agent.dashboard');
            }
            if (auth()->user()->role == 'condominium') {
                return redirect()->route('condominium.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput(['email']);

//        $input = $request->all();
//        $this->validate($request, [
//            'email' => 'required|email',
//            'password' => 'required',
//        ]);
//
//        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
//            $user = Auth::User()->getAttributes();
//            $type = Arr::exists($user, 'type');
//            $p_iva = Arr::exists($user, 'p_iva');
//            $c_f = Arr::exists($user, 'c_f');
//            $legal_form = Arr::exists($user, 'legal_form');
//            $rea = Arr::exists($user, 'rea');
//            $c_ateco = Arr::exists($user, 'c_ateco');
//            $reg_date = Arr::exists($user, 'reg_date');
//
//            if (auth()->user()->role == 'admin') {
//                return redirect()->route('admin.dashboard');
//            }
//            if (auth()->user()->role == 'financial') {
//                return redirect()->route('financial.dashboard');
//            }
//            if (auth()->user()->role == 'bank') {
//                return redirect()->route('bank.dashboard');
//            }
//            if (auth()->user()->role == 'business') {
//                if($type || $p_iva || $c_f || $legal_form || $rea || $c_ateco || $reg_date == false){
//                    return redirect()->route('business.edit.data');
//                }
//                return redirect()->route('business.dashboard');
//            }
//            if (auth()->user()->role == 'collaborator') {
//                return redirect()->route('collaborator.dashboard');
//            }
//            if (auth()->user()->role == 'consultant') {
//                return redirect()->route('consultant.dashboard');
//            }
//            if (auth()->user()->role == 'asseverator') {
//                return redirect()->route('asseverator.dashboard');
//            }
//            if (auth()->user()->role == 'manager') {
//                return redirect()->route('manager.dashboard');
//            }
//            if (auth()->user()->role == 'provider') {
//                return redirect()->route('provider.dashboard');
//            }
//            if (auth()->user()->role == 'lv1_agent' || 'lv2_agent') {
//                return redirect()->route('agent.dashboard');
//            }
//            if (auth()->user()->role == 'condominium') {
//                return redirect()->route('condominium.dashboard');
//            }
//        } else {
//            return redirect()->route('login')
//            ->with('error', 'Indirizzo Email e password Errati!');
//        }
    }
}
