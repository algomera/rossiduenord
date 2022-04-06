<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicrogenerationSystemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microgeneration_systems', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->bigInteger('condomino_id')->unsigned()->nullable();
            $table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
            $table->boolean('is_common')->default(false);
            $table->text('tipo_sostituito')->nullable();
            $table->double('p_nom_sostituito')->nullable();
            $table->double('p_elettrica')->nullable();
            $table->double('p_immessa')->nullable();
            $table->double('p_term_recuperata')->nullable();
            $table->double('pes')->nullable();
            $table->text('tipo_di_alimentazione')->nullable();
            $table->text('tipo_intervento')->nullable();
            $table->text('a_celle_a_combustibile')->nullable();
            $table->text('riscaldatore_suppl')->nullable();
            $table->double('potenza_risc_suppl')->nullable();
            $table->float('efficienza_ns')->nullable();
            $table->text('classe_energ')->nullable();
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
        Schema::dropIfExists('microgeneration_systems');
    }
}
