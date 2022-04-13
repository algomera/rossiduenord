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
            $table->bigInteger('sub_folder_id')->unsigned();
            $table->foreign('sub_folder_id')->references('id')->on('sub_folders')->onDelete('cascade');
            $table->string('role')->nullable();
            $table->string('allega')->nullable();
            $table->string('status')->nullable();
            $table->string('description')->nullable();
            $table->string('note')->nullable();
            $table->string('type')->nullable();
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
