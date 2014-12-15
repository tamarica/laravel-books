<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBookTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('user_book', function(Blueprint $table)
        {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('book_id');
            $table->integer('rank');
            $table->string('comments');
            $table->integer('is_public');
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
		//
	}

}
