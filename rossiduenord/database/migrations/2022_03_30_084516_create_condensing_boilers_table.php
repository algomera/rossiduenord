<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondensingBoilersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condensing_boilers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->text('tipo_sostituito')->nullable();
            $table->double('p_nom_sostituito')->nullable();
            $table->double('potenza_nominale')->nullable();
            $table->float('rend_utile_nom')->nullable();
            $table->text('use_destination')->nullable();
            $table->float('efficienza_ns')->nullable();
            $table->float('efficienza_acs_nwh')->nullable();
            $table->text('tipo_di_alimentazione')->nullable();
            $table->text('classe_termo_evoluto')->nullable();
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
        Schema::dropIfExists('condensing_boilers');
    }
}
