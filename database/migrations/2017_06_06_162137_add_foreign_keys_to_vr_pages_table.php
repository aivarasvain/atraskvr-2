<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVrPagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vr_pages', function(Blueprint $table)
		{
			$table->foreign('category_id', 'fk_vr_pages_vr_categories')->references('id')->on('vr_categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vr_pages', function(Blueprint $table)
		{
			$table->dropForeign('fk_vr_pages_vr_categories');
		});
	}

}
