<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurfacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surfaces', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->string('type')->nullable();
            $table->string('description_surface')->nullable();
            $table->decimal('surface', 7, 2, true)->nullable();
            $table->decimal('trasm_ante', 5, 2, true)->nullable();
            $table->decimal('trasm_post', 5, 2, true)->nullable();
            $table->decimal('trasm_term', 5, 2, true)->nullable();
            $table->string('confine')->nullable();
            $table->string('insulation')->nullable();
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
        Schema::dropIfExists('surfaces');
    }
}
