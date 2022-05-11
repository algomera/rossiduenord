<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsseveratorBusinessTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asseverator_business', function (Blueprint $table) {
            $table->bigInteger('asseverator_id')->unsigned();
            $table->foreign('asseverator_id')->references('id')->on('users')->onDelete('cascade');
            $table->bigInteger('business_id')->unsigned();
            $table->foreign('business_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('asseverator_business');

//        Schema::table('asseverator_business', function (Blueprint $table) {
//            $table->dropForeign(['business_id']);
//            $table->dropColumn('business_id');
//            $table->dropForeign(['asseverator_id']);
//            $table->dropColumn('asseverator_id');
//        });

    }
}
