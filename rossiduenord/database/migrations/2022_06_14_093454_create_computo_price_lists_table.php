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
	        $table->bigInteger('parent_id')->nullable()->unsigned();
	        $table->foreign('parent_id')->references('id')->on('computo_price_lists')->onDelete('cascade');
	        $table->string('code')->nullable();
			$table->string('name');
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
