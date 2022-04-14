<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnagraficheTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anagrafiche', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->enum('subject_type', config('anagrafiche.subject_types'))->nullable();
            $table->text('company_name')->nullable();
            $table->text('first_name')->nullable();
            $table->text('last_name')->nullable();
            $table->enum('consultant_type', config('anagrafiche.consultant_types'))->nullable();
            $table->text('address')->nullable();
            $table->text('zip')->nullable();
            $table->text('city')->nullable();
            $table->text('province')->nullable();
            $table->text('iban')->nullable();
            $table->text('vat')->nullable();
            $table->text('fiscal_code')->nullable();
            $table->text('phone_1')->nullable();
            $table->text('phone_2')->nullable();
            $table->text('fax')->nullable();
            $table->text('mobile')->nullable();
            $table->text('email_1')->nullable();
            $table->text('email_2')->nullable();
            $table->text('email_pec_1')->nullable();
            $table->text('email_pec_2')->nullable();
            $table->text('ticket_code')->nullable();
            $table->text('date_of_birth')->nullable();
            $table->text('common_of_birth')->nullable();
            $table->text('province_of_birth')->nullable();
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
        Schema::dropIfExists('anagrafiche');
    }
}
