<?php

namespace App\Http\Controllers\Bank;

use App\{User, UserData};
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
            $q->where('parent', auth()->user()->id);
        })->get();
        return view('bank.users.index', compact('users', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all()->pluck(['name']);
        return view('bank.users.create', compact('roles'));
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
            'parent' => auth()->user()->id,
            'name' => $validated['name'],
        ]);

        $role = Role::findByName($validated['role']);
        $user->assignRole($role);

        return redirect()->route('bank.users.index')->with('message', "Nuovo utente inserito!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('bank.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $roles = Role::all()->pluck(['name']);

        return view('bank.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'role' => 'required | string',
            'name' => 'required | string | min:3 | max:100',
            'email' => 'required | string | email | max:100',
            'password' => 'required |string | min:8 | confirmed'
        ]);

        $user->update([
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $user->getAuthPassword()
        ]);

        $user->user_data()->update([
            'name' => $validated['name']
        ]);

        if($user->getRoleNames()->first() !== $validated['role']) {
            $user->removeRole($user->getRoleNames()->first());
            $user->assignRole($validated['role']);
        }

        return redirect()->route('bank.users.index')->with('message', "utente modificato!");
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
        $tmp_name = $user->name;
        $user->delete();

        return redirect()->back()->with('message', "Utente " . $tmp_name . " e stato eliminato!");
    }
}
