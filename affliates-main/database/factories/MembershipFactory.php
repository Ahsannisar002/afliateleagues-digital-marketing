<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Membership;
use Faker\Generator as Faker;

$factory->define(Membership::class, function (Faker $faker) {
	return [
		'name' => 'Starter',
		'price' => 0,
		'fee' => 0,
	];
});
