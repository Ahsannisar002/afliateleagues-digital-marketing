<?php

	namespace App\Http\Controllers\Admin;

	use App\Admin;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Illuminate\Support\Facades\Hash;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;

	class SettingsController extends Controller
	{

		public function showChangePassword()
		{
			return view('Admin.change-password');
		}

		/**
		 * @param Request $request
		 * @param Admin $admin
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function changePassword(Request $request, Admin $admin): RedirectResponse
		{
			$data = $this->validator($request->all())->validate();
			if (Hash::check($data['current_password'], current_admin()->password)) {
				$admin->where('id', current_admin()->id)->update(['password' => bcrypt($data['password'])]);
				return back()->withToastSuccess('Password Updated Successfully!');
			} else {
				return back()->with('toast_error', 'Current Password is Incorrect.');
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
