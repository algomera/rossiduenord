<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBonusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonuses', function (Blueprint $table) {
            $table->id();
            $table->string('technical_report');
            $table->string('filed_common');
            $table->string('filed_province');
            $table->string('filed_date');
            $table->string('filed_protocol');     
            $table->string('technical_report_exclusion');
            $table->string('work_start');
            $table->string('end_of_works');
            $table->string('condominium_building');
            $table->string('building_unit');
            $table->string('relevance');
            $table->string('centralized_system');
            $table->string('single_family_property');
            $table->string('multi_family_property');
            $table->string('gross_surface_area');
            $table->string('np');
            $table->string('np_validated');
            $table->string('np_not_validated');
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
        Schema::dropIfExists('bonuses');
    }
}
