<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCondominisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('condominis', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id')->unsigned();
            $table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('surname')->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('email')->unique()->nullable();;
            $table->string('cf')->nullable();
            $table->decimal('millesimi', 5, 3, true)->nullable();
            $table->string('foglio')->nullable();
            $table->string('part')->nullable();
            $table->string('sub')->nullable();
            $table->string('categ_catastale')->nullable();
            $table->decimal('sup_catastale', 10, 2, true)->nullable();
            // date beneficiary
            $table->string('type_beneficiary')->nullable();
            $table->string('possession_title')->nullable();
            $table->string('sex')->nullable()->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('nation_of_birth')->nullable();
            $table->string('common_of_birth')->nullable();
            $table->string('P_IVA')->nullable();
            // residence
            $table->string('address')->nullable();
            $table->string('CAP')->nullable();
            $table->string('common')->nullable();
            $table->string('prov')->nullable();
            $table->string('country')->nullable();
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
        Schema::dropIfExists('condominis');
    }
}
