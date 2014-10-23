<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBannersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banners', function($table) {
			$table->increments('id');
			$table->string('url');
			$table->text('content');
			$table->integer('views')->default(0);
			$table->integer('clicks')->default(0);
			$table->integer('max_views')->default(0);
			$table->timestamp('begin_on')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->timestamp('end_on')->nullable()->default(null);
			$table->string('banner_place');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('banners');
	}

}
