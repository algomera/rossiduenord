<?php

namespace App\Http\Controllers\Business;
use App\{CondensingBoiler, Practice, Subject, Applicant, Building, Bonus, Data_project, Country};
use App\Http\Controllers\Controller;
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
        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        $data_project = $practice->data_project;

        return view('business.superbonus.index', compact('applicant', 'practice', 'building', 'subject', 'data_project'));
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
        return view('business.superbonus.data_project', compact('applicant', 'practice', 'building', 'subject', 'data_project'));
    }

    /**
     * Display driving_intervention view.
     *
     * @param Practice $practice
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function driving_intervention(Practice $practice) {
        // Redirect to next tab
        $data_project = $practice->data_project;
        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        $vertwall = $practice->verical_wall;
        $condensing_boilers = $practice->condensing_boilers;
        $heat_pumps = $practice->heat_pumps;
        $absorption_heat_pumps = $practice->absorption_heat_pumps;
        $hybrid_systems = $practice->hybrid_systems;
        $microgeneration_systems = $practice->microgeneration_systems;
        $water_heatpumps_installations = $practice->water_heatpumps_installations;
        return view('business.superbonus.driving_intervention.vertical_wall', compact(
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
            'data_project')
        );
    }

    /**
     * Display towed_intervention view.
     *
     * @param Practice $practice
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function towed_intervention(Practice $practice) {
        // Redirect to next tab
        $applicant = $practice->applicant;
        $building = $practice->building;
        $subject = $practice->subject;
        $towed_vw = $practice->trainated_vert_wall;
        $condomini = $practice->condomini;
        $countries = Country::all();
        return view('business.superbonus.towed_intervention.vertical_wall', compact('countries','condomini', 'towed_vw','applicant', 'practice', 'building', 'subject'));
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
        return view('business.superbonus.final_state_data', compact('final_state','applicant', 'practice', 'building', 'subject'));
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
        return view('business.superbonus.fees_declaration', compact('applicant', 'practice', 'building', 'subject'));
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
        return view('business.superbonus.variant.var_computation', compact('variant', 'applicant', 'practice', 'building', 'subject'));
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
            'filed_protocol' => 'nullable |string |min:5|max:50',
            'technical_report_exclusion' => 'nullable |string',
            'work_start' => 'nullable |string |min:5 |string',
            'end_of_works' => 'nullable |string |min:5 |string',
            'type_building' => 'nullable |string',
            'building_unit' => 'nullable |string',
            'relevance' => 'nullable |integer',
            'centralized_system' => 'nullable|string',
            'gross_surface_area' => 'nullable',
            'np' => 'nullable',
            'np_validated' => 'nullable',
            'np_not_validated' => 'nullable',
        ]);

        // Update data
        $data_project->update($validated);

        // Redirect to next tab
        $practice = $data_project->practice;
        return redirect()->route('business.driving_intervention', [$practice]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Practice $practice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_driving_intervention(Request $request, Practice $practice)
    {
        // Form Validation
        $validated = $request->validate([
            'practice_id' => 'nullable',
            'thermical_isolation_intervention' => 'nullable',
            'total_vertical_walls' => 'nullable',
            'vw_realized_1' => 'nullable',
            'vw_realized_2' => 'nullable',
            'vw_sal_f' => 'nullable',
            'total_intervention_surface' => 'nullable',
            'total_expected_cost' => 'nullable',
            'max_possible_cost' => 'nullable',
            'total_isolation_cost_1' => 'nullable',
            'total_isolation_cost_2' => 'nullable',
            'final_isolation_cost' => 'nullable',
            'dispersing_covers' => 'nullable',
            'isolation_energetic_savings' => 'nullable',
            'winter_acs_replacing' => 'nullable',
            'total_power' => 'nullable',
            'generators' => 'nullable',
            'condensing_boiler' => 'nullable',
            'heat_pump' => 'nullable',
            'absorption_heat_pump' => 'nullable',
            'hybrid_system' => 'nullable',
            'microgeneration_system' => 'nullable',
            'water_heatpumps_installation' => 'nullable',
            'biome_generator' => 'nullable',
            'solar_panel' => 'nullable',
            'solar_panel_use_winter' => 'nullable',
            'solar_panel_use_summer' => 'nullable',
            'solar_panel_use_water' => 'nullable',
            'total_acs_project_cost' => 'nullable',
            'total_cost_installations' => 'nullable',
            'total_replacing_cost_1' => 'nullable',
            'total_replacing_cost_2' => 'nullable',
            'final_replacing_cost' => 'nullable',
            'replacing_energetic_savings' => 'nullable',
        ]);

        // Update data
        $practice->verical_wall->update($validated);
        $practice->verical_wall->condensing_boiler = $request->get('condensing_boiler');
        $practice->verical_wall->heat_pump = $request->get('heat_pump');
        $practice->verical_wall->absorption_heat_pump = $request->get('absorption_heat_pump');
        $practice->verical_wall->hybrid_system = $request->get('hybrid_system');
        $practice->verical_wall->microgeneration_system = $request->get('microgeneration_system');
        $practice->verical_wall->water_heatpumps_installation = $request->get('water_heatpumps_installation');
        $practice->verical_wall->save();

        // Add Condensing Boiler
        $this->addCondensingBoiler($practice, $request);

        // Add Heat Pump
        $this->addHeatPump($practice, $request);

        // Add Absorption Heat Pump
        $this->addAbsorptionHeatPump($practice, $request);

        // Add Hybrid System
        $this->addHybridSystem($practice, $request);

        // Add Microgeneration System
        $this->addMicrogenerationSystem($practice, $request);

        // Add Water Heat Pumps Installation
        $this->addWaterHeatpumpsInstallation($practice, $request);

        // Redirect to next tab
        return redirect()->route('business.towed_intervention', [$practice]);
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param Practice $practice
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update_towed_intervention(Request $request, Practice $practice) {
        // Validazione form

        // Update data
        $practice->trainated_vert_wall()->update($request->except(['_token', '_method']));

        // Redirect to next tab
        return redirect()->route('business.final_state', [$practice]);
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
        return redirect()->route('business.fees_declaration', [$practice]);
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
        return redirect()->route('business.superbonus.show', [$practice, $building])->with('message', 'Dati inseriti correttamente');
    }

    public function addCondensingBoiler($practice, $request) {
        if($request->get('condensing_boilers')) {
            foreach ($request->get('condensing_boilers') as $i => $item) {
                if(is_numeric($i)) {
                    $practice->condensing_boilers()->create(['condomino_id' => $item['condomino_id']], $item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->condensing_boilers()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "condomino_id" => $item['condomino_id'],
                        "tipo_sostituito" => $item['tipo_sostituito'],
                        "p_nom_sostituito" => $item['p_nom_sostituito'],
                        "potenza_nominale" => $item['potenza_nominale'],
                        "rend_utile_nom" => $item['rend_utile_nom'],
                        "use_destination" => $item['use_destination'],
                        "efficienza_ns" => $item['efficienza_ns'],
                        "efficienza_acs_nwh" => $item['efficienza_acs_nwh'],
                        "tipo_di_alimentazione" => $item['tipo_di_alimentazione'],
                        "classe_termo_evoluto" => $item['classe_termo_evoluto'],
                    ]);
                }
            }
        }
    }

    public function addHeatPump($practice, $request) {
        if($request->get('heat_pumps')) {
            foreach ($request->get('heat_pumps') as $i => $item) {
                if(is_numeric($i)) {
                    $practice->heat_pumps()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->heat_pumps()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "condomino_id" => $item['condomino_id'],
                        "tipo_sostituito" => $item['tipo_sostituito'],
                        "p_nom_sostituito" => $item['p_nom_sostituito'],
                        "tipo_di_pdc" => $item['tipo_di_pdc'],
                        "tipo_roof_top" => isset($item['tipo_roof_top']),
                        "potenza_nominale" => $item['potenza_nominale'],
                        "p_elettrica_assorbita" => $item['p_elettrica_assorbita'],
                        "inverter" => isset($item['inverter']),
                        "cop" => $item['cop'],
                        "reversibile" => isset($item['reversibile']),
                        "eer" => $item['eer'],
                        "sonde_geotermiche" => isset($item['sonde_geotermiche']),
                        "sup_riscaldata_dalla_pdc" => $item['sup_riscaldata_dalla_pdc'],
                    ]);
                }
            }
        }
    }

    public function addAbsorptionHeatPump($practice, $request) {
        if($request->get('absorption_heat_pumps')) {
            foreach ($request->get('absorption_heat_pumps') as $i => $item) {
                if(is_numeric($i)) {
                    $practice->absorption_heat_pumps()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->absorption_heat_pumps()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "condomino_id" => $item['condomino_id'],
                        "tipo_sostituito" => $item['tipo_sostituito'],
                        "p_nom_sostituito" => $item['p_nom_sostituito'],
                        "tipo_di_pdc" => $item['tipo_di_pdc'],
                        "tipo_roof_top" => isset($item['tipo_roof_top']),
                        "potenza_nominale" => $item['potenza_nominale'],
                        "gueh" => $item['gueh'],
                        "reversibile" => isset($item['reversibile']),
                        "guec" => $item['guec'],
                        "sup_riscaldata_dalla_pdc" => $item['sup_riscaldata_dalla_pdc'],
                    ]);
                }
            }
        }
    }

    public function addHybridSystem($practice, $request) {
        if($request->get('hybrid_systems')) {
            foreach ($request->get('hybrid_systems') as $i => $item) {
                if(is_numeric($i)) {
                    $practice->hybrid_systems()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->hybrid_systems()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "condomino_id" => $item['condomino_id'],
                        "tipo_sostituito" => $item['tipo_sostituito'],
                        "p_nom_sostituito" => $item['p_nom_sostituito'],
                        "condensing_potenza_nominale" => $item['condensing_potenza_nominale'],
                        "condensing_rend_utile_nom" => $item['condensing_rend_utile_nom'],
                        "condensing_efficienza_ns" => $item['condensing_efficienza_ns'],
                        "tipo_di_alimentazione" => $item['tipo_di_alimentazione'],
                        "heat_tipo_di_pdc" => $item['heat_tipo_di_pdc'],
                        "heat_tipo_roof_top" => isset($item['heat_tipo_roof_top']),
                        "heat_potenza_nominale" => $item['heat_potenza_nominale'],
                        "heat_p_elettrica_assorbita" => $item['heat_p_elettrica_assorbita'],
                        "heat_inverter" => isset($item['heat_inverter']),
                        "heat_cop" => $item['heat_cop'],
                        "heat_sonde_geotermiche" => isset($item['heat_sonde_geotermiche']),
                    ]);
                }
            }
        }
    }

    public function addMicrogenerationSystem($practice, $request) {
        if($request->get('microgeneration_systems')) {
            foreach ($request->get('microgeneration_systems') as $i => $item) {
                if(is_numeric($i)) {
                    $practice->microgeneration_systems()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->microgeneration_systems()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "condomino_id" => $item['condomino_id'],
                        "tipo_sostituito" => $item['tipo_sostituito'],
                        "p_nom_sostituito" => $item['p_nom_sostituito'],
                        "p_elettrica" => $item['p_elettrica'],
                        "p_immessa" => $item['p_immessa'],
                        "p_term_recuperata" => $item['p_term_recuperata'],
                        "pes" => $item['pes'],
                        "tipo_di_alimentazione" => $item['tipo_di_alimentazione'],
                        "tipo_intervento" => $item['tipo_intervento'],
                        "a_celle_a_combustibile" => isset($item['a_celle_a_combustibile']),
                        "riscaldatore_suppl" => isset($item['riscaldatore_suppl']),
                        "potenza_risc_suppl" => $item['potenza_risc_suppl'],
                        "efficienza_ns" => $item['efficienza_ns'],
                        "classe_energ" => $item['classe_energ'],
                    ]);
                }
            }
        }
    }

    public function addWaterHeatpumpsInstallation($practice, $request) {
        if($request->get('water_heatpumps_installations')) {
            foreach ($request->get('water_heatpumps_installations') as $i => $item) {
                if(is_numeric($i)) {
                    $practice->water_heatpumps_installations()->create($item);
                } else if(is_string($i)) {
                    $pn = explode('-', $i)[0];
                    $cn = explode('-', $i)[1];
                    $practice->water_heatpumps_installations()->updateOrCreate([
                        'id' => $cn,
                        'practice_id' => $pn
                    ], [
                        "condomino_id" => $item['condomino_id'],
                        "tipo_scaldacqua_sostituito" => $item['tipo_scaldacqua_sostituito'],
                        "pu_scaldacqua_sostituito" => $item['pu_scaldacqua_sostituito'],
                        "pu_scaldacqua_a_pdc" => $item['pu_scaldacqua_a_pdc'],
                        "cop_nuovo_scaldacqua" => $item['cop_nuovo_scaldacqua'],
                        "capacita_accumulo" => $item['capacita_accumulo'],
                    ]);
                }
            }
        }
    }
}
