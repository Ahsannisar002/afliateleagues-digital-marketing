<?php

	use Illuminate\Database\Seeder;
	use Spatie\Permission\Models\Permission;
	use Spatie\Permission\Models\Role;
	use Spatie\Permission\PermissionRegistrar;

	class DatabaseSeeder extends Seeder
	{
		/**
		 * Seed the application's database.
		 *
		 * @return void
		 */
		public function run()
		{
			// Reset cached roles and permissions
			app()[PermissionRegistrar::class]->forgetCachedPermissions();

			$arrayOfPermissionNames = [
				'can approve documents',
				'can share balance with 0.025 percent fee',
				'can be an Exchanger',
				'can view its account',
			];
			$permissions = collect($arrayOfPermissionNames)->map(function ($permission) {
				return ['name' => $permission, 'guard_name' => 'web'];
			});
			Permission::insert($permissions->toArray());

			$arrayOfPermissionNames1 = [
				'can create admins',
				'create users',
				'update users',
				'delete users',
				'can change sponsor',
				'can change username',
				'create points',
				'can make user balance in minus',
				'send points without fee',
				'can share balance with 0.025 percent fee',
				'can approve documents',
				'can view super_admin dashboard',
			];
			$permissions1 = collect($arrayOfPermissionNames1)->map(function ($permission) {
				return ['name' => $permission, 'guard_name' => 'admin'];
			});

			Permission::insert($permissions1->toArray());

			$role = Role::create(['name' => 'super-admin', 'guard_name' => 'admin']);
			$role->givePermissionTo(Permission::where('guard_name', 'admin')->get());

			$role = Role::create(['name' => 'admin', 'guard_name' => 'admin'])
				->givePermissionTo(
					[
						'create users',
						'update users',
						'can change username',
						'can make user balance in minus',
						'can share balance with 0.025 percent fee',
						'can approve documents',
					]);
			$role = Role::create(['name' => 'partner'])
				->givePermissionTo(
					[
						'can share balance with 0.025 percent fee',
						'can approve documents',
					]
				);
			$role = Role::create(['name' => 'senior-director'])
				->givePermissionTo(
					[
						'can share balance with 0.025 percent fee',
						'can approve documents',
					]
				);
			$role = Role::create(['name' => 'director'])
				->givePermissionTo(
					[
						'can share balance with 0.025 percent fee',
						'can approve documents',
					]
				);
			$role = Role::create(['name' => 'general-manager'])
				->givePermissionTo(
					[
						'can share balance with 0.025 percent fee',
						'can approve documents',
					]
				);
			$role = Role::create(['name' => 'senior-manager'])
				->givePermissionTo(
					[
						'can share balance with 0.025 percent fee',
						'can approve documents',
					]
				);
			$role = Role::create(['name' => 'manager'])
				->givePermissionTo(
					[
						'can be an Exchanger'
					]
				);
			$role = Role::create(['name' => 'senior-officer'])
				->givePermissionTo(
					['can view its account']
				);
			$role = Role::create(['name' => 'officer'])
				->givePermissionTo(
					['can view its account']
				);
			$role = Role::create(['name' => 'struggling'])
				->givePermissionTo(
					['can view its account']
				);
			$this->call(
				[
					MembershipSeeder::class,
					PaymentGatewaySeeder::class,
					AdminSeeder::class,
					UserSeeder::class,
				]
			);
		}
	}
