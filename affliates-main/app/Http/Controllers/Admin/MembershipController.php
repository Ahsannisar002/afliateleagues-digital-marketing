<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use App\Membership;
	use Exception;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;
	use Illuminate\View\View;

	class MembershipController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return View
		 */
		public function index(): View
		{
			$memberships = Membership::all();
			return view('Admin.memberships.index', compact('memberships'));
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Application|Factory|Response|View
		 */
		public function create()
		{
			return view('Admin.memberships.create');
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
				'name' => ['required', 'string'],
				'price' => ['required', 'numeric',],
				'fee' => ['required', 'numeric',],
			]);
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param Request $request
		 * @return Response
		 */
		public function store(Request $request)
		{
			$data = $this->validator($request->all())->validate();
			Membership::create(['name' => $data['name'], 'price' => $data['price'], 'fee' => $data['fee']]);
			return redirect(route('memberships.index'))->withToastSuccess('Membership Created Successfully!');
		}

		/**
		 * Display the specified resource.
		 *
		 * @param Membership $membership
		 * @return View
		 */
		public function show(Membership $membership): View
		{
			return view('Admin.memberships.show', compact('membership'));
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param $id
		 * @return View
		 */
		public function edit($id): View
		{
			$membership = Membership::where('id', $id)->first();
			return view('Admin.memberships.edit', compact('membership'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param $id
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function update(Request $request, $id): RedirectResponse
		{
			$data = $this->updateValidator($request->all())->validate();
			$membership = Membership::where('id', $id)->first();
			$membership->update($data);
			return redirect(route('memberships.index'))->withToastSuccess('Membership Updated Successfully!');
		}

		protected function updateValidator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			$rules = [
				'name' => ['required', 'string'],
				'price' => ['required', 'numeric',],
				'fee' => ['required', 'numeric',],
			];
			return Validator::make($data, $rules);
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param $id
		 * @return RedirectResponse
		 */
		public function destroy($id): RedirectResponse
		{
			$membership = Membership::where('id', $id)->first();
			$membership->delete();
			return redirect(route('memberships.index'))->with('toast_success', 'Membership with name ' . $membership->name . ' have been deleted successfully.');
		}

		public function getMembershipDetailsForDestroying(Request $request, Membership $membership): JsonResponse
		{
			$data = $request->all();
			$membershipInfo = $membership->where('id', $data['id'])->first();
			$array = ['name' => $membershipInfo->name, 'price' => $membershipInfo->price];
			return response()->json($array);
		}
	}
