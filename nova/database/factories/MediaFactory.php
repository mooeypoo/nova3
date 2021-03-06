<?php

use Faker\Generator as Faker;

$factory->define(Nova\Media\Media::class, function (Faker $faker) {
	$character = factory(Nova\Characters\Character::class)->create();

	return [
		'mediable_id' => $character->id,
		'mediable_type' => 'character',
		'filename' => Str::random().'.png',
		'mime_type' => 'image/png',
	];
});
