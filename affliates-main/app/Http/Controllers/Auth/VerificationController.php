<?php

	namespace App\Http\Controllers\Auth;

	use Illuminate\Auth\Access\AuthorizationException;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\Auth;

	class VerificationController extends Controller
	{
		/*
		|--------------------------------------------------------------------------
		| Email Verification Controller
		|--------------------------------------------------------------------------
		|
		| This controller is responsible for handling email verification for any
		| user that recently registered with the application. Emails may also
		| be re-sent if the user didn't receive the original email message.
		|
		*/

		use VerifiesUsersEmails {
			verify as parentVerify;
		}

		/**
		 * Where to redirect users after verification.
		 *
		 * @var string
		 */
		protected $redirectTo = '/';

		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
			$this->middleware('auth')->except('verify');
			$this->middleware('signed')->only('verify');
			$this->middleware('throttle:6,1')->only('verify', 'resend');
		}

		/**
		 * Mark the authenticated user's email address as verified.
		 *
		 * @param Request $request
		 *
		 * @return JsonResponse|RedirectResponse|Response
		 *
		 * @throws AuthorizationException
		 */
		public function verify(Request $request)
		{
			if ($request->user() && $request->user() != $request->route('id')) {
				Auth::logout();
			}

			if (!$request->user()) {
				Auth::loginUsingId($request->route('id'), true);
			}

			return $this->parentVerify($request);
		}
	}