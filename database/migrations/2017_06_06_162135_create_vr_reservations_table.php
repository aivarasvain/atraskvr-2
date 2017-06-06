<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVrReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vr_reservations', function(Blueprint $table)
		{
			$table->string('id', 36)->unique('id');
			$table->integer('count', true);
			$table->timestamps();
			$table->softDeletes();
			$table->string('time')->nullable();
			$table->string('order_id', 36)->nullable()->index('fk_vr_reservations_vr_orders1_idx');
			$table->string('page_id', 36)->nullable()->index('fk_vr_reservations_vr_pages1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vr_reservations');
	}

}
