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
        $validated = $request->validate([
            'subject_type' => 'required',
            'consultant_type' => 'nullable',
            'company_name' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'nullable|string',
            'zip' => 'nullable|string|min:5|regex: /[0-9]/',
            'city' => 'required|string',
            'province' => 'nullable|string|min:2|max:2|regex: /[A-Z]/',
            'iban' => 'nullable | string |min:27 |max:27|regex:/^([A-Z]{2}[ \-]?[0-9]{2})(?=(?:[ \-]?[A-Z0-9]){9,30}$)((?:[ \-]?[A-Z0-9]{3,5}){2,7})([ \-]?[A-Z0-9]{1,3})?$/',
            'vat' => 'nullable|string',
            'fiscal_code' => 'nullable | string |min:16|max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
            'phone' => 'nullable|string|min:10|regex: /[0-9]/',
            'fax' => 'nullable|string|min:10|regex: /[0-9]/',
            'email' => 'nullable|string|email|max:100|unique:anagrafiche',
            'email_pec' => 'nullable|string|email|max:100|unique:anagrafiche',
            'date_of_birth' => 'nullable|date|date_format:Y-m-d|before:today',
            'common_of_birth' => 'nullable|string',
            'province_of_birth' => 'nullable|string|min:2|max:2|regex: /[A-Z]/',
            'order_or_college' => 'nullable|string',
            'order_or_college_province' => 'nullable|string|min:2|max:2|regex: /[A-Z]/',
            'order_or_college_number' => 'nullable|string|regex: /[0-9]/',
        ]);

        $anagrafica = auth()->user()->anagrafiche()->create($validated);

        if($request->has('roles')) {
            $anagrafica->roles()->attach($request->get('roles'));
        }

        return redirect()->route('business.anagrafiche.index')->with('message', 'Anagrafica creata con successo');;
    }

    public function edit(Anagrafica $anagrafica) {
        $subject_roles = SubjectRole::all()->except(21);
        return view('business.anagrafiche.edit', compact('subject_roles', 'anagrafica'));
    }

    public function update(Anagrafica $anagrafica, Request $request) {
        $validated = $request->validate([
            'subject_type' => 'required',
            'consultant_type' => 'nullable',
            'company_name' => 'required|string',
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'address' => 'nullable|string',
            'zip' => 'nullable|string|min:5|regex: /[0-9]/',
            'city' => 'required|string',
            'province' => 'nullable|string|min:2|max:2|regex: /[A-Z]/',
            'iban' => 'nullable | string |min:27 |max:27|regex:/^([A-Z]{2}[ \-]?[0-9]{2})(?=(?:[ \-]?[A-Z0-9]){9,30}$)((?:[ \-]?[A-Z0-9]{3,5}){2,7})([ \-]?[A-Z0-9]{1,3})?$/',
            'vat' => 'nullable|string',
            'fiscal_code' => 'nullable | string |min:16|max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
            'phone' => 'nullable|string|min:10|regex: /[0-9]/',
            'fax' => 'nullable|string|min:10|regex: /[0-9]/',
            'email' => 'nullable|string|email|max:100|unique:anagrafiche',
            'email_pec' => 'nullable|string|email|max:100|unique:anagrafiche',
            'date_of_birth' => 'nullable|date|date_format:Y-m-d|before:today',
            'common_of_birth' => 'nullable|string',
            'province_of_birth' => 'nullable|string|min:2|max:2|regex: /[A-Z]/',
            'order_or_college' => 'nullable|string',
            'order_or_college_province' => 'nullable|string|min:2|max:2|regex: /[A-Z]/',
            'order_or_college_number' => 'nullable|string|regex: /[0-9]/',
        ]);

        $anagrafica->update($validated);

        if($request->has('roles')) {
            $anagrafica->roles()->sync($request->get('roles'));
        }

        return redirect()->route('business.anagrafiche.index')->with('message', 'Anagrafica aggiornata con successo');
    }

    public function loadModal($id) {
        return auth()->user()->anagrafiche()->whereId($id)->first();
    }
}
