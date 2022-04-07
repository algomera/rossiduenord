<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Financial;
use App\Bank;
use App\Business;
use App\Asseverator;
use App\Collaborator;
use App\Condominium;
use App\Consultant;
use App\Manager;
use App\Provider;
use App\Http\Controllers\Controller;
use App\Lv1_agent;
use App\Lv2_agent;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'role' => ['required', 'string'],
            'created_by' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'created_by' => $data['created_by'],
        ]);

        if($data['role'] == 'admin') {
            $user = Admin::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],

            ]);
        }

        if ($data['role'] == 'financial') {
            $user = Financial::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],
            ]);
        }

        if ($data['role'] == 'bank') {
            $user = Bank::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],
            ]);
        }

        if ($data['role'] == 'business') {
            $user = Business::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],
            ]);
        }

        if ($data['role'] == 'collaborator') {
            $user = Collaborator::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],
            ]);
        }

        if ($data['role'] == 'consultant') {
            $user = Consultant::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],
            ]);
        }

        if ($data['role'] == 'asseverator') {
            $user = Asseverator::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],
            ]);
        }

        if ($data['role'] == 'manager') {
            $user = Manager::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],
            ]);
        }

        if ($data['role'] == 'provider') {
            $user = Provider::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],
            ]);
        }

        if ($data['role'] == 'lv1_agent') {
            $user = Lv1_agent::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],
            ]);
        }

        if ($data['role'] == 'lv2_agent') {
            $user = Lv2_agent::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],
            ]);
        }

        if ($data['role'] == 'condominium') {
            $user = Condominium::create([
                'user_id' => $user->id,
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => $user->password,
                'created_by' => $data['created_by'],
            ]);
        }

        return $user;
    }
}
