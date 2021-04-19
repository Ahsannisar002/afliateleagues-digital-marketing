<?php

	namespace App\Http\Controllers\Auth;

	use App\Http\Controllers\Auth\AuthenticationForUsers;
	use App\Http\Controllers\Controller;
	use App\Providers\RouteServiceProvider;

	class LoginController extends Controller
	{
		/*
		|--------------------------------------------------------------------------
		| Login Controller
		|--------------------------------------------------------------------------
		|
		| This controller handles authenticating users for the application and
		| redirecting them to your home screen. The controller uses a trait
		| to conveniently provide its functionality to your applications.
		|
		*/

		use AuthenticationForUsers;

		/**
		 * Where to redirect users after login.
		 *
		 * @var string
		 */
		protected $redirectTo = RouteServiceProvider::HOME;

		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		private $username;

		/**
		 * Create a new controller instance.
		 */
		public function __construct()
		{
			$this->middleware('guest')->except('logout');
			$this->username = $this->findUsername();
		}

		/**
		 * Get the login username to be used by the controller.
		 *
		 * @return string
		 */
		public function findUsername(): string
		{
			$login = request()->input('login');

			$fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

			request()->merge([$fieldType => $login]);

			return $fieldType;
		}

		/**
		 * Get username property.
		 *
		 * @return string
		 */
		public function username(): string
		{
			return $this->username;
		}
	}
