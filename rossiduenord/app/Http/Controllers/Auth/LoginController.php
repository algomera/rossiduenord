<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
        $input = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt(array('email' => $input['email'], 'password' => $input['password']))) {
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
        } else {
            return redirect()->route('login')
            ->with('error', 'Indirizzo Email e password Errati!');
        }
    }
}
