<?php

	namespace App;

	use Carbon\Carbon;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;

	class UserMembership extends Model
	{
		protected $guarded = [];
		public function upgradeMembership($user_id, $membershipId, $months)
		{
			UserMembership::where('user_id', $user_id)->update([
				'membership_id' => $membershipId,
				'expires_at' =>  Carbon::today()->addMonths($months),
				'status' => 0,
			]);
		}
		public function user(): BelongsTo
		{
			return $this->belongsTo(User::class);
		}
	}
