<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolarPanelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solar_panels', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->bigInteger('condomino_id')->unsigned()->nullable();
            $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
            $table->boolean('is_common')->default(false);
            $table->double('sup_lorda_singolo_modulo')->nullable();
            $table->integer('num_moduli')->nullable();
            $table->double('sup_totale')->nullable();
            $table->text('certificazione_solar_keymark')->nullable();
            $table->text('tipo_di_collettori')->nullable();
            $table->text('tipo_di_installazione')->nullable();
            $table->float('inclinazione')->nullable();
            $table->text('orientamento')->nullable();
            $table->text('impianto_factory_made')->nullable();
            $table->double('q_col_q_sol')->nullable();
            $table->double('ql')->nullable();
            $table->double('accumulo_in_litri')->nullable();
            $table->text('destinazione_calore')->nullable();
            $table->text('tipo_impianto_integrato_o_sostituito')->nullable();
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
        Schema::dropIfExists('solar_panels');
    }
}
