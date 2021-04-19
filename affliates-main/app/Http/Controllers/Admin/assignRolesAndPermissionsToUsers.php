<?php


	namespace App\Http\Controllers\Admin;


	use App\Admin;
	use App\User;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\Request;
	use Illuminate\View\View;
	use Spatie\Permission\Models\Permission;
	use Spatie\Permission\Models\Role;

	trait assignRolesAndPermissionsToUsers
	{
		/**
		 * Show the form for creating a new resource.
		 *
		 * @param $id
		 * @return Application|Factory|View|void
		 */
		public function showAssignPermission($id)
		{
			$role = Role::findOrFail($id);
			$permissions = Permission::where('guard_name', $role->guard_name)->get();
			return view('Admin.roles.assign', compact(['permissions', 'role']));
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param Request $request
		 * @return Application|Factory|View|void
		 */

		public function AssignPermission(Request $request)
		{
			$data = $request->all();
			$permission = Permission::findOrFail($data['permission_id']);
			$role = Role::findOrFail($data['role_id']);
			$permission->syncPermissions($role);
			return redirect(route('roles.index'))->withToastSuccess($role->name . 'has been assigned to Role' . $permission->name);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @param $id
		 * @return Application|Factory|View|void
		 */
		public function showAssignRole($id)
		{
			$permission = Permission::findOrFail($id);
			$roles = Role::where('guard_name', $permission->guard_name)->get();
			return view('Admin.permissions.assign', compact(['permission', 'roles']));
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param Request $request
		 * @return Application|Factory|View|void
		 */

		public function AssignRole(Request $request)
		{
			$data = $request->all();
			$role = Role::findOrFail($data['role_id']);
			$permission = Permission::findOrFail($data['permission_id']);
			$permission->assignRole($role);
			return redirect(route('permissions.index'))->withToastSuccess($permission->name . 'has been assigned to Role' . $role->name);
		}

		/**
		 * @param $id
		 * @return mixed
		 *
		 */
		public function showAssignRoleToUsersForm($id)
		{
			$user = User::findOrFail($id);
			$roles = Role::where('guard_name', 'web')->get();
			return view('Admin.users.assignRole', ['user' => $user, 'roles' => $roles]);
		}

		/**
		 * @param Request $request
		 * @return mixed
		 */

		public function assignRoleToUsers(Request $request)
		{
			$data = $request->validate([
				'user_id' => 'required|exists:users,id',
				'role_id' => 'required|exists:roles,id'
			]);
			$user = User::findOrFail($data['user_id']);
			$user->syncRoles($data['role_id']);
			return redirect(route('users.index'))->withToastSuccess('Role Assigned Successfully');
		}

		/**
		 * @param $id
		 * @return mixed
		 *
		 */
		public function showGivePermissionToUsersForm($id)
		{
			$user = User::findOrFail($id);
			$permissions = Permission::where('guard_name', 'web')->get();
			return view('Admin.users.givePermission', ['user' => $user, 'permissions' => $permissions]);
		}

		/**
		 * @param Request $request
		 * @return mixed
		 */

		public function givePermissionToUsers(Request $request)
		{
			$data = $request->validate([
				'user_id' => 'required|exists:users,id',
				'permission_id' => 'required|exists:permissions,id'
			]);
			$user = User::findOrFail($data['user_id']);
			$user->givePermissionTo($data['permission_id']);
			return redirect(route('users.index'))->withToastSuccess('Permission given to ' . $user->username . ' Successfully');
		}


		/**
		 * @param $id
		 * @return mixed
		 *
		 */
		public function showAssignRoleToAdminForm($id)
		{
			$admin = Admin::findOrFail($id);
			$roles = Role::where('guard_name', 'admin')->get();
			return view('Admin.assignRole', ['admin' => $admin, 'roles' => $roles]);
		}

		/**
		 * @param Request $request
		 * @return mixed
		 */

		public function assignRoleToAdmin(Request $request)
		{
			$data = $request->validate([
				'admin_id' => 'required|exists:admins,id',
				'role_id' => 'required|exists:roles,id'
			]);
			$admin = Admin::findOrFail($data['admin_id']);
			$admin->syncRoles($data['role_id']);
			return redirect(route('admins.index'))->withToastSuccess('Role Assigned Successfully');
		}

		/**
		 * @param $id
		 * @return mixed
		 *
		 */
		public function showGivePermissionToAdminForm($id)
		{
			$admin = Admin::findOrFail($id);
			$permissions = Permission::where('guard_name', 'admin')->get();
			return view('Admin.givePermission', ['admin' => $admin, 'permissions' => $permissions]);
		}

		/**
		 * @param Request $request
		 * @return mixed
		 */

		public function givePermissionToAdmin(Request $request)
		{
			$data = $request->validate([
				'admin_id' => 'required|exists:admins,id',
				'permission_id' => 'required|exists:permissions,id'
			]);
			$admin = Admin::findOrFail($data['admin_id']);
			$admin->givePermissionTo($data['permission_id']);
			return redirect(route('admins.index'))->withToastSuccess('Permission given to user Successfully');
		}
	}