<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateTowedInterventionsTable extends Migration
	{
		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up() {
			Schema::create('towed_interventions', function (Blueprint $table) {
				$table->id();
				$table->bigInteger('practice_id')->unsigned();
				$table->foreign('practice_id')->references('id')->on('practices')->onDelete('cascade');
				$table->bigInteger('condomino_id')->unsigned()->nullable();
				$table->foreign('condomino_id')->references('id')->on('condominis')->onDelete('cascade');
				$table->boolean('is_common')->default(false);
				$table->boolean('thermical_isolation_intervention')->default(false)->nullable();
				$table->text('total_vertical_walls')->nullable();
				$table->text('vw_realized_1')->nullable();
				$table->text('vw_realized_2')->nullable();
				$table->text('total_intervention_surface')->nullable();
				$table->float('total_expected_cost')->nullable();
				$table->float('expected_project_cost')->nullable();
				//            $table->text('fixture_replacing_intervention')->nullable();
				$table->float('in_project_cost')->nullable();
				$table->float('in_max_cost')->nullable();
				$table->text('in_energetic_savings')->nullable();
				//            $table->text('SS')->nullable();
				$table->float('ss_project_cost')->nullable();
				$table->float('ss_max_cost')->nullable();
				$table->text('ss_energetic_savings')->nullable();
				$table->boolean('wacs_replacement')->default(false)->nullable();
				$table->float('sa_project_cost')->nullable();
				$table->float('sa_max_cost')->nullable();
				$table->text('sa_energetic_savings')->nullable();
				//CO
				$table->float('co_project_cost')->nullable();
				$table->float('co_max_cost')->nullable();
				$table->text('co_energetic_savings')->nullable();
				//IB
				$table->float('ib_project_cost')->nullable();
				$table->float('ib_max_cost')->nullable();
				$table->text('ib_energetic_savings')->nullable();
				//BA
				$table->boolean('ba')->default(false)->nullable();
				$table->text('ba_winter_acs')->nullable();
				$table->text('ba_summer_acs')->nullable();
				$table->text('ba_hot_water_production')->nullable();
				$table->text('ba_usable_area')->nullable();
				$table->float('ba_project_cost')->nullable();
				$table->float('ba_max_cost')->nullable();
				$table->text('ba_energetic_savings')->nullable();
				//DESTINATION
				$table->boolean('use_winter')->default(false)->nullable();
				$table->boolean('use_summer')->default(false)->nullable();
				$table->boolean('use_water')->default(false)->nullable();
				//ST
				$table->float('st_project_cost')->nullable();
				$table->float('st_max_cost')->nullable();
				$table->text('st_energetic_savings')->nullable();
				//FV
				$table->boolean('fv')->default(false)->nullable();
				$table->text('fv_pod_code')->nullable();
				$table->text('fv_max_power')->nullable();
				$table->float('fv_project_cost')->nullable();
				$table->float('fv_max_cost')->nullable();
				//AC
				$table->boolean('ac')->default(false)->nullable();
				$table->text('ac_capacity')->nullable();
				$table->float('ac_project_cost')->nullable();
				$table->float('ac_max_cost')->nullable();
				//CR
				$table->boolean('cr')->default(false)->nullable();
				$table->float('cr_project_cost')->nullable();
				$table->text('cr_installed_columns')->nullable();
				$table->float('cr_max_cost')->nullable();
				//EBA
				$table->boolean('eba')->default(false)->nullable();
				$table->float('eba_project_cost')->nullable();
				$table->float('eba_sismic_cost')->nullable();
				$table->float('eba_barr_deleting_cost')->nullable();
				$table->float('eba_max_cost')->nullable();
				$table->timestamps();
			});
		}

		/**
		 * Reverse the migrations.
		 *
		 * @return void
		 */
		public function down() {
			Schema::dropIfExists('towed_interventions');
		}
	}
