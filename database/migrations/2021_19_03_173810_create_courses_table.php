<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('courses', function(Blueprint $table)
        {
            $table->id();
            $table->string('name');
        });

    }

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('scheduled_lectures');
        Schema::drop('lectures');
        Schema::drop('students');
		Schema::drop('courses');
	}

}
