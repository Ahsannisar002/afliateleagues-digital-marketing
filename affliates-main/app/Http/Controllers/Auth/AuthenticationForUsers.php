<?php


	namespace App\Http\Controllers\Auth;


	use Illuminate\Contracts\Auth\StatefulGuard;
	use Illuminate\Foundation\Auth\RedirectsUsers;
	use Illuminate\Foundation\Auth\ThrottlesLogins;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Auth;
	use Illuminate\Validation\ValidationException;
	use Illuminate\View\View;
	use Symfony\Component\HttpFoundation\Response;

	trait AuthenticationForUsers
	{
		use RedirectsUsers, ThrottlesLogins;

		/**
		 * Show the application's login form.
		 *
		 * @return View
		 */
		public function showLoginForm(): View
		{
			return view('auth.login');
		}

		/**
		 * Handle a login request to the application.
		 *
		 * @param Request $request
		 * @return Response
		 *
		 * @throws ValidationException
		 */
		public function login(Request $request)
		{
			$this->validateLogin($request);

			// If the class is using the ThrottlesLogins trait, we can automatically throttle
			// the login attempts for this application. We'll key this by the username and
			// the IP address of the client making these requests into this application.
			if (method_exists($this, 'hasTooManyLoginAttempts') &&
				$this->hasTooManyLoginAttempts($request)) {
				$this->fireLockoutEvent($request);

				return $this->sendLockoutResponse($request);
			}

			if ($this->attemptLogin($request)) {
				return $this->sendLoginResponse($request);
			}

			// If the login attempt was unsuccessful we will increment the number of attempts
			// to login and redirect the user back to the login form. Of course, when this
			// user surpasses their maximum number of attempts they will get locked out.
			$this->incrementLoginAttempts($request);

			return $this->sendFailedLoginResponse($request);
		}

		/**
		 * Validate the user login request.
		 *
		 * @param Request $request
		 * @return void
		 *
		 */
		protected function validateLogin(Request $request)
		{
			$request->validate([
				$this->username() => 'required|string',
				'password' => 'required|string',
			]);
		}

		/**
		 * Get the login username to be used by the controller.
		 *
		 * @return string
		 */
		public function username(): string
		{
			return 'email';
		}

		/**
		 * Attempt to log the user into the application.
		 *
		 * @param Request $request
		 * @return bool
		 */
		protected function attemptLogin(Request $request): bool
		{
			return $this->guard()->attempt(
				$this->credentials($request), $request->filled('remember')
			);
		}

		/**
		 * Get the guard to be used during authentication.
		 *
		 * @return StatefulGuard
		 */
		protected function guard(): StatefulGuard
		{

			return Auth::guard();
		}

		/**
		 * Get the needed authorization credentials from the request.
		 *
		 * @param Request $request
		 * @return array
		 */
		protected function credentials(Request $request)
		{
			return $request->only($this->username(), 'password');
		}

		/**
		 * Send the response after the user was authenticated.
		 *
		 * @param Request $request
		 * @return RedirectResponse|JsonResponse
		 */
		protected function sendLoginResponse(Request $request)
		{
			$request->session()->regenerate();

			$this->clearLoginAttempts($request);

			if ($response = $this->authenticated($request, $this->guard()->user())) {
				return $response;
			}

			return $request->wantsJson()
				? new JsonResponse([], 204)
				: redirect()->intended($this->redirectPath());
		}

		/**
		 * The user has been authenticated.
		 *
		 * @param Request $request
		 * @param mixed $user
		 * @return mixed
		 */
		protected function authenticated(Request $request, $user)
		{
			$user->update(
				[
					'last_logged_at' => now()
				]
			);
			if ($user->status == 0) {

				$message = 'Please activate your account';

				// Log the user out.
				$this->logout($request);

				// Return them to the log in form.
				return redirect()->back()
					->withInput($request->only($this->username(), 'remember'))
					->withErrors([
						// This is where we are providing the error message.
						$this->username() => $message,
					]);
			}
			if ($user->status == 2) {

				$message = 'Your account is suspended Contact Us';

				// Log the user out.
				$this->logout($request);

				// Return them to the log in form.
				return redirect()->back()
					->withInput($request->only($this->username(), 'remember'))
					->withErrors([
						// This is where we are providing the error message.
						$this->username() => $message,
					]);
			}
			if ($user->status == 3) {

				$message = 'Your account is Banned';

				// Log the user out.
				$this->logout($request);

				// Return them to the log in form.
				return redirect()->back()
					->withInput($request->only($this->username(), 'remember'))
					->withErrors([
						// This is where we are providing the error message.
						$this->username() => $message,
					]);
			}
			if ($user->status == 4) {

				$message = 'System is under Maintainence.';

				// Log the user out.
				$this->logout($request);

				// Return them to the log in form.
				return redirect()->back()
					->withInput($request->only($this->username(), 'remember'))
					->withErrors([
						// This is where we are providing the error message.
						$this->username() => $message,
					]);
			}
			Auth::logoutOtherDevices(request('password'));
		}

		/**
		 * Log the user out of the application.
		 *
		 * @param Request $request
		 * @return RedirectResponse|JsonResponse
		 */
		public function logout(Request $request)
		{
			$this->guard()->logout();

			$request->session()->invalidate();

			$request->session()->regenerateToken();

			if ($response = $this->loggedOut($request)) {
				return $response;
			}

			return $request->wantsJson()
				? new JsonResponse([], 204)
				: redirect('/');
		}

		/**
		 * The user has logged out of the application.
		 *
		 * @param Request $request
		 * @return mixed
		 */
		protected function loggedOut(Request $request)
		{
			//
		}

		/**
		 * Get the failed login response instance.
		 *
		 * @param Request $request
		 * @return Response
		 *
		 * @throws ValidationException
		 */
		protected function sendFailedLoginResponse(Request $request): Response
		{
			throw ValidationException::withMessages([
				$this->username() => [trans('auth.failed')],
			]);
		}
	}

