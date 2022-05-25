<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('price_lists', function (Blueprint $table) {
            $table->id();
            $table->string('list')->nullable();
            $table->string('e_p')->nullable();
            $table->text('description')->nullable();
            $table->text('description_extended')->nullable();
            $table->text('description_complete')->nullable();
            $table->string('prog_ragg')->nullable();
            $table->string('u_m')->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('work', 8, 2)->nullable();
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
        Schema::dropIfExists('price_lists');
    }
}
