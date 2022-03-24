<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVertcalwallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vertcalwalls', function (Blueprint $table) {
            $table->id();
            // thermical isolation intervention
            $table->string('thermical_isolation_intervention');
            // data
            $table->string('total_vertical_walls');
            $table->string('vw_realized_1');
            $table->string('vw_realized_2');
            $table->string('total_intervention_surface');
            // before realization
            $table->string('total_expected_cost');
            $table->string('max_possible_cost');
            // after realization
            $table->string('total_isolation_cost_1');
            $table->string('total_isolation_cost_1');
            $table->string('final_isolation_cost');
            $table->string('dispersing_covers');
            $table->string('isolation_energetic_savings');
            // air conditioning system replacing intervention
            $table->string('winter_acs_replacing');
            $table->string('total_power');
            $table->string('generators');
            // equipment
            $table->string('condensing_boiler');
            $table->string('heat_pumps');
            $table->string('absorption_heat_pumps');
            $table->string('hybrid_system');
            $table->string('microgeneration_system');
            $table->string('water_heatpumps_installation');
            $table->string('biome_generators');
            $table->string('solar_panel');
            $table->string('solar_panel_use');
            // project cost
            $table->string('total_acs_project_cost');
            // effective cost
            $table->string('total_replacing_cost_1');
            $table->string('total_replacing_cost_1');
            $table->string('final_replacing_cost');
            $table->string('replacing_energetic_savings');
            // date
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
        Schema::dropIfExists('vertcalwalls');
    }
}
