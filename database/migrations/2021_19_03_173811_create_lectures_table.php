<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLecturesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('lectures', function(Blueprint $table)
		{
			$table->id();
			$table->string('name');
		});

        Schema::create('scheduled_lectures', function(Blueprint $table)
        {
            $table->id();
            $table->date('date');
            $table->time('start_at');
            $table->time('end_at');
            $table->foreignId('lecture_id')->constrained()->onDelete('cascade');
            $table->foreignId('course_id')->constrained()->onDelete('cascade');
            $table->foreignId('lecturer_id')->constrained()->onDelete('cascade');
        });
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{

	}

}
