<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDrivingInterventionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('driving_interventions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            // thermical isolation intervention
            $table->boolean('thermical_isolation_intervention')->default(false)->nullable();
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
            $table->boolean('winter_acs_replacing')->default(false)->nullable();
            $table->string('total_power')->nullable();
            $table->string('generators')->nullable();
            // equipment
            $table->boolean('condensing_boiler')->default(false)->nullable();
            $table->boolean('heat_pump')->default(false)->nullable();
            $table->boolean('absorption_heat_pump')->default(false)->nullable();
            $table->boolean('hybrid_system')->default(false)->nullable();
            $table->boolean('microgeneration_system')->default(false)->nullable();
            $table->boolean('water_heatpumps_installation')->default(false)->nullable();
            $table->boolean('biome_generator')->default(false)->nullable();
            $table->boolean('solar_panel')->default(false)->nullable();
            $table->boolean('solar_panel_use_winter')->default(false)->nullable();
            $table->boolean('solar_panel_use_summer')->default(false)->nullable();
            $table->boolean('solar_panel_use_water')->default(false)->nullable();
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
        Schema::table('driving_interventions', function (Blueprint $table) {
            $table->dropForeign(['practice_id']);
            $table->dropColumn('practice_id');
        });

        Schema::dropIfExists('driving_interventions');
    }
}
