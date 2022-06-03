<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuildingAutomationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_automations', function (Blueprint $table) {
            $table->id();
	        $table->bigInteger('practice_id')->unsigned();
	        $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
	        $table->bigInteger('condomino_id')->unsigned()->nullable();
	        $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
	        $table->boolean('is_common')->default(false);
	        $table->text('ba_winter_acs')->nullable();
	        $table->text('ba_summer_acs')->nullable();
	        $table->text('ba_hot_water_production')->nullable();
	        $table->text('ba_usable_area')->nullable();
	        $table->text('ba_project_cost')->nullable();
	        $table->text('ba_max_cost')->nullable();
	        $table->text('ba_energetic_savings')->nullable();
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
        Schema::dropIfExists('building_automations');
    }
}
