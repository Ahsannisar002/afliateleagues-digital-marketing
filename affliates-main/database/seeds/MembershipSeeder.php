<?php

	use App\Membership;
	use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(Membership::class)->create();
		factory(Membership::class)->create(['name' => 'challenge_acceptance', 'price' => 15, 'fee' => 10]);
		factory(Membership::class)->create(['name' => 'challenge_booster', 'price' => 50, 'fee' => 10]);
		factory(Membership::class)->create(['name' => 'challenge_runner', 'price' => 90, 'fee' => 10]);
    }
}
