<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVrPagesResourcesConnectionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vr_pages_resources_connection', function(Blueprint $table)
		{
			$table->integer('count', true);
			$table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->string('page_id', 36)->nullable()->index('fk_vr_pages_resources_connection_vr_pages1_idx');
			$table->string('resource_id', 36)->nullable()->index('fk_vr_pages_resources_connection_vr_resources1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vr_pages_resources_connection');
	}

}
