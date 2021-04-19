<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use App\RoleHasPermission;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;
	use Illuminate\View\View;
	use Spatie\Permission\Models\Permission;
	use Spatie\Permission\Models\Role;

	class PermissionsController extends Controller
	{

		use assignRolesAndPermissionsToUsers;

		/**
		 * Display a listing of the resource.
		 *
		 * @return Application|Factory|Response|View
		 */
		public function index()
		{
			$permissions = Permission::all();
			return view('Admin.permissions.index', compact('permissions'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Application|Factory|Response|View
		 */
		public function create()
		{
			return view('Admin.permissions.create');
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param Request $request
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function store(Request $request): RedirectResponse
		{
			$data = $this->validator($request->all())->validate();
			Permission::create(['name' => $data['name'], 'guard_name' => $data['guard_name']]);
			return redirect(route('permissions.index'))->withToastSuccess('Permission Created Successfully!');
		}

		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param array $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data)
		{
			return Validator::make($data, [
				'name' => ['required', 'string', 'unique:roles', 'max:255', 'regex:/^[a-zA-Z0-9 ]*$/'],
				'guard_name' => ['required', 'string', 'max:255', 'in:web,admin', 'regex:/^([A-Za-z0-9\_]+)$/'],
			]);
		}

		/**
		 * Display the specified resource.
		 *
		 * @param int $id
		 * @return Application|Factory|Response|View
		 */
		public function show(int $id)
		{
			$permission = Permission::findOrFail($id);
			$roles = Role::all();
			$roleHasPermission = RoleHasPermission::where('permission_id', $id)->get();
			return view('Admin.permissions.show', compact(['permission', 'roles', 'roleHasPermission']));
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param int $id
		 * @return Application|Factory|Response|View
		 */
		public function edit(int $id)
		{
			$permission = Permission::findOrFail($id);
			return view('Admin.permissions.edit', compact('permission'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param int $id
		 * @return Response
		 * @throws ValidationException
		 */
		public function update(Request $request, int $id)
		{

			$role = Permission::findOrFail($id);
			$data = $this->updateValidator($request->all())->validate();
			$role->update($data);
			return redirect(route('permissions.index'))->withToastSuccess('Permission Updated Successfully!');
		}



		/**
		 * Remove the specified resource from storage.
		 *
		 * @param int $id
		 * @return Response
		 */
		public function destroy(int $id)
		{
			$permissions = Permission::findOrFail($id);
			$permissions->delete();
			return redirect(route('permissions.index'))->withToastSuccess('Permission with name ' . $permissions->name . ' have been deleted successfully.');
		}

		public function getPermissionDetailsForDestroying(Request $request, Permission $permission)
		{
			$data = $request->validate([
				'id' => ['required', 'numeric', 'exists:permissions,id']
			]);
			$permissionInfo = $permission->where('id', $data['id'])->first();
			$array = ['name' => $permissionInfo->name];
			return response()->json($array);
		}
	}
