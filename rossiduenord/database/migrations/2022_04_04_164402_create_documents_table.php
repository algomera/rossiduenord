<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('folder_id')->unsigned();
            $table->foreign('folder_id')->references('id')->on('folder__documents')->onDelete('cascade');
            $table->string('number')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->string('role')->nullable();
            $table->string('N_id')->nullable();
            $table->string('note')->nullable();
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
        Schema::dropIfExists('documents');
    }
}
