<?php

namespace App\Http\Controllers\Business;
use App\{Practice, Subject, Applicant, Building, Bonus, Data_project, Country};
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
        return view('business.superbonus.driving_intervention.vertical_wall', compact('vertwall','applicant', 'practice', 'building', 'subject', 'data_project'));
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
            'technical_report' => 'nullable',
            'filed_common' => 'nullable',
            'filed_province' => 'nullable',
            'filed_date' => 'nullable',
            'filed_protocol' => 'nullable',
            'technical_report_exclusion' => 'nullable',
            'work_start' => 'nullable',
            'end_of_works' => 'nullable',
            'type_building' => 'nullable',
            'building_unit' => 'nullable',
            'relevance' => 'nullable',
            'centralized_system' => 'nullable',
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
            'heat_pumps' => 'nullable',
            'absorption_heat_pumps' => 'nullable',
            'hybrid_system' => 'nullable',
            'microgeneration_system' => 'nullable',
            'water_heatpumps_installation' => 'nullable',
            'biome_generators' => 'nullable',
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
        $practice->verical_wall()->update($validated);

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
}
