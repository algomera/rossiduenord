<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputoRowDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computo_row_details', function (Blueprint $table) {
            $table->id();
            $table->string('comment')->nullable();
            $table->string('expression')->nullable();
            $table->string('nps')->nullable();
            $table->string('length')->nullable();
            $table->string('width')->nullable();
            $table->string('hps')->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('computo_row_details');
    }
}
