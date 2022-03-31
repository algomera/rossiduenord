<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeatPumpsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heat_pumps', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->text('tipo_sostituito')->nullable();
            $table->double('p_nom_sostituito')->nullable();
            $table->text('tipo_di_pdc')->nullable();
            $table->text('tipo_roof_top')->nullable();
            $table->double('potenza_nominale')->nullable();
            $table->double('p_elettrica_assorbita')->nullable();
            $table->text('inverter')->nullable();
            $table->double('cop')->nullable();
            $table->text('reversibile')->nullable();
            $table->text('eer')->nullable();
            $table->text('sonde_geotermiche')->nullable();
            $table->text('sup_riscaldata_dalla_pdc')->nullable();
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
        Schema::dropIfExists('heat_pumps');
    }
}
