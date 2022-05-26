<?php

	namespace App\Http\Controllers;

	use App\{User, UserData};
	use Illuminate\Http\Request;
	use Spatie\Permission\Models\Role;
	use Illuminate\Support\Facades\Log;
	use App\Notifications\CredentialEmailNotification;

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
			return view('pages.users.index', compact('user', 'users'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return \Illuminate\Http\Response
		 */
		public function create()
		{
			$business = User::role('business')->get();
			return view('pages.users.create', compact('business'));
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

			$password = $validated['password'];
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

			if($request->role === 'technical_asseverator' || $request->role === 'fiscal_asseverator' || $request->role === 'consultant') {
				$user->business()->sync($request->business);
			}

			Log::info($user);
			$user->notify(new CredentialEmailNotification($user, $password));

			return redirect()->route('users.index')->with('message', "Nuovo utente inserito!");

		}

		/**
		 * Display the specified resource.
		 *
		 * @param  \App\User  $user
		 * @return \Illuminate\Http\Response
		 */
		public function show(User $user)
		{
			return view('pages.users.show', compact('user'));
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param  \App\User  $user
		 * @return \Illuminate\Http\Response
		 */
		public function edit(User $user)
		{
			$business = User::role('business')->get()->except($user->id);
			$associated = $user->business->pluck('id');
			return view('pages.users.edit', compact('user', 'business', 'associated'));
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
				'password' => 'sometimes | nullable | string | min:8 | confirmed'
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

			if($request->role === 'technical_asseverator' || $request->role === 'fiscal_asseverator' || $request->role === 'consultant') {
				$user->business()->sync($request->business);
			} else {
				$user->business()->detach();
			}

			return redirect()->route('users.index')->with('message', "Utente aggiornato con successo!");
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
			return redirect()->back()->with('message', "Utente " . $tmp_name . " è stato eliminato!");
		}
	}
