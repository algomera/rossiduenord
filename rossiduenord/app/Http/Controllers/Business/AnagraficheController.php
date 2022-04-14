<?php

namespace App\Http\Controllers\Business;

use App\Http\Controllers\Controller;
use App\SubjectRole;

class AnagraficheController extends Controller
{
    public function index() {
        $subject_roles = SubjectRole::all();
        $anagrafiche = auth()->user()->anagrafiche;
        return view('business.anagrafiche.index', compact('subject_roles', 'anagrafiche'));
    }
}
