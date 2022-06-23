<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondensingHotAirGeneratorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condensing_hot_air_generators', function (Blueprint $table) {
            $table->id();
	        $table->bigInteger('practice_id')->unsigned();
	        $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
	        $table->bigInteger('condomino_id')->unsigned()->nullable();
	        $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
	        $table->boolean('is_common')->default(false);
	        $table->string('tipo_sostituito')->nullable();
	        $table->double('p_nom_sostituito')->nullable();
	        $table->double('potenza_nominale')->nullable();
	        $table->double('rend_utile_nom')->nullable();
	        $table->string('tipo_di_alimentazione')->nullable();
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
        Schema::dropIfExists('condensing_hot_air_generators');
    }
}