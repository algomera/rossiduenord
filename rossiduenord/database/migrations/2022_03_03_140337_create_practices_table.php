<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePracticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practices', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('applicant_id')->unsigned();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade');
            $table->decimal('import', 10, 2, true )->nullable();
            $table->string('practical_phase')->nullable();
            $table->string('real_estate_type')->nullable();
            $table->string('month')->nullable();
            $table->string('year')->nullable();
            $table->string('policy_name')->nullable();
            $table->string('address')->nullable();
            $table->string('civic')->nullable();
            $table->string('common')->nullable();
            $table->string('province')->nullable();
            $table->string('region')->nullable();
            $table->string('cap')->nullable();
            $table->string('work_start')->nullable();
            $table->string('c_m')->nullable();
            $table->string('assev_tecnica')->nullable();
            $table->string('nominative')->nullable();
            $table->string('lastName')->nullable();
            $table->string('name')->nullable();
            $table->string('policy')->nullable();
            $table->string('request_policy')->nullable();
            $table->string('referent_email')->nullable();
            $table->text('description')->nullable();
            $table->string('bonus')->nullable();
            $table->string('month_processing')->nullable();
            $table->string('year_processing')->nullable();
            $table->string('sal')->nullable();
            $table->string('import_sal')->nullable();
            $table->text('note')->nullable();
            $table->string('practice_ok')->nullable();
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
        Schema::table('practices', function (Blueprint $table) {
            $table->dropForeign(['applicant_id']);
            $table->dropColumn('applicant_id');
        });

        Schema::dropIfExists('practices');
    }
}
