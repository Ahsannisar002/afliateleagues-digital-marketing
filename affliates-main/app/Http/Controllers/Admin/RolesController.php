<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use App\RoleHasPermission;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;
	use Illuminate\View\View;
	use Spatie\Permission\Models\Permission;
	use Spatie\Permission\Models\Role;

	class RolesController extends Controller
	{
		use assignRolesAndPermissionsToUsers;

		/**
		 * Display a listing of the resource.
		 *
		 * @return Application|Factory|Response|View
		 */
		public function index()
		{
			$roles = Role::all();
			return view('Admin.roles.index', compact('roles'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Application|Factory|Response|View
		 */
		public function create()
		{
			return view('Admin.roles.create');
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param Request $request
		 * @return Response
		 * @throws ValidationException
		 */
		public function store(Request $request): Response
		{
			$data = $this->validator($request->all())->validate();
			Role::create(['name' => $data['name'], 'guard_name' => $data['guard_name']]);
			return redirect(route('roles.index'))->withToastSuccess('Role Created Successfully!');
		}

		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param array $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
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
			$permissions = Permission::all();
			$role = Role::findOrFail($id);
			$roleHasPermission = RoleHasPermission::where('role_id', $id)->get();
			return view('Admin.roles.show', compact(['permissions', 'role', 'roleHasPermission']));
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param int $id
		 * @return Application|Factory|Response|View
		 */
		public function edit($id)
		{
			$role = Role::findOrFail($id);
			return view('Admin.roles.edit', compact('role'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param int $id
		 * @return Response
		 * @throws ValidationException
		 */
		public function update(Request $request, int $id): Response
		{

			$role = Role::findOrFail($id);
			$data = $this->updateValidator($request->all())->validate();
			$role->update($data);
			return redirect(route('roles.index'))->withToastSuccess('Role Updated Successfully!');
		}

		protected function updateValidator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			$rules = [
				'name' => ['required', 'string', 'unique:roles', 'max:255', 'regex:/^[a-zA-Z0-9 ]*$/'],
				'guard_name' => ['required', 'string', 'max:255', 'in:web,admin', 'regex:/^([A-Za-z0-9\_]+)$/'],
			];
			return Validator::make($data, $rules);
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param int $id
		 * @return Response
		 */
		public function destroy($id): Response
		{
			$role = Role::findOrFail($id);
			$role->delete();
			return redirect(route('roles.index'))->withToastSuccess('Role with name ' . $role->name . ' have been deleted successfully.');
		}

		public function getRoleDetailsForDestroying(Request $request, Role $role)
		{
			$data = $request->all();
			$roleInfo = $role->where('id', $data['id'])->first();
			$array = ['name' => $roleInfo->name];
			return response()->json($array);
		}
	}
