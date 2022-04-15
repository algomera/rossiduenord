<?php

namespace App\Http\Controllers\Business;

use App\Anagrafica;
use App\Http\Controllers\Controller;
use App\SubjectRole;
use Illuminate\Http\Request;

class AnagraficheController extends Controller
{
    public function index() {
        $subject_roles = SubjectRole::all()->except(21);
        $anagrafiche = auth()->user()->anagrafiche;
        return view('business.anagrafiche.index', compact('subject_roles', 'anagrafiche'));
    }

    public function create() {
        $subject_roles = SubjectRole::all();
        return view('business.anagrafiche.create', compact('subject_roles'));
    }

    public function store(Request $request) {
        $validated = [];

        $anagrafica = auth()->user()->anagrafiche()->create($request->except('roles'));

        if($request->has('roles')) {
            $anagrafica->roles()->attach($request->get('roles'));
        }

        return redirect()->route('business.anagrafiche.index');
    }

    public function destroy(Anagrafica $anagrafica) {
        $anagrafica->delete();

        return redirect()->back();
    }
}
