<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToVrCategoriesTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('vr_categories_translations', function(Blueprint $table)
		{
			$table->foreign('category_id', 'fk_vr_categories_translations_vr_categories1')->references('id')->on('vr_categories')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('language_id', 'fk_vr_categories_translations_vr_languages1')->references('id')->on('vr_languages')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('vr_categories_translations', function(Blueprint $table)
		{
			$table->dropForeign('fk_vr_categories_translations_vr_categories1');
			$table->dropForeign('fk_vr_categories_translations_vr_languages1');
		});
	}

}
