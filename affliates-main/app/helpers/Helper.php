<?php

//	use App\Balance;
//	use App\Membership;
//	use App\ModelHasRole;
//	use App\UserMembership;
//	use App\User;

	use App\FollowedLinks;
	use App\Link;
	use App\Membership;
	use App\ModelHasRole;
	use App\UserMembership;

	if (!function_exists('current_user')) {
		function current_user(): ?\Illuminate\Contracts\Auth\Authenticatable
		{
			return auth()->user();
		}
	}

	if (!function_exists('current_admin')) {
		function current_admin(): ?\Illuminate\Contracts\Auth\Authenticatable
		{
			return auth('admin')->user();
		}
	}

	if (!function_exists('current_user_membership')) {
		function current_user_membership($id)
		{
			$UserMembershipId = UserMembership::find($id);
			$membershipId = $UserMembershipId->membership_id;
			$membership = Membership::find($membershipId);
			return $membership->name;
		}
	}
	if (!function_exists('linkOriginalImage')) {
		function linkOriginalImage($id)
		{
			$linkData = Link::find($id);
			return $linkData->image;
		}
	}

	if (!function_exists('link_checker')) {
		function link_checker($link_id): bool
		{
			$linkData = FollowedLinks::where('user_id', current_user()->id)
				->where('link_id', $link_id)
				->first();
			return is_null($linkData);
		}
	}
//
//	if (!function_exists('user_downline_investment')) {
//		function user_downline_investment($account_id, $sponsor_id1 = null)
//		{
//			$id = $account_id;
//			$totalInvestment = [];
//			$for = [];
//			if ($sponsor_id1 !== null) {
//				$firstUser = User::where('account_id', '=', $account_id)->where('sponsor', '=', $sponsor_id1)->first();
//				if ($firstUser->count() !== null) {
//					$userBalance = Balance::where('user_id', $firstUser->id)->first();
//					$userAdPackBalance = $userBalance->ad_power_balance;
//					array_push($totalInvestment, $userAdPackBalance);
//				}
//			}
//			$users = User::where('sponsor', $id)->get();
//			$x = 0;
//			if ($sponsor_id1 !== null) {
//				while ($x < 9) {
//					if (count($for) > 0) {
//						$for = [];
//					}
//					if (count($users) == 0) {
//						break;
//					}
//					if (count($users) == 1) {
//						$userBalance = Balance::where('user_id', $users[0]->id)->first();
//						$userAdPackBalance = $userBalance->ad_power_balance;
//						array_push($totalInvestment, $userAdPackBalance);
//						$id = $users[0]->account_id;
//						$users = User::where('sponsor', $id)->get();
//					}
//					if (count($users) > 1) {
//						foreach ($users as $user) {
//							$userBalance = Balance::where('user_id', $user->id)->first();
//							$userAdPackBalance = $userBalance->ad_power_balance;
//							array_push($totalInvestment, $userAdPackBalance);
//							$usersData = User::where('sponsor', $user->account_id)->get();
//							$count = count($usersData);
//							if ($count > 0) {
//								array_push($for, $usersData);
//							}
//						}
//						$users1 = collect($for);
//						$users = $users1->flatten();
//						$for = [];
//					}
//					$x++;
//				}
//			}
//			else{
//				while ($x < 10) {
//					if (count($for) > 0) {
//						$for = [];
//					}
//					if (count($users) == 0) {
//						break;
//					}
//					if (count($users) == 1) {
//						$userBalance = Balance::where('user_id', $users[0]->id)->first();
//						$userAdPackBalance = $userBalance->ad_power_balance;
//						array_push($totalInvestment, $userAdPackBalance);
//						$id = $users[0]->account_id;
//						$users = User::where('sponsor', $id)->get();
//					}
//					if (count($users) > 1) {
//						foreach ($users as $user) {
//							$userBalance = Balance::where('user_id', $user->id)->first();
//							$userAdPackBalance = $userBalance->ad_power_balance;
//							array_push($totalInvestment, $userAdPackBalance);
//							$usersData = User::where('sponsor', $user->account_id)->get();
//							$count = count($usersData);
//							if ($count > 0) {
//								array_push($for, $usersData);
//							}
//						}
//						$users1 = collect($for);
//						$users = $users1->flatten();
//						$for = [];
//					}
//					$x++;
//				}
//			}
//			return collect($totalInvestment)->sum();
//		}
//	}
//
	if (!function_exists('totalUesrsOfRole')){
		function totalUesrsOfRole($id){
			return ModelHasRole::where('role_id', $id)->get()->count();
		}
	}

	if (!function_exists('calculateDailyProfit')){
		function calculateDailyProfit($adPackBalance, $dailyProfit)
		{
			return $adPackBalance * $dailyProfit / 100;
		}
	}