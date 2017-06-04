<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVrPagesTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('vr_pages_translations', function(Blueprint $table)
		{
			$table->string('id', 36)->unique('id');
			$table->integer('count', true);
			$table->timestamps();
			$table->softDeletes();
			$table->string('page_id', 36)->index('fk_vr_pages_translations_vr_pages1_idx');
			$table->string('language_id', 36)->index('fk_vr_pages_translations_vr_languages1_idx');
			$table->string('title')->nullable();
			$table->text('description_short', 65535)->nullable();
			$table->text('description_long', 65535)->nullable();
			$table->string('slug')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('vr_pages_translations');
	}

}
