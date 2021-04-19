<?php

	namespace App\Http\Controllers;

	use App\User;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;
	use Illuminate\View\View;

	class ProfileController extends Controller
	{

		/**
		 * @param User $user
		 * @return View
		 */
		public function edit(User $user): View
		{
			return view('profile.edit', compact('user'));
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param User $user
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function update(Request $request, User $user): RedirectResponse
		{
			if (current_user()->id === $user['id']) {
				if ($request['username']) {
					return back()->with('toast_error', 'Cannot Update Username');
				}
				if ($request['email']) {
					return back()->with('toast_error', 'Cannot Update Email');
				}
				$data = $this->validator($request->all())->validate();
				$user->update($data);
				return redirect(route('profile'))->withToastSuccess('Updated Successfully!');
			} else {
				return redirect(route('profile'))->withToastSuccess('Updated Successfully!');
			}

		}

		protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			$message = [
				'country.regex' => 'Country should only contain alphabets, spaces and numbers.',
				'city.regex' => 'City should only contain alphabets, spaces and numbers.',
				'state.regex' => 'State should only contain alphabets, spaces and numbers.',
			];
			return Validator::make($data, [
				'date_of_birth' => ['before:today'],
				'phone' => ['required', 'regex:/^03[0-9]{9}$/'],
				'gender' => ['required', 'in:male,female,other'],
				'postalcode' => ['required', 'numeric'],
				'country' => ['required', 'regex:/^[a-zA-Z0-9 ]*$/', 'string'],
				'state' => ['required', 'regex:/^[a-zA-Z0-9 ]*$/', 'string'],
				'city' => ['required', 'regex:/^[a-zA-Z0-9 ]*$/', 'string'],
				'address' => ['required', 'string'],
			], $message);
		}
	}
