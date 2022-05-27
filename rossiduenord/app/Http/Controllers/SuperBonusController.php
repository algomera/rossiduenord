<?php

namespace App\Http\Controllers;
use App\{Computo_folder, Condomini, Country, Helpers\Interventi, Practice, Surface, Computo_priceList, ComputoSubFolder, TypeIntervention};
use Illuminate\Http\Request;

class SuperBonusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Practice $practice)
    {
        //$this->authorize('edit-superbonus',  $practice->building);

        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        $data_project = $practice->data_project;

        return view('pages.superbonus.index', compact('applicant', 'practice', 'building', 'subject', 'data_project'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bonus  $bonus
     * @return \Illuminate\Http\Response
     */
    public function show(Practice $practice)
    {
        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        $data_project = $practice->data_project;
        return view('pages.superbonus.data_project', compact('applicant', 'practice', 'building', 'subject', 'data_project'));
    }

    /**
     * Display driving_intervention view.
     *
     * @param Practice $practice
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function driving_intervention(Practice $practice, $type = 'PV', Request $request, TypeIntervention $typeIntervention) {
        $data_project = $practice->data_project;
        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        $vertwall = $practice->verical_wall;
        $condominoId = null;
        $condensing_boilers = $practice->condensing_boilers()->where('condomino_id', null)->where('is_common', 0)->get();
        $heat_pumps = $practice->heat_pumps()->where('condomino_id', null)->where('is_common', 0)->get();
        $absorption_heat_pumps = $practice->absorption_heat_pumps()->where('condomino_id', null)->where('is_common', 0)->get();
        $hybrid_systems = $practice->hybrid_systems()->where('condomino_id', null)->where('is_common', 0)->get();
        $microgeneration_systems = $practice->microgeneration_systems()->where('condomino_id', null)->where('is_common', 0)->get();
        $water_heatpumps_installations = $practice->water_heatpumps_installations()->where('condomino_id', null)->where('is_common', 0)->get();
        $biome_generators = $practice->biome_generators()->where('condomino_id', null)->where('is_common', 0)->get();
        $solar_panels = $practice->solar_panels()->where('condomino_id', null)->where('is_common', 0)->get();
        $surfaces = $practice->surfaces()->where('type', $type)->where('intervention', 'driving')->get();
        $computo_folders = Computo_folder::all();
        $computo_sub_folders = ComputoSubFolder::query()->where('computo_folder_id', 1);
        $computo_price_lists = Computo_priceList::all();
        $typeCategories = TypeIntervention::all();
        $categoryIntervention = $typeIntervention->categoryIntervetion;

        return view('pages.superbonus.driving_intervention.vertical_wall', compact(
            'solar_panels',
            'biome_generators',
            'water_heatpumps_installations',
            'microgeneration_systems',
            'hybrid_systems',
            'absorption_heat_pumps',
            'heat_pumps',
            'condensing_boilers',
            'vertwall',
            'applicant',
            'practice',
            'building',
            'subject',
            'data_project',
            'condominoId',
            'surfaces',
            'type',
            'computo_folders',
            'computo_sub_folders',
            'computo_price_lists',
            'typeCategories',
            'categoryIntervention')
        );
    }

    /**
     * Display towed_intervention view.
     *
     * @param Practice $practice
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function towed_intervention(Practice $practice, $condomino = 'common', $type = 'PV', Request $request) {
        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        $towed_vw = $practice->trainated_vert_wall;
        $condomini = $practice->condomini;
        $condominoId = $condomino;
        $selected_condomino = Condomini::find($condominoId);
        $countries = Country::all();
        $condensing_boilers = $condominoId === 'common' ? $practice->condensing_boilers()->where('condomino_id', null)->where('is_common', 1)->get() : $practice->condensing_boilers()->where('condomino_id', $condominoId)->get();
        $heat_pumps = $condominoId === 'common' ? $practice->heat_pumps()->where('condomino_id', $condominoId)->where('is_common', 1)->get() : $practice->heat_pumps()->where('condomino_id', $condominoId)->get();
        $absorption_heat_pumps = $condominoId === 'common' ? $practice->absorption_heat_pumps()->where('condomino_id', $condominoId)->where('is_common', 1)->get() : $practice->absorption_heat_pumps()->where('condomino_id', $condominoId)->get();
        $hybrid_systems = $condominoId === 'common' ? $practice->hybrid_systems()->where('condomino_id', $condominoId)->where('is_common', 1)->get() : $practice->hybrid_systems()->where('condomino_id', $condominoId)->get();
        $microgeneration_systems = $condominoId === 'common' ? $practice->microgeneration_systems()->where('condomino_id', $condominoId)->where('is_common', 1)->get() : $practice->microgeneration_systems()->where('condomino_id', $condominoId)->get();
        $water_heatpumps_installations = $condominoId === 'common' ? $practice->water_heatpumps_installations()->where('condomino_id', $condominoId)->where('is_common', 1)->get() : $practice->water_heatpumps_installations()->where('condomino_id', $condominoId)->get();
        $biome_generators = $condominoId === 'common' ? $practice->biome_generators()->where('condomino_id', $condominoId)->where('is_common', 1)->get() : $practice->biome_generators()->where('condomino_id', $condominoId)->get();
        $solar_panels = $condominoId === 'common' ? $practice->solar_panels()->where('condomino_id', $condominoId)->where('is_common', 1)->get() : $practice->solar_panels()->where('condomino_id', $condominoId)->get();
        $surfaces = $practice->surfaces()->where('type', $type)->where('intervention', 'towed')->where('condomino_id', $condominoId === 'common' ? null : $condominoId)->get();
        return view('pages.superbonus.towed_intervention.vertical_wall', compact(
            'solar_panels',
            'biome_generators',
            'water_heatpumps_installations',
            'microgeneration_systems',
            'hybrid_systems',
            'absorption_heat_pumps',
            'heat_pumps',
            'condensing_boilers',
            'countries',
            'selected_condomino',
            'condomini',
            'condominoId',
            'towed_vw',
            'applicant',
            'practice',
            'building',
            'subject',
            'surfaces',
            'type')
        );
    }

    /**
     * Display final_state view.
     *
     * @param Practice $practice
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function final_state(Practice $practice) {
        // Redirect to next tab
        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        $final_state = $practice->final_state;
        return view('pages.superbonus.final_state_data', compact('final_state','applicant', 'practice', 'building', 'subject'));
    }

    /**
     * Display fees_declaration view.
     *
     * @param Practice $practice
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function fees_declaration(Practice $practice) {
        // Redirect to next tab
        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        return view('pages.superbonus.fees_declaration', compact('applicant', 'practice', 'building', 'subject'));
    }

    /**
     * Display final_state view.
     *
     * @param Practice $practice
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function var_computation(Practice $practice) {
        // Redirect to next tab
        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        $variant = $practice->variant;
        return view('pages.superbonus.variant.var_computation', compact('variant', 'applicant', 'practice', 'building', 'subject'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Practice $practice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_data_project(Request $request, Practice $practice)
    {
        $data_project = $practice->data_project;
        // Form Validation
        $validated = $request->validate([
            'practice_id' => 'nullable',
            'technical_report' => 'nullable |string',
            'filed_common' => 'nullable |string| min:3|max:100',
            'filed_province' => 'nullable |string| min:2|max:2',
            'filed_date' => 'nullable | string',
            'filed_protocol' => 'nullable |string |min:3|max:50',
            'technical_report_exclusion' => 'nullable |string',
            'work_start' => 'nullable |string |min:5 |string',
            'end_of_works' => 'nullable |string |min:5 |string',
            'type_building' => 'nullable |string',
            'building_unit' => 'nullable |string',
            'relevance' => 'nullable |integer',
            'centralized_system' => 'nullable|string',
            'gross_surface_area' => 'nullable | integer',
            'np' => 'nullable',
            'np_validated' => 'nullable',
            'np_not_validated' => 'nullable',
        ],
        [
            'technical_report.required'=> 'Seleziona questo campo per procedere',
            'filed_common.required' => 'Inserisci il comune',
            'filed_common.min' => 'Il comune deve avere un minimo di 3 caratteri',
            'filed_common.max' => 'Il nome del comune è troppo lungo',
            'filed_province.required' => 'Inserisci la provincia',
            'filed_province.min' => 'Inserisci almeno due caratteri',
            'filed_province.max' => 'Non più di due caratteri',
            'filed_date.required' => 'Inserisci la data',
            'filed_protocol.required' => 'Inserisci il numero di protocollo',
            'filed_protocol.min' => 'Il numero di protocollo richiede un minimo di 3 caratteri',
            'filed_protocol.max' => 'Inserisci il numero di protocollo',
            'technical_report_exclusion.required' => 'Seleziona questo campo',
            'work_start.required' => 'Inserisci la data di inizio dei lavori',
            'end_of_works.required' => 'Inserisci la data di fine lavori',
            'type_building.required' => 'Seleziona un tipo di edificio',
            'building_unit.required' => 'Inserisci le unita immobiliari',
            'relevance.required' => 'Inserisci il numero di pertinenze',
            'centralized_system.required' => 'Seleziona il campo prima di procedere',
            'gross_surface_area.required' => 'Inserisci il valore necessario prima di proseguire',
            'gross_surface_area.min' => 'Il campo necessita di un minimo di 2 caratteri',
        ]
    );

        // Update data
        $data_project->update($validated);

        // Redirect to next tab
        $practice = $data_project->practice;
        return redirect()->route('driving_intervention', [$practice]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Practice $practice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_driving_intervention(Request $request, Practice $practice)
    {
        //dd($request->all());
        // Form Validation
        $validated = $request->validate([
            'practice_id' => 'nullable',
            'thermical_isolation_intervention' => 'nullable| string',
            'total_vertical_walls' => 'nullable',
            'vw_realized_1' => 'nullable |integer',
            'vw_realized_2' => 'nullable |integer',
            'vw_sal_f' => 'nullable| integer',
            'total_intervention_surface' => 'nullable',
            'total_expected_cost' => 'nullable| integer ',
            'max_possible_cost' => 'nullable| integer',
            'total_isolation_cost_1' => 'nullable|integer ',
            'total_isolation_cost_2' => 'nullable|integer ',
            'final_isolation_cost' => 'nullable|integer ',
            'dispersing_covers' => 'nullable| integer ',
            'isolation_energetic_savings' => 'nullable|integer ',
            'winter_acs_replacing' => 'nullable|string ',
            'total_power' => 'nullable| integer',
            'generators' => 'nullable|string ',
            'condensing_boiler' => 'nullable|string ',
            'heat_pump' => 'nullable|string ',
            'absorption_heat_pump' => 'nullable|string ',
            'hybrid_system' => 'nullable| string',
            'microgeneration_system' => 'nullable| string',
            'water_heatpumps_installation' => 'nullable|string ',
            'biome_generator' => 'nullable|string ',
            'solar_panel' => 'nullable| string',
            'solar_panel_use_winter' => 'nullable|string ',
            'solar_panel_use_summer' => 'nullable|string ',
            'solar_panel_use_water' => 'nullable| string',
            'total_acs_project_cost' => 'nullable|integer ',
            'total_cost_installations' => 'nullable|integer ',
            'total_replacing_cost_1' => 'nullable|integer ',
            'total_replacing_cost_2' => 'nullable| integer',
            'final_replacing_cost' => 'nullable| integer',
            'replacing_energetic_savings' => 'nullable| integer ',
        ]
    );

        // Update data
        $practice->verical_wall->update($validated);
        $practice->verical_wall->condensing_boiler = $request->get('condensing_boiler');
        $practice->verical_wall->heat_pump = $request->get('heat_pump');
        $practice->verical_wall->absorption_heat_pump = $request->get('absorption_heat_pump');
        $practice->verical_wall->hybrid_system = $request->get('hybrid_system');
        $practice->verical_wall->microgeneration_system = $request->get('microgeneration_system');
        $practice->verical_wall->water_heatpumps_installation = $request->get('water_heatpumps_installation');
        $practice->verical_wall->biome_generator = $request->get('biome_generator');
        $practice->verical_wall->solar_panel = $request->get('solar_panel');
        $practice->verical_wall->solar_panel_use_winter = $request->get('solar_panel_use_winter');
        $practice->verical_wall->solar_panel_use_summer = $request->get('solar_panel_use_summer');
        $practice->verical_wall->solar_panel_use_water = $request->get('solar_panel_use_water');
        $practice->verical_wall->save();

        // Add Condensing Boiler
        Interventi::addCondensingBoiler($practice, $request->get('condensing_boilers'));

        // Add Heat Pump
        Interventi::addHeatPump($practice, $request->get('heat_pumps'));

        // Add Absorption Heat Pump
        Interventi::addAbsorptionHeatPump($practice, $request->get('absorption_heat_pumps'));

        // Add Hybrid System
        Interventi::addHybridSystem($practice, $request->get('hybrid_systems'));

        // Add Microgeneration System
        Interventi::addMicrogenerationSystem($practice, $request->get('microgeneration_systems'));

        // Add Water Heat Pumps Installation
        Interventi::addWaterHeatpumpsInstallation($practice, $request->get('water_heatpumps_installations'));

        // Add Biome Generator
        Interventi::addBiomeGenerator($practice, $request->get('biome_generators'));

        // Add Solar Panel
        Interventi::addSolarPanel($practice, $request->get('solar_panels'));

        if($request->get('surfaces')) {
            $practice->surfaces()->createMany($request->get('surfaces'));
        }

        // Redirect to next tab
        return redirect()->route('towed_intervention', [$practice]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Practice $practice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_towed_intervention(Request $request, Practice $practice) {
        //dd($request->all());
        // Validazione form

        // Update data
        // TODO: mancano il resto dei dati che cmq non corrispondono alla tabella, controllare!
//        $practice->trainated_vert_wall()->update($request->except(['_token', '_method', 'condensing_boilers']));

        // Add Condensing Boiler
        Interventi::addCondensingBoiler($practice, $request->get('condensing_boilers'));

        // Add Heat Pump
        Interventi::addHeatPump($practice, $request->get('heat_pumps'));

        // Add Absorption Heat Pump
        Interventi::addAbsorptionHeatPump($practice, $request->get('absorption_heat_pumps'));

        // Add Hybrid System
        Interventi::addHybridSystem($practice, $request->get('hybrid_systems'));

        // Add Microgeneration System
        Interventi::addMicrogenerationSystem($practice, $request->get('microgeneration_systems'));

        // Add Water Heat Pumps Installation
        Interventi::addWaterHeatpumpsInstallation($practice, $request->get('water_heatpumps_installations'));

        // Add Biome Generator
        Interventi::addBiomeGenerator($practice, $request->get('biome_generators'));

        // Add Solar Panel
        Interventi::addSolarPanel($practice, $request->get('solar_panels'));

        if($request->get('surfaces')) {
            $practice->surfaces()->createMany($request->get('surfaces'));
        }

        // Redirect to next tab
        return redirect()->route('final_state', [$practice]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Practice $practice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_final_state(Request $request, Practice $practice) {
        // Validazione form

        // Update data
        $practice->final_state()->update($request->except(['_token', '_method']));

        // Redirect to next tab
        return redirect()->route('fees_declaration', [$practice]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Practice $practice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_var_computation(Request $request, Practice $practice) {
        // Validazione form

        // Update data
        $practice->variant()->update($request->except(['_token', '_method']));

        // Redirect to next tab
        $building = $practice->building;
        return redirect()->route('superbonus.show', [$practice, $building])->with('message', 'Dati inseriti correttamente');
    }

    public function delete_surface($id){
        $surface = Surface::find($id);
        $surface->delete();
    }
}
