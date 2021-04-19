<?php

	namespace App\Http\Controllers\Admin;

	use App\Balance;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;
	use Illuminate\View\View;

	class BalanceController extends Controller
	{
		/**
		 * Display the specified resource.
		 *
		 * @param int $id
		 * @return View
		 */
		public function show(int $id): View
		{
			$balance = Balance::where('user_id', $id)->first();
			return view('Admin.balances.show', compact('balance'));
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param Balance $balance
		 * @return View
		 */
		public function edit(Balance $balance): View
		{
			return view('Admin.balances.edit', compact('balance'));
		}

		/**
		 * Get a validator for an balance update request.
		 *
		 * @param array $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			return Validator::make($data, [
				'main_balance' => ['required', 'numeric'],
				'group_balance' => ['required', 'numeric'],
			]);
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param Balance $balance
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function update(Request $request, Balance $balance): RedirectResponse
		{
			$data = $this->validator($request->all())->validate();
			$balance->update($data);
			return redirect(route('balances.show', $balance->user_id))->withToastSuccess('User Balance Updated Successfully!');
		}

	}
