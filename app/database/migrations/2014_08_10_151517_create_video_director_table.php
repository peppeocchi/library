<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideoDirectorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('videos_directors', function($table)
		{
			$table->increments('id');
			$table->integer('video_id');
			$table->integer('director_id');
			$table->foreign('video_id')->references('id')->on('videos');
			$table->foreign('director_id')->references('id')->on('directors');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('video_director');
	}

}
