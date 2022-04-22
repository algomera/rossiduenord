<?php

namespace App\Http\Controllers\Business;

use Spatie\Permission\Models\Role;
use App\{User, Collaborator, UserData};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $users = User::whereHas('user_data', function($q) {
            $q->where('created_by', auth()->user()->user_data->name);
        })->get();
//        dd($users);
//        $users = User::where('created_by', auth()->user()->user_data->name)->orderBy('created_at', 'DESC')->paginate(10);
        return view('business.users.index', compact('user', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.users.create');
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
            'role' => 'required | string',
            'name' => 'required | string | min:3 | max:100',
            'email' => 'required | string | email | max:100 | unique:users',
            'password' => 'required | string | min:8 | confirmed'
        ]);

        // Creazione Utente
        $user = User::create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password'])
        ]);

        // Crazione UserData
        UserData::create([
            'user_id' => $user->id,
            'created_by' => auth()->user()->user_data->name,
            'name' => $validated['name'],
        ]);

        $role = Role::findByName($validated['role']);
        $user->assignRole($role);

        return redirect()->route('business.users.index')->with('message', "Nuovo utente inserito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('business.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user, Collaborator $collaborator)
    {
        return view('business.users.edit', compact('user', 'collaborator'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Collaborator $collaborator)
    {
        $validated = $request->validate([
            'role' => 'required | string',
            'name' => 'required | string | min:3 | max:100',
            'email' => 'required | string | email | max:100',
            'password' => 'required |string | min:8 | confirmed'
        ]);

        $password = Hash::make($request->password);
        $validated['password'] = $password;
        $user_id = Auth::user()->id;
        $validated['user_id'] = $user_id;

        $collaborator->update($validated);
        $user->update($validated);

        dd($collaborator, $user, $validated);
        return redirect()->route('business.users.index')->with('message', "utente modificato!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back()->with('message', "Utente $user->name e stato eliminato!");
    }
}
