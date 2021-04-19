<?php

	use App\PaymentGateway;
	use Illuminate\Database\Seeder;

class PaymentGatewaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(PaymentGateway::class)->create(
			[
				'name' => 'Bank',
				'bank_name' => 'UBL Bank',
				'bank_branch_code' => '0403',
				'account_holder_name' => 'Muhammad Umair Raza',
				'account_iban' => 'PK097809845907809809809',
				'reference_number' => '03068497074'
			]
		);
    }
}
