<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerticalWallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vertical_walls', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            // thermical isolation intervention
            $table->string('thermical_isolation_intervention')->nullable();
            $table->string('start_date_payment')->nullable();
            // data
            $table->string('total_vertical_walls')->nullable();
            $table->string('vw_realized_1')->nullable();
            $table->string('vw_realized_2')->nullable();
            $table->string('vw_sal_f')->nullable();
            $table->string('total_intervention_surface')->nullable();
            // before realization
            $table->string('total_expected_cost')->nullable();
            $table->string('max_possible_cost')->nullable();
            // after realization
            $table->string('total_isolation_cost_1')->nullable();
            $table->string('total_isolation_cost_2')->nullable();
            $table->string('final_isolation_cost')->nullable();
            $table->string('dispersing_covers')->nullable();
            $table->string('isolation_energetic_savings')->nullable();
            // air conditioning system replacing intervention
            $table->string('winter_acs_replacing')->nullable();
            $table->string('total_power')->nullable();
            $table->string('generators')->nullable();
            // equipment
            $table->string('condensing_boiler')->nullable();
            $table->string('heat_pump')->nullable();
            $table->string('absorption_heat_pumps')->nullable();
            $table->string('hybrid_system')->nullable();
            $table->string('microgeneration_system')->nullable();
            $table->string('water_heatpumps_installation')->nullable();
            $table->string('biome_generators')->nullable();
            $table->string('solar_panel')->nullable();
            $table->string('solar_panel_use_winter')->nullable();
            $table->string('solar_panel_use_summer')->nullable();
            $table->string('solar_panel_use_water')->nullable();
            // project cost
            $table->string('total_acs_project_cost')->nullable();
            $table->string('total_cost_installations')->nullable();
            // effective cost
            $table->string('total_replacing_cost_1')->nullable();
            $table->string('total_replacing_cost_2')->nullable();
            $table->string('final_replacing_cost')->nullable();
            $table->string('replacing_energetic_savings')->nullable();
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
        Schema::table('vertical_walls', function (Blueprint $table) {
            $table->dropForeign(['practice_id']);
            $table->dropColumn('practice_id');
        });

        Schema::dropIfExists('vertical_walls');
    }
}
