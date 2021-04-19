<?php

	namespace App\Http\Controllers\Admin;

	use App\Events\PackagePurchased;
	use App\Http\Controllers\Controller;
	use App\Membership;
	use App\PendingMembership;
	use App\User;
	use Carbon\Carbon;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\DB;
	use Illuminate\View\View;

	class UserMembershipController extends Controller
	{

		/**
		 * Display a listing of the resource.
		 *
		 * @return View
		 */
		public function indexPending(): View
		{
			$pendingMemberships = PendingMembership::where('status', 0)->paginate(10);
			return view('Admin.memberships.pending', compact('pendingMemberships'));
		}

		public function approve($id)
		{
			DB::transaction(function () use ($id) {
				$pendingMembership = PendingMembership::where('id', $id)->first();
				$membership = Membership::where('id', $pendingMembership->membership_id)->first();
				$price = $pendingMembership->transaction_amount - $membership->fee;
				$user = User::findOrFail($pendingMembership->user_id);
				$user->update(['purchasing_status' => 'can']);
				$pendingMembership->update([
					'status' => 1
				]);
				$user->membershipId()->update([
					'membership_id' => $pendingMembership->membership_id,
					'status' => 1,
				]);
				event(new PackagePurchased($user->sponsor, $price, $user));
			});
			return back()->withToastSuccess('Package approved successfully!');
		}

		public function rejection($id)
		{
			$pendingMembership = PendingMembership::where('id', $id)->first('id');
			return view('Admin.memberships.rejection', compact('pendingMembership'));
		}

		public function reject($id, Request $request)
		{
			$pendingMembership = PendingMembership::where('id', $id)->first();
			$pendingMembership->update(
				[
					'status' => 2,
					'rejectionReason' => $request->rejectionReason
				]
			);
			$user = User::findOrFail($pendingMembership->user_id);
			$user->update(['purchasing_status' => 'can']);
			return redirect(route('packages.pending'))->withToastSuccess('Package rejected successfully!');
		}
	}
