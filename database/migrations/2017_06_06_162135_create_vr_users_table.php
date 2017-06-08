<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVrUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vr_users', function(Blueprint $table)
		{
			$table->string('id', 36)->unique('id');
			$table->integer('count', true);
			$table->timestamps();
			$table->softDeletes();
			$table->string('full_name')->nullable();
			$table->string('email')->nullable();
			$table->string('phone', 20)->nullable();
			$table->string('password', 45)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vr_users');
	}

}
