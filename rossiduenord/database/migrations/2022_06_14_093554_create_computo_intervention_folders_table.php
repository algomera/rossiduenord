<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputoInterventionFoldersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computo_intervention_folders', function (Blueprint $table) {
            $table->id();
	        $table->bigInteger('parent_id')->nullable()->unsigned();
	        $table->foreign('parent_id')->references('id')->on('computo_intervention_folders')->onDelete('cascade');
			$table->string('name')->nullable();
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
        Schema::dropIfExists('computo_intervention_folders');
    }
}
