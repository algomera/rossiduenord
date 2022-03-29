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
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            // thermical isolation intervention
            $table->text('thermical_isolation_intervention')->nullable();
            // data
            $table->text('total_vertical_walls')->nullable();
            $table->text('vw_realized_1')->nullable();
            $table->text('vw_realized_2')->nullable();
            $table->text('total_intervention_surface')->nullable();
            $table->text('expected_project_cost')->nullable();
            // fixture replacing intervention
            $table->text('fixture_replacing_intervention')->nullable();
            $table->text('fixture_expected_cost')->nullable();
            $table->text('work_expected_cost')->nullable();
            $table->text('max_possible_cost')->nullable();
            $table->text('fixture_energetic_savings')->nullable();
            //SS
            $table->text('SS')->nullable();
            $table->text('ss_project_cost')->nullable();
            $table->text('ss_max_cost')->nullable();
            $table->text('ss_energetic_savings')->nullable();
            // winter air conditioning sistem replacement
            $table->text('wacs_replacement')->nullable();
            //with
            $table->text('condensing_boiler')->nullable();
            $table->text('condensing_generator')->nullable();
            $table->text('absorption_heat_pumps')->nullable();
            $table->text('hybrid_system')->nullable();
            //SA
            $table->text('water_heatpumps_installation')->nullable();
            $table->text('SA_expected_cost')->nullable();
            $table->text('SA_max_cost')->nullable();
            $table->text('SA_nr_savings')->nullable();
            //CO
            $table->text('microgeneration_system')->nullable();
            $table->text('CO_expected_cost')->nullable();
            $table->text('CO_max_cost')->nullable();
            $table->text('CO_nr_savings')->nullable();
            //IB
            $table->text('biome_generators')->nullable();
            $table->text('IB_expected_cost')->nullable();
            $table->text('IB_max_cost')->nullable();
            $table->text('IB_nr_savings')->nullable();
            //BA
            $table->text('building_automation')->nullable();
            $table->text('BA_winter_acs')->nullable();
            $table->text('BA_summer_acs')->nullable();
            $table->text('BA_hot_water_production')->nullable();
            $table->text('BA_usable_area')->nullable();
            $table->text('BA_expected_cost')->nullable();
            $table->text('BA_max_cost')->nullable();
            $table->text('BA_nr_savings')->nullable();
            //BA DESTINATION
            $table->text('winter_acs')->nullable();
            $table->text('summer_acs')->nullable();
            $table->text('hot_water_production')->nullable();
            //TS
            $table->text('TS')->nullable();
            $table->text('TS_expected_cost')->nullable();
            $table->text('TS_max_cost')->nullable();
            $table->text('TS_nr_savings')->nullable();
            //FV
            $table->text('FV')->nullable();
            $table->text('POD_code')->nullable();
            $table->text('max_power')->nullable();
            $table->text('FV_expected_cost')->nullable();
            $table->text('FV_max_cost')->nullable();
            //AC
            $table->text('AC')->nullable();
            $table->text('capacity')->nullable();
            $table->text('AC_expected_cost')->nullable();
            $table->text('AC_max_cost')->nullable();
            //CR
            $table->text('CR')->nullable();
            $table->text('CR_expected_cost')->nullable();
            $table->text('CR_installed_columns')->nullable();
            $table->text('CR_max_cost')->nullable();
            //EBA
            $table->text('EBA')->nullable();
            $table->text('EBA_expected_cost')->nullable();
            $table->text('EBA_sismic_cost')->nullable();
            $table->text('EBA_barr_deleting_cost')->nullable();
            $table->text('EBA_max_cost')->nullable();
            $table->text('EBA_cost_1')->nullable();
            $table->text('EBA_cost_2')->nullable();
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
