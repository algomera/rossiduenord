<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            // general contractor
            $table->string('general_contractor')->nullable();
            $table->string('construction_company')->nullable();
            $table->string('hydrothermal_sanitary_company')->nullable();
            $table->string('photovoltaic_company')->nullable();
            $table->string('technician_APE_Ante')->nullable();
            $table->string('technician_energy_efficient')->nullable();
            $table->string('technician_APE_Post')->nullable();
            $table->string('structural_engineer')->nullable();
            // tencnico computo merico
            $table->string('metric_calc_technician')->nullable();
            $table->string('work_director')->nullable();
            $table->string('technical_assev')->nullable();
            $table->string('fiscal_assev')->nullable();
            //cessionario credito fiscale
            $table->string('phiscal_transferee')->nullable();
            //banca finanziatrice
            $table->string('lending_bank')->nullable();
            // assicuratore
            $table->string('insurer')->nullable();
            // consulente
            $table->string('consultant')->nullable();
            // segnalatore
            $table->string('signaler')->nullable();
            $table->string('area_manager')->nullable();
            $table->string('project_manager')->nullable();
            $table->string('responsible_technician')->nullable();
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
        Schema::table('subjects', function (Blueprint $table) {
            $table->dropForeign(['practice_id']);
            $table->dropColumn('practice_id');
        });

        Schema::dropIfExists('subjects');
    }
}
