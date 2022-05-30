<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComputoDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('computo_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('practice_id');
            $table->integer('type_intervetion_id');
            $table->integer('category_intervention_id');
            $table->string('prezziario')->nullable();
            $table->string('e_p');
            $table->text('description');
            $table->string('prog_ragg')->nullable();
            $table->string('u_m');
            $table->decimal('quantity', 10, 3);
            $table->decimal('price_un', 10, 2)->nullable();
            $table->decimal('discount', 10, 2)->nullable()->default(0.00);
            $table->decimal('total_price', 10, 2);
            $table->decimal('mat', 10, 2)->nullable();
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
        Schema::dropIfExists('computo_details');
    }
}
