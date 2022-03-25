<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrainatedvertwallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainatedvertwalls', function (Blueprint $table) {
            $table->id();
            // thermical isolation intervention
            $table->string('thermical_isolation_intervention')->nullable();
            // data
            $table->string('total_vertical_walls')->nullable();
            $table->string('vw_realized_1')->nullable();
            $table->string('vw_realized_2')->nullable();
            $table->string('total_intervention_surface')->nullable();
            $table->string('expected_project_cost')->nullable();
            // fixture replacing intervention
            $table->string('fixture_replacing_intervention')->nullable();
            $table->string('fixture_expected_cost')->nullable();
            $table->string('work_expected_cost')->nullable();
            $table->string('max_possible_cost')->nullable();
            $table->string('fixture_energetic_savings')->nullable();
            //SS
            $table->string('ss_project_cost')->nullable();
            $table->string('ss_max_cost')->nullable();
            $table->string('ss_energetic_savings')->nullable();
            // winter air conditioning sistem replacement
            $table->string('wacs_replacement')->nullable();
            //with 
            $table->string('condensing_boiler')->nullable();
            $table->string('condensing_generator')->nullable();
            $table->string('absorption_heat_pumps')->nullable();
            $table->string('hybrid_system')->nullable();
            //SA
            $table->string('water_heatpumps_installation')->nullable();
            $table->string('SA_expected_cost')->nullable();
            $table->string('SA_max_cost')->nullable();
            $table->string('SA_nr_savings')->nullable();
            //CO
            $table->string('microgeneration_system')->nullable();
            $table->string('CO_expected_cost')->nullable();
            $table->string('CO_max_cost')->nullable();
            $table->string('CO_nr_savings')->nullable();
            //IB
            $table->string('biome_generators')->nullable();
            $table->string('IB_expected_cost')->nullable();
            $table->string('IB_max_cost')->nullable();
            $table->string('IB_nr_savings')->nullable();
            //BA
            $table->string('building_automation')->nullable();
            $table->string('BA_winter_acs')->nullable();
            $table->string('BA_summer_acs')->nullable();
            $table->string('BA_hot_water_production')->nullable();
            $table->string('BA_expected_cost')->nullable();
            $table->string('BA_max_cost')->nullable();
            $table->string('BA_nr_savings')->nullable();
            //BA DESTINATION
            $table->string('winter_acs')->nullable();
            $table->string('summer_acs')->nullable();
            $table->string('hot_water_production')->nullable();
            //TS
            $table->string('TS')->nullable();
            $table->string('TS_expected_cost')->nullable();
            $table->string('TS_max_cost')->nullable();
            $table->string('TS_nr_savings')->nullable();
            //FV
            $table->string('FV')->nullable();
            $table->string('POD_code')->nullable();
            $table->string('max_power')->nullable();
            $table->string('FV_expected_cost')->nullable();
            $table->string('FV_max_cost')->nullable();
            //AC
            $table->string('AC')->nullable();
            $table->string('capacity')->nullable();
            $table->string('AC_expected_cost')->nullable();
            $table->string('AC_max_cost')->nullable();
            //CR
            $table->string('CR')->nullable();
            $table->string('CR_expected_cost')->nullable();
            $table->string('CR_installed_columns')->nullable();
            $table->string('CR_max_cost')->nullable();
            //EBA
            $table->string('EBA')->nullable();
            $table->string('EBA_expected_cost')->nullable();
            $table->string('EBA_sismic_cost')->nullable();
            $table->string('EBA_cost_1')->nullable();
            $table->string('EBA_cost_2')->nullable();
            $table->string('EBA_max_cost')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainatedvertwalls');
    }
}
