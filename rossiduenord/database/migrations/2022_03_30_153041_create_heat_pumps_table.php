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
            $table->bigInteger('condomino_id')->unsigned()->nullable();
            $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
            $table->boolean('is_common')->default(false);
            $table->text('tipo_sostituito')->nullable();
            $table->double('p_nom_sostituito')->nullable();
            $table->text('tipo_di_pdc')->nullable();
            $table->boolean('tipo_roof_top')->default(false)->nullable();
            $table->double('potenza_nominale')->nullable();
            $table->double('p_elettrica_assorbita')->nullable();
            $table->boolean('inverter')->default(false)->nullable();
            $table->double('cop')->nullable();
            $table->boolean('reversibile')->default(false)->nullable();
            $table->double('eer')->nullable();
            $table->boolean('sonde_geotermiche')->default(false)->nullable();
            $table->double('sup_riscaldata_dalla_pdc')->nullable();
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
