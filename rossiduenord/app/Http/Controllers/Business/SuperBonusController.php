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
        return view('business.superbonus.driving_intervention.vertical_wall', compact('heat_pumps', 'condensing_boilers', 'vertwall','applicant', 'practice', 'building', 'subject', 'data_project'));
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
            'np' => 'nullable |integer',
            'np_validated' => 'nullable |integer',
            'np_not_validated' => 'nullable |integer',
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
            'thermical_isolation_intervention' => 'nullable| string',
            'total_vertical_walls' => 'nullable|integer',
            'vw_realized_1' => 'nullable |integer |min:2',
            'vw_realized_2' => 'nullable |integer |min:2',
            'vw_sal_f' => 'nullable| integer |min:2',
            'total_intervention_surface' => 'nullable|integer |min:2',
            'total_expected_cost' => 'nullable| integer | min:2 ',
            'max_possible_cost' => 'nullable| integer | min:2 ',
            'total_isolation_cost_1' => 'nullable|integer | min:2 ',
            'total_isolation_cost_2' => 'nullable|integer | min:2 ',
            'final_isolation_cost' => 'nullable|integer | min:2 ',
            'dispersing_covers' => 'nullable| integer | min:2 ',
            'isolation_energetic_savings' => 'nullable|integer | min:2 ',
            'winter_acs_replacing' => 'nullable|string ',
            'total_power' => 'nullable| integer | min:2',
            'generators' => 'nullable|string ',
            'condensing_boiler' => 'nullable|string ',
            'heat_pumps' => 'nullable|string ',
            'absorption_heat_pumps' => 'nullable|string ',
            'hybrid_system' => 'nullable| string',
            'microgeneration_system' => 'nullable| string',
            'water_heatpumps_installation' => 'nullable|string ',
            'biome_generators' => 'nullable|string ',
            'solar_panel' => 'nullable| string',
            'solar_panel_use_winter' => 'nullable|string ',
            'solar_panel_use_summer' => 'nullable|string ',
            'solar_panel_use_water' => 'nullable| string',
            'total_acs_project_cost' => 'nullable|integer | min:2 ',
            'total_cost_installations' => 'nullable|integer | min:2 ',
            'total_replacing_cost_1' => 'nullable|integer | min:2 ',
            'total_replacing_cost_2' => 'nullable| integer | min:2',
            'final_replacing_cost' => 'nullable| integer | min:2',
            'replacing_energetic_savings' => 'nullable|integer | min:2 ',
        ]);

        // Update data
        $practice->verical_wall()->update($validated);

        // Add Condensing Boiler
        $this->addCondensingBoiler($practice, $request);

        // Add Heat Pump
        $this->addHeatPump($practice, $request);

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
                    ], $item);
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
                    ], $item);
                }
            }
        }
    }
}
