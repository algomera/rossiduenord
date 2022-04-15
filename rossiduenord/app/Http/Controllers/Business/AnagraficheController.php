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
        return view('business.anagrafiche.create');
    }

    public function store(Request $request) {
        $validated = [];

        auth()->user()->anagrafiche()->create($request->all());

        return redirect()->route('business.anagrafiche.index');
    }

    public function destroy(Anagrafica $anagrafica) {
        $anagrafica->delete();

        return redirect()->back();
    }
}
