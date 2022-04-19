<?php

namespace App\Http\Controllers\Business;

use App\{Anagrafica, Practice, Subject, Applicant, Building, Bonus, SubjectRole};
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('business.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Practice $practice, Subject $subject, Applicant $applicant, Building $building)
    {
        $this->authorize('edit-subject', [$subject, $applicant]);

        $practice = $subject->practice;
        $applicant = $practice->applicant;
        $building = $practice->building;

        $consultant = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 3);
        })->get();
        $lending_bank = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 4);
        })->get();
        $general_contractor = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 5);
        })->get();
        $construction_company = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 6);
        })->get();
        $hydrothermal_sanitary_company = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 7);
        })->get();
        $photovoltaic_company = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 8);
        })->get();
        $technician_APE_Ante = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 9);
        })->get();
        $structural_engineer = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 10);
        })->get();
        $work_director = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 11);
        })->get();
        $technical_assev = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 12);
        })->get();
        $fiscal_assev = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 13);
        })->get();
        $phiscal_transferee = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 15);
        })->get();
        $insurer = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 16);
        })->get();
        $area_manager = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 17);
        })->get();
        $technician_energy_efficient = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 18);
        })->get();
        $technician_APE_Post = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 19);
        })->get();
        $metric_calc_technician = Anagrafica::whereHas('roles', function ($q) {
            $q->where('subject_role_id', 20);
        })->get();

        return view('business.subject.edit', compact(
            'consultant',
            'lending_bank',
            'general_contractor',
            'construction_company',
            'hydrothermal_sanitary_company',
            'photovoltaic_company',
            'technician_APE_Ante',
            'structural_engineer',
            'work_director',
            'technical_assev',
            'fiscal_assev',
            'phiscal_transferee',
            'insurer',
            'area_manager',
            'technician_energy_efficient',
            'technician_APE_Post',
            'metric_calc_technician',
            'practice',
            'subject',
            'applicant',
            'building'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        $signaler = auth()->user()->anagrafiche()->where('company_name', $request->consultant)->first();
        $validated = $request->validate([
            'practice_id' => 'nullable | numeric',
            'general_contractor' => 'nullable | string |min:3|max:100',
            'construction_company' => 'nullable | string |min:3|max:100',
            'hydrothermal_sanitary_company' => 'nullable | string |min:3|max:100',
            'photovoltaic_company' => 'nullable | string |min:3|max:100',
            'technician_APE_Ante' => 'nullable | string |min:3|max:100',
            'technician_energy_efficient' => 'nullable | string |min:3|max:100',
            'technician_APE_Post' => 'nullable | string |min:3|max:100',
            'structural_engineer' => 'nullable | string |min:3|max:100',
            'metric_calc_technician' => 'nullable | string |min:3|max:100',
            'work_director' => 'nullable | string |min:3|max:100',
            'technical_assev' => 'nullable | string |min:3|max:100',
            'fiscal_assev' => 'nullable | string |min:3|max:100',
            'phiscal_transferee' => 'nullable | string |min:3|max:100',
            'lending_bank' => 'nullable | string |min:3|max:100',
            'insurer' => 'nullable | string |min:3|max:100',
            'consultant' => 'nullable | string |min:3|max:100',
            'signaler' => 'nullable | string |min:3|max:100',
            'area_manager' => 'nullable | string |min:3|max:100',
            'project_manager' => 'nullable | string |min:3|max:100',
            'responsible_technician' => 'nullable | string |min:3|max:100',
        ],
        [
            //general contractor
            'general_contractor.required'=> 'Inserisci il General Contractor prima di procedere',
            'general_contractor.min'=> 'Il nome del General Contractor è troppo corto',
            'general_contractor.max'=> 'Il nome del General Contractor è troppo lungo',
            'construction_company.required' => 'Inserisci il nome dell\'azienda  edile prima di procedere',
            'construction_company.min' => 'Il nome dell\'azienda edile è troppo corto',
            'construction_company.max' => 'Il nome dell\'azienda edile è troppo lungo',
            'hydrothermal_sanitary_company.required' => 'Inserisci il nome dell\'azienda idrotermosanitaria',
            'hydrothermal_sanitary_company.min' => 'Il nome dell\'azienda idrotermosanitaria è troppo corto',
            'hydrothermal_sanitary_company.max' => 'Il nome dell\'azienda idrotermosanitaria è troppo lungo',
            'photovoltaic_company.required' => 'Inserisi il nome dell\'azienda fotovoltaica',
            'photovoltaic_company.min' => ' Il nome dell\'azienda fotovoltaica è troppo corto',
            'photovoltaic_company.max' => ' Il nome dell\'azienda fotovoltaica è troppo lungo',
            'technician_APE_Ante.required' => 'Inserisci il nome de tencico APE ante',
            'technician_APE_Ante.min' => 'Il nome de tencico APE ante è troppo corto',
            'technician_APE_Ante.max' => 'Il nome de tencico APE ante è troppo lungo',
            'technician_energy_efficient.required' => 'Inserisci il nome del tecnico prima di procedere',
            'technician_APE_Post.required' => 'Inserisci il nome de tencico APE Post',
            'technician_APE_Post.min' => 'Il nome de tencico APE Post è troppo corto',
            'technician_APE_Post.max' => 'Il nome de tencico APE Post è troppo lungo',
            'structural_engineer.required' => 'Inserisci il nome dello strutturista prima di procedere',
            'structural_engineer.min' => 'Il nome dello strutturista è troppo corto',
            'structural_engineer.min' => 'Il nome dello strutturista è troppo lungo',
            'metric_calc_technician.required' => 'Inserisci il nome del tecnico prima di proseguire',
            'metric_calc_technician.min' => 'Il nome del tecnico è troppo corto',
            'metric_calc_technician.max' => 'Il nome del tecnico è troppo lungo',
            'work_director.required' => 'Inserisci il nome del direttore dei lavori prima di procedere',
            'work_director.min' => 'Il nome del direttore dei lavori è troppo corto',
            'work_director.max' => 'Il nome del direttore dei lavori è troppo lungo',
            'technical_assev.required' => 'Inserisci il nome dell\'assevertore tecnico prima di procedere',
            'technical_assev.min' => 'Il nome dell\'asseveratore tecnico è troppo corto',
            'technical_assev.max' => 'Il nome dell\'asseveratore tecnico è troppo lungo',
            'fiscal_assev.required' => 'Inserisci il nome dell\'assevertore fiscale prima di procedere',
            'fiscal_assev.min' => 'Il nome dell\'asseveratore fiscale è troppo corto',
            'fiscal_assev.max' => 'Il nome dell\'asseveratore fiscale è troppo lungo',
            'phiscal_transferee.required' => 'Inserisci il nome del cessionario prima di proseguire',
            'phiscal_transferee.min' => 'Il nome del cessionario è troppp corto',
            'phiscal_transferee.max' => 'Il nome del cessionario è troppp lungo',
            'lending_bank.required' => 'Inserisci il nom della banca finanizatrice prima di proseguire',
            'lending_bank.min' => 'Il nom della banca finanizatrice è troppo corto',
            'lending_bank.max' => 'Il nom della banca finanizatrice è troppo lungo',
            'insurer.required' => 'Inserisci il nome dell\'assicuratore prima di proseguire',
            'insurer.min' => 'Il nome dell\'assicuratore è troppo corto',
            'insurer.max' => 'Il nome dell\'assicuratore è troppo lungo',
            'consultant.required' => 'Inserisci il nome del consulente prima di proseguire',
            'consultant.min' => 'Il nome del consulente è troppo corto',
            'consultant.max' => 'Il nome del consulente è troppo lungo',
            'signaler' => 'Inserisci il nome del segnalatore prima di proseguire',
            'signaler.min' => 'Il nome del segnalatore è troppo corto',
            'signaler.max' => 'Il nome del segnalatore è troppo lungo',
            'area_manager.required' => 'Inserisci il nome dell\'area manager prima di proseguire',
            'area_manager.min' => 'Il nome dell\'area manager è troppo corto',
            'area_manager.max' => 'Il nome dell\'area manager è troppo lungo',
            'project_manager.required' => 'Inserisci il nome del Project Manager prima di proseguire',
            'project_manager.min' => 'Il nome del project manager è troppo corto',
            'project_manager.max' => 'Il nome del project manager è troppo lungo',
            'responsible_technician.reuired' => 'Inserisci il nome del rersponsabile tencico prima di proseguire',
            'responsible_technician.min' => 'Il nome del responsabile tecnico è troppo corto',
            'responsible_technician' => 'Il nome del responsabile tecnico è troppo lungo',
        ]
    );

        if($signaler->consultant_type) {
            $validated['signaler'] = $signaler->consultant_type;
        } else {
            $validated['signaler'] = null;
        }

        $subject->update($validated);

        return redirect()->route('business.building.edit', $subject);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
