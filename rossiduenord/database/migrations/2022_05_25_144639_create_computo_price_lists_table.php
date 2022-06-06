<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputoPriceListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computo_price_lists', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('computo_sub_folder_id')->unsigned();
            $table->foreign('computo_sub_folder_id')->references('id')->on('computo_sub_folders')->onDelete('cascade');
            $table->string('e_p')->nullable();
            $table->text('description')->nullable();
            $table->text('description_extended')->nullable();
            $table->text('description_complete')->nullable();
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
        Schema::dropIfExists('computo_price_lists');
    }
}
