<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\ModelHasRole;
use Faker\Generator as Faker;

$factory->define(ModelHasRole::class, function (Faker $faker) {
	return [
		'role_id' => 11,
		'model_type' => 'App\User',
		'model_id' => 2,
	];
});
