<?php

namespace App\Http\Controllers;

use App\{Applicant, Building, Practice};
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.building.create');
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
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(building $building, Applicant $applicant)
    {
        //$this->authorize('edit-building', [$building, $applicant]);

        $practice = $building->practice;
        $applicant = $practice->applicant;
        $subject = $practice->subject;
        $condomini = $practice->condomini;
        $document = $practice->folder_documents;

        //dd($document);
        return view('pages.building.edit', compact('condomini', 'practice', 'subject', 'applicant', 'building','document'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, building $building)
    {
        //dd($request->all());
        if($request->get('condomini')) {
            $condomini = $request->get('condomini');
            foreach ($condomini as $condomino) {
                $building->practice->condomini()->updateOrCreate(['id' => $condomino['id']], $condomino);
            }
        }

        $validated = $request->validate([
            'practice_id' => 'nullable | numeric',
            'intervention_name' => 'required | string |min:2',
            'company_role' => 'required | string',
            'intervention_tipology' => 'required | string',
            'build_address' => 'nullable | string |min:5| max:150',
            'build_civic_number' => 'nullable | string',
            'common' => 'nullable | string |min:2 |max:100',
            'province' => 'nullable | string |min:2|max:2',
            'region' => 'nullable | string',
            'cap' => 'nullable |numeric',
            'fiscal_code' => 'required | min:11 | max:11',
            'condominio' => 'required | string',
//            'iban' => 'required | string |min:27 |max:27|regex:/^([A-Z]{2}[ \-]?[0-9]{2})(?=(?:[ \-]?[A-Z0-9]){9,30}$)((?:[ \-]?[A-Z0-9]{3,5}){2,7})([ \-]?[A-Z0-9]{1,3})?$/',
            'build_type' => 'required | string',
            'zone' => 'required | string',
            'section' => 'nullable ',
            'foil' => 'required',
            'particle' => 'required',
            'subaltern' => 'required',
            'unit_builidg_number' => 'required',
            'pertinence_number' => 'required',
            'resolution_stairs' => 'nullable',
            'note' => 'nullable | string',
            'cultural_constraints' => 'nullable | string',
            'denied_intervents' => 'nullable | string',
            'mountain_common' => 'nullable | string',
            'infringment_common' => 'nullable | string',
            'sismic_events_zone' => 'nullable | string',
            'isUnderRenovation' => 'nullable | string',
            'nonMetan_area' => 'nullable | string',
            'building_authorization' => 'nullable | string',
            'license_number' => 'nullable | string',
            'license_date' => 'nullable | string',
            'construction_date' => 'nullable | numeric',
            'administrator_fullname' => 'nullable | string |min:5 |max:150',
            'administrator_surname' => 'nullable | string |min:3 |max:75',
            'administrator_name' => 'nullable | string |min:3 |max:75',
            'administrator_fiscalcode' => 'nullable | string |min:16 |max:16 |regex:/^[A-Z]{6}\d{2}[A-Z]\d{2}[A-Z]\d{3}[A-Z]$/i',
            'administrator_address' => 'nullable | string |min:5 |max:150',
            'administrator_city' => 'nullable | string |min:3 |max:50',
            'administrator_province' => 'nullable | string |min:2 |max:2',
            'administrator_cap' => 'nullable | numeric',
            'administrator_telephone' => 'nullable | numeric | min:10',
            'administrator_cellphone' => 'nullable | numeric| min:10',
            'administrator_email' => 'nullable | string |min:3 |max:50',
            'imported_excel_file' => 'nullable | file | mimes:xls,xlsx,csv | max:512'
        ],
        [
            'intervention_name.required' => 'Inserisci il nome dell\'intervento prima di procedere',
            'intervention_name.min' => 'Il nome dell\'intervento ?? troppo corto',
            'company_role.required' => 'Inserisci il ruolo dell\'impresa prima di procedere',
            'intervention_tipology.required' => 'Seleziona la tipologia prima di procedere',
            'build_address.required' => 'Inserisci l\'indirizzo dello stabile prima di procedere',
            'build_address.min' => 'L\'indirizzo ?? troppo corto',
            'build_address.max' => 'L\'indirizzo ?? troppo lungo',
            'build_civic_number.required' => 'Inserisci il civico',
            'common.required' => 'Inserisci il comune',
            'common.min' => 'Il nome del comune ?? troppo corto',
            'common.max' => 'Il nome del comune ?? troppo lungo',
            'province.required' => 'Inserisci la provincia',
            'province.max' => 'Massimo 2 caratteri',
            'region.required' => 'Inserisci la regione',
            'cap.required' => 'Inserisci il cap',
            'cap.min' => 'Cap troppo corto',
            'cap.max' => 'Cap troppo lungo',
            'fiscal_code.required' => 'Inserisci il codice fiscale prima di procedere',
            'fiscal_code.min' => 'Il codice fiscale deve essere lungo almeno 11 caratteri',
            'fiscal_code.max' => 'Il codice fiscale deve essere lungo non pi?? di 11 caratteri',
            'condominio.required' => 'Inserisci il nome del condominio prima di proseguire',
//            'iban.required' => 'Inserisci l\'iban prima di proseguire',
//            'iban.min' => 'Il codice deve essere lungo almeno 27 caratteri',
//            'iban.max' => 'Il codice non pu?? superare i 27 caratteri',
//            'iban.regex' => 'Codice non valido',
            'build_type.required' => 'Inserisci il tipo di struttura',
            'zone.required' => 'Inserisci la zona',
            'section.required' => 'Inserisci la zona',
            'section.min' => 'La zona inserita necessita di almeno un carattere',
            'foil.required' => 'Inserisci il numero del foglio',
            'particle.required' => 'Inserisci la particella',
            'subaltern.required' => 'Inserisci la particella',
            'unit_builidg_number.required' => 'Inserisci il numero di immobili',
            'pertinence_number.required' => 'Inserisci il numero di pertinenza',
            'resolution_stairs.required' => 'Inerisci il numero di scale',
            'note.required' => 'Inserisci delle note',
            'cultural_constraints.required' => 'Seleziona una risposta prima di procedere',
            'denied_intervents.required' => 'Seleziona una risposta prima di procedere',
            'mountain_common.required' => 'Seleziona una risposta prima di procedere',
            'infringment_common.required' => 'Seleziona una risposta prima di procedere',
            'sismic_events_zone.required' => 'Seleziona una risposta prima di procedere',
            'isUnderRenovation.required' => 'Seleziona una risposta prima di procedere',
            'nonMetan_area.required' => 'Seleziona una risposta prima di procedere',
            'building_authorization.required' => 'Seleziona una risposta prima di procedere',
            'license_number.required' => 'Inserisci il numero di licenza',
            'license_number.min' => 'Il numero deve essre lungo almeno 3 caratteri',
            'license_date.required' => 'Inserisci la data presente sulla licenza',
            'construction_date.required' => 'Inserisci l\'anno di costruzione',
            'administrator_fullname.required' => 'Inserisci il nominativo prima di procedere',
            'administrator_fullname.min' => 'Il nominativo ?? troppo corto',
            'administrator_fullname.max' => 'Il nominativo ?? troppo lungo',
            'administrator_surname.required' => 'Inserisci il cognome dell\'amministratore',
            'administrator_surname.min' => 'Il cognome dell\'amministratore ?? troppo corto',
            'administrator_surname.max' => 'Il cognome dell\'amministratore ?? troppo lungo',
            'administrator_name.required' => 'Inserisci il nome dell\'amministratore',
            'administrator_name.min' => 'Il nome dell\'amministratore ?? troppo corto',
            'administrator_name.max' => 'Il nome dell\'amministratore ?? troppo lungo',
            'administrator_fiscalcode.required' => 'Inserisci il codice fiscale dell\'amministratore prima di proseguire',
            'administrator_fiscalcode.regex' => 'il codice fiscale dell\'amministratore non ?? valido',
            'administrator_fiscalcode.min' => 'Il codice fiscale dell\'amministratore ?? troppo corto',
            'administrator_fiscalcode.max' => 'Il codice fiscale dell\'amministratore ?? troppo lungo',
            'administrator_address.required' => 'Inserisci l\'indirizzo dell\'amministratore ',
            'administrator_address.min' => 'L\'indirizzo dell\'amministratore ?? troppo corto',
            'administrator_address.max' => 'L\'indirizzo dell\'amministratore ?? troppo lungo',
            'administrator_city.required' => 'Inserisci la citt?? dell\'amministratore',
            'administrator_city.min' => 'La citt?? dell\'amministratore ?? troppo corta',
            'administrator_city.' => 'La citt?? dell\'amministratore ?? troppo lunga',
            'administrator_province.required' => 'Inserisci la provincia dell\'amministrartore',
            'administrator_province.min' => 'La provincia dell\'amministrartore necessita di due caratteri',
            'administrator_province.max' => 'La provincia dell\'amministrartore necessita di non pi?? di due caratteri',
            'administrator_cap.required' => 'Inserisci il cap dell\'amministratore',
            'administrator_cap.min' => 'Il cap dell\'amministratore necessita di almeno 5 caratteri',
            'administrator_cap.max' => 'Il cap dell\'amministratore necessita di non pi?? di 5 caratteri',
            'administrator_telephone.required' => 'Inserisci il numero dell\'amministratore',
            'administrator_telephone.min' => 'Il numero dell\'amministratore ?? troppo corto',
            'administrator_telephone.max' => 'Il numero dell\'amministratore ?? troppo lungo',
            'administrator_cellphone.required' => 'Inserisci il cellulare dell\'amministratore',
            'administrator_cellphone.min' => 'Il cellulare dell\'amministratore necessita di almeno 10 caratteri',
            'administrator_email.required' => 'Inserisci la mail dell\'amministratore',
            'administrator_email.min' => 'la mail dell\'amministratore ?? troppo corta',
            'administrator_email.max' => 'La mail dell\'amministratore ?? troppo lunga',
        ]);
        //dd($request->get('condomini'));
        // Se esiste "imported_excel_file"
        if($request->hasFile('imported_excel_file')) {
            // Recupero l'estensione e il nome del file
            $extension = $request->file('imported_excel_file')->extension();
            $filename = pathinfo($request->file('imported_excel_file')->getClientOriginalName(), PATHINFO_FILENAME);
            // Dovendo avere un solo file caricato, cancello gli altri (se presenti) nella cartella
            if(count(Storage::allFiles('practices/' . $request->get('practice_id') . '/excel'))) {
                $files = Storage::allFiles('practices/' . $request->get('practice_id') . '/excel');
                Storage::delete($files);
            }

            // Salvo il file sul server
            $path = $request->file('imported_excel_file')->storeAs('practices/' . $request->get('practice_id') . '/excel' , $filename . '.' . $extension);
            $building->imported_excel_file = $path;
            $building->save();
        }

        $building->update($validated);
        $practice = $building->practice;

        if($request->get('condomini') > 0){
            return redirect()->route('superbonus.index', [$practice]);
        }else{
            return back()->withErrors('Inserisci almeno un condomino!');
        }
    }

    public function downloadExcel($id) {
        $practice = Practice::find($id)->first();
        $file = $practice->building->imported_excel_file;

        return Storage::download($file);
    }

    public function deleteExcel($id) {
        $practice = Practice::find($id)->first();
        $practice->building->imported_excel_file = '';
        $practice->building->save();
        $files = Storage::allFiles('practices/' . $id . '/excel');

        Storage::delete($files);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(building $building)
    {
        //
    }
}
