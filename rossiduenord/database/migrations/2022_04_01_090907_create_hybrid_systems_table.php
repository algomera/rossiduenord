<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHybridSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hybrid_systems', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->bigInteger('condomino_id')->unsigned()->nullable();
            $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
            $table->text('tipo_sostituito')->nullable();
            $table->double('p_nom_sostituito')->nullable();
            $table->double('condensing_potenza_nominale')->nullable();
            $table->float('condensing_rend_utile_nom')->nullable();
            $table->float('condensing_efficienza_ns')->nullable();
            $table->text('tipo_di_alimentazione')->nullable();
            $table->text('heat_tipo_di_pdc')->nullable();
            $table->text('heat_tipo_roof_top')->nullable();
            $table->double('heat_potenza_nominale')->nullable();
            $table->double('heat_p_elettrica_assorbita')->nullable();
            $table->text('heat_inverter')->nullable();
            $table->double('heat_cop')->nullable();
            $table->text('heat_sonde_geotermiche')->nullable();
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
        Schema::dropIfExists('hybrid_systems');
    }
}
