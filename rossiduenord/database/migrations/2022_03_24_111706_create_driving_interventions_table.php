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
            $table->boolean('thermical_isolation_intervention')->default(false)->nullable();
            $table->string('start_date_payment')->nullable();
            $table->string('total_vertical_walls')->nullable();
            $table->string('vw_realized_1')->nullable();
            $table->string('vw_realized_2')->nullable();
            $table->string('vw_sal_f')->nullable();
            $table->string('total_intervention_surface')->nullable();
            $table->string('total_expected_cost')->nullable();
            $table->string('max_possible_cost')->nullable();
            $table->string('total_isolation_cost_1')->nullable();
            $table->string('total_isolation_cost_2')->nullable();
            $table->string('final_isolation_cost')->nullable();
            $table->string('dispersing_covers')->nullable();
            $table->string('isolation_energetic_savings')->nullable();
            $table->boolean('winter_acs_replacing')->default(false)->nullable();
            $table->string('total_power')->nullable();
            $table->string('generators')->nullable();
            $table->boolean('use_winter')->default(false)->nullable();
            $table->boolean('use_summer')->default(false)->nullable();
            $table->boolean('use_water')->default(false)->nullable();
            $table->string('total_acs_project_cost')->nullable();
            $table->string('total_cost_installations')->nullable();
            $table->string('total_replacing_cost_1')->nullable();
            $table->string('total_replacing_cost_2')->nullable();
            $table->string('final_replacing_cost')->nullable();
            $table->string('replacing_energetic_savings')->nullable();
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
