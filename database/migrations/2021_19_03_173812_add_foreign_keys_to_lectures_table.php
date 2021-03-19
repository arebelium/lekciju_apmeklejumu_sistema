<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToLecturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('lectures', function(Blueprint $table)
		{
			$table->foreign('lecturer', 'lectures_ibfk_1')->references('id')->on('lectures')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('lectures', function(Blueprint $table)
		{
			$table->dropForeign('lectures_ibfk_1');
		});
	}

}
