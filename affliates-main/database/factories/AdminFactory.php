<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Admin;
use Faker\Generator as Faker;

$factory->define(Admin::class, function (Faker $faker) {
	return [
		'username' => 'superAdmin',
		'name' => 'Muhammad Umair Raza',
		'email' => 'umairparacha0047@gmail.com',
		'status' => 1,
		'password' => '$2y$10$MzVmlnfp9BWBKmHreNrX6ObdD6CY11sFnTnkTiFyAFxwSuNYhTrE.',
	];
});
