<?php

	namespace App\Http\Controllers\Admin;

	use App\Balance;
	use App\Http\Controllers\Controller;
	use App\User;
	use App\UserMembership;
	use App\Withdraw;
	use Carbon\Carbon;
	use Illuminate\Auth\Events\Registered;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Routing\Redirector;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;
	use Illuminate\View\View;
	use Spatie\Permission\Models\Permission;

	class UserController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return Application|Factory|Response|View
		 */
		public function index(User $user)
		{
			$users = $user->orderBy('id', 'desc')->paginate(25);
			return view('Admin.users.index', ['users' => $users]);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Application|Factory|Response|View
		 */
		public function create()
		{
			return view('Admin.users.create');
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param Request $request
		 * @return mixed
		 * @throws ValidationException
		 */
		public function store(Request $request)
		{
			$data = $this->validator($request->all())->validate();
			$user = User::create([
				'account_id' => mt_rand(100000000000000, 9999999999999999),
				'username' => $data['username'],
				'name' => $data['name'],
				'email' => $data['email'],
				'sponsor' => $data['sponsor'],
				'password' => Hash::make($data['password']),
			]);
			Balance::create([
				'user_id' => $user->id,
			]);
			UserMembership::create([
				'user_id' => $user->id,
				'membership_id' => 1,
				'expires_at' => Carbon::today()->addCentury()
			]);
			$user->assignRole(11);
			event(new Registered($user));
			return redirect(route('users.index'))->withToastSuccess('User Created Successfully!');
		}

		/**
		 * Get a validator for an incoming registration request.
		 *
		 * @param array $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			$message = [
				'username.regex' => 'Username should only contain alphabets,numbers and underscores',
			];
			return Validator::make($data, [
				'username' => ['required', 'string', 'max:255', 'unique:users', 'regex:/^([A-Za-z0-9\_]+)$/'],
				'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z0-9 ]*$/'],
				'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
				'sponsor' => ['required', 'numeric', 'exists:users,account_id'],
				'password' => ['required', 'string', 'min:8', 'confirmed'],
			], $message);
		}

		/**
		 * Display the specified resource.
		 *
		 * @param int $id
		 * @return Application|Factory|Response|View
		 */
		public function show(int $id)
		{
			$user = User::findOrFail($id);
			$transactions = $user->transactions()->paginate(15);
			$permissions = Permission::where('guard_name', 'web')->get();
			$users = User::where('sponsor', $user->account_id)->get();
			return view('Admin.users.show', ['user' => $user, 'permissions' => $permissions, 'users' => $users, 'transactions' => $transactions]);
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param int $id
		 * @return Application|Factory|Response|View
		 */
		public function edit(int $id)
		{
			$user = User::findOrFail($id);
			return view('Admin.users.edit', compact('user'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param int $id
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function update(Request $request, int $id): RedirectResponse
		{
			$user = User::findOrFail($id);
			$validData = $this->updateValidator($request->all())->validate();

			if ($request->username !== null) {
				$data['username'] = $validData['username'];
			}
			if ($request->name !== null) {
				$data['name'] = $validData['name'];
			}
			if ($request->date_of_birth !== null) {
				$data['date_of_birth'] = $validData['date_of_birth'];
			}
			if ($request->phone !== null) {
				$data['phone'] = $validData['phone'];
			}
			if ($request->gender !== null) {
				$data['gender'] = $validData['gender'];
			}
			if ($request->postalcode !== null) {
				$data['postalcode'] = $validData['postalcode'];
			}
			$data['password'] = $user->password;
			if ($request->password !== null) {
				$data['password'] = Hash::make($validData['password']);
			}
			if ($request->status !== null) {
				$data['status'] = $validData['status'];
			}
			if (current_admin()->getRoleNames()[0] == 'super-admin') {
				$data['sponsor'] = $validData['sponsor'];
			} else {
				$data['sponsor'] = $user->sponsor;
			}
			if ($request->country !== null) {
				$data['country'] = $validData['country'];
			}
			if ($request->state !== null) {
				$data['state'] = $validData['state'];
			}
			if ($request->city !== null) {
				$data['city'] = $validData['city'];
			}
			if ($request->address !== null) {
				$data['address'] = $validData['address'];
			}


			$user->update($data);
			return redirect(route('users.index'))->withToastSuccess('User Updated Successfully!');
		}

		protected function updateValidator(array $data)
		{
			$rules = [
				'username' => ['Nullable', 'string', 'max:255', 'regex:/^([A-Za-z0-9.\_]+)$/'],
				'name' => ['Nullable', 'string', 'max:255', 'regex:/^[a-zA-Z0-9. ]*$/'],
				'date_of_birth' => ['before:today'],
				'phone' => ['Nullable', 'regex:/^03[0-9]{9}$/'],
				'gender' => ['Nullable', 'in:male,female,other'],
				'postalcode' => ['Nullable', 'numeric'],
				'password' => ['Nullable'],
				'status' => ['Nullable', 'in:0, 1, 2, 3'],
				'sponsor' => ['Nullable', 'numeric', 'exists:users,account_id'],
				'country' => ['Nullable', 'regex:/^[a-zA-Z0-9 ]*$/', 'string'],
				'state' => ['Nullable', 'regex:/^[a-zA-Z0-9 ]*$/', 'string'],
				'city' => ['Nullable', 'regex:/^[a-zA-Z0-9 ]*$/', 'string'],
				'address' => ['Nullable', 'string'],
			];
			$message = [
				'country.regex' => 'Country should only contain alphabets, spaces and numbers.',
				'city.regex' => 'City should only contain alphabets, spaces and numbers.',
				'state.regex' => 'State should only contain alphabets, spaces and numbers.',
			];

			return Validator::make($data, $rules, $message);
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param int $id
		 * @return Application|RedirectResponse|Response|Redirector
		 */
		public function destroy($id)
		{
			$user = User::findOrFail($id);
			$user->delete();
			return redirect(route('users.index'))->withToastSuccess('User with username ' . $user->username . ' deleted successfully.');
		}

		/**
		 * @param Request $request
		 * @param User $user
		 * @return JsonResponse
		 */

		public function getUserDetailsForDestroying(Request $request, User $user): JsonResponse
		{
			$data = $request->all();
			$userInfo = $user->where('id', $data['id'])->first();
			$array = ['username' => $userInfo->username, 'name' => $userInfo->name];
			return response()->json($array);
		}

	}
