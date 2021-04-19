<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PaymentGateway;
use Faker\Generator as Faker;

$factory->define(PaymentGateway::class, function (Faker $faker) {
	return array(
		'name' => 'Bank',
		'bank_name' => 'Meezan Bank',
		'bank_branch_code' => '0403',
		'account_holder_name' => 'Muhammad Umair Raza',
		'account_iban' => 'PKkajy9284ykjhf982357092384',
		'reference_number' => '03068497074'
	);
});
