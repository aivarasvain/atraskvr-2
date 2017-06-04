<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVrUsersRolesConnectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vr_users_roles_connection', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('user_id', 36)->nullable()->index('fk_vr_users_roles_connection_vr_users1_idx');
			$table->string('role_id', 36)->nullable()->index('fk_vr_users_roles_connection_vr_roles1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vr_users_roles_connection');
	}

}
