<?php

	use App\Balance;
	use App\ModelHasRole;
	use App\User;
	use App\UserMembership;
	use Illuminate\Database\Seeder;
	use Illuminate\Support\Facades\DB;

	class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		ini_set('memory_limit', '2048M');//allocate memory
		DB::disableQueryLog();//disable log
		factory(User::class, 10)->create()->each(function ($user) {

			// User Role Seeder
			factory(ModelHasRole::class)->create(['model_id' => $user->id]);

			// User Membership Seeder

			$membership = factory(UserMembership::class)->make();
			$user->membershipId()->save($membership);

			//User Balance Seeder

			$balance = factory(Balance::class)->make();
			$user->balance()->save($balance);
		});
    }
}
