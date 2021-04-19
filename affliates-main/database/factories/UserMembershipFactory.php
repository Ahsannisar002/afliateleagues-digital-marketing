<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\UserMembership;
	use Carbon\Carbon;
	use Faker\Generator as Faker;

$factory->define(UserMembership::class, function (Faker $faker) {
	return [
		'membership_id' => 1,
		'status' => 1,
	];
});
