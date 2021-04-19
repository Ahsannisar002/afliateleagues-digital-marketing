<?php

	namespace App\Http\Controllers;

	use App\User;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;

	class SettingsController extends Controller
	{
		public function showChangePassword()
		{
			return view('setting.change-password');
		}

		/**
		 * @param Request $request
		 * @param User $user
		 * @throws ValidationException
		 */
		public function changePassword(Request $request, User $user)
		{
			$data = $this->validator($request->all())->validate();
			if (Hash::check($data['current_password'], current_user()->password)) {

				$user->where('id', current_user()->id)
					->update(['password' => bcrypt($data['password'])]);

				return back()->withToastSuccess('Password Updated Successfully!');
			} else {
				return back()->with('toast_error', 'Current Password does not match.');
			}
		}

		/**
		 * @param array $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			$rules = [
				'current_password' => 'required|string',
				'password' => 'required|string|min:8|confirmed'
			];
			$message = [
				'current_password.required' => 'Current Password is required.',
			];

			return Validator::make($data, $rules, $message);
		}
	}
