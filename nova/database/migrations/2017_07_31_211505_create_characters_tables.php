<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCharactersTables extends Migration
{
	public function up()
	{
		Schema::create('characters', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedInteger('rank_id')->nullable();
			$table->unsignedInteger('user_id')->nullable();
			$table->string('name')->nullable();
			$table->unsignedTinyInteger('status')->default(Status::PENDING);
			$table->timestamps();
			$table->softDeletes();

			$table->foreign('rank_id')->references('id')->on('ranks');
			$table->foreign('user_id')->references('id')->on('users');
			// $table->foreign('position_id')->references('id')->on('positions');
		});

		Schema::create('characters_positions', function (Blueprint $table) {
			$table->bigIncrements('id');
			$table->unsignedInteger('character_id');
			$table->unsignedInteger('position_id');
			$table->unsignedTinyInteger('primary')->default((int) false);
		});
	}

	public function down()
	{
		Schema::dropIfExists('characters_positions');
		Schema::dropIfExists('characters');
	}
}
