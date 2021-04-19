<?php

	use App\Admin;
	use App\ModelHasRole;
	use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
		factory(Admin::class)->create()->each(function ($admin) {
			// User Role Seeder
			factory(ModelHasRole::class)->create(['role_id' => 1, 'model_type' => 'App\Admin', 'model_id' => $admin->id]);
//				$admin->assignRole(1);
		});
    }
}
