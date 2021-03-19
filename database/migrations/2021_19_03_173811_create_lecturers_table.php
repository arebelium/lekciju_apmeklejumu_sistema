<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLecturersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lecturers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name', 60);
			$table->string('last_name', 32);
			$table->string('email', 60)->unique();
			$table->string('password', 256);
			$table->timestamps();
            $table->rememberToken();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('lecturers');
	}

}
