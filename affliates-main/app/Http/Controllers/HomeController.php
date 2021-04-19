<?php

	namespace App\Http\Controllers;

	use App\FollowedLinks;
	use App\Transaction;
	use App\UserMembership;
	use Illuminate\Contracts\Support\Renderable;
	use Illuminate\Http\Request;

	class HomeController extends Controller
	{
		/**
		 * Create a new controller instance.
		 *
		 * @return void
		 */
		public function __construct()
		{
//        $this->middleware('auth');
		}

		/**
		 * Show the application dashboard.
		 *
		 * @return Renderable
		 */
		public function index(Transaction $transaction): Renderable
		{
			$UserMembership = UserMembership::where('user_id', current_user()->id)->first();
			$todayEarning = $transaction->todayEarning();
			$yesterdayEarning = $transaction->yesterdayEarning();
			$last7Earning = $transaction->last7Earning();
			$last30Earning = $transaction->last30Earning();
			$last365Earning = $transaction->last365Earning();
//			$userFollowedLinks = FollowedLinks::where('user_id',current_user()->id)->where('status', 1)->get();
//			$subscribedChannels = 0;
//			$instagramFollowed = 0;
//			$facebookFollowed = 0;
//			foreach ($userFollowedLinks as $link){
//				if ($link->link->link_type == 'Youtube') {
//				    $subscribedChannels++;
//				}
//				elseif($link->link->link_type == 'Instagram'){
//				    $instagramFollowed++;
//				}
//				elseif($link->link->link_type == 'Facebook'){
//					$facebookFollowed++;
//				}
//			}
//			$profilesFollowed = $instagramFollowed + $facebookFollowed;
			return view('dashboard', [
				'userMembership' => $UserMembership,
				'todayEarning' => $todayEarning,
				'yesterdayEarning' => $yesterdayEarning,
				'last7Earning' => $last7Earning,
				'last30Earning' => $last30Earning,
				'last365Earning' => $last365Earning,

			]);
		}
	}
