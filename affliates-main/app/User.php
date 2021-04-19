<?php

	namespace App;

	use Illuminate\Contracts\Auth\MustVerifyEmail;
	use Illuminate\Database\Eloquent\Relations\HasMany;
	use Illuminate\Database\Eloquent\Relations\HasOne;
	use Illuminate\Foundation\Auth\User as Authenticatable;
	use Illuminate\Notifications\Notifiable;
	use Spatie\Permission\Traits\HasRoles;

	class User extends Authenticatable
	{
		use Notifiable, HasRoles;

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $guarded = [];

		/**
		 * The attributes that should be hidden for arrays.
		 *
		 * @var array
		 */
		protected $hidden = [
			'password', 'remember_token',
		];

		/**
		 * The attributes that should be cast to native types.
		 *
		 * @var array
		 */
		protected $casts = [
			'email_verified_at' => 'datetime',
		];

		public function balance(): HasOne
		{
			return $this->hasOne(Balance::class);
		}

		public function membershipId(): HasOne
		{
			return $this->hasOne(UserMembership::class);
		}

		public function pendingMemberships(): HasMany
		{
			return $this->hasMany(PendingMembership::class);
		}

		public function membership($id = null)
		{
			$membershipId = $id ? $id : $this->membershipId->membership_id;
			return Membership::find($membershipId);
		}

		public function addTransaction($balanceField, $creditOrDebit, $amount, $oldBalance, $newBalance, $transactionsDetails, $actionedBy)
		{
			$this->transactions()->create([
				'user_id' => $actionedBy,
				'balance_field' => $balanceField,
				'credit_debit' => $creditOrDebit,
				'transaction_amount' => $amount,
				'old_balance' => $oldBalance,
				'new_balance' => $newBalance,
				'transactions_details' => $transactionsDetails,
				'trans_date_time' => now(),
			]);
		}

		public function transactions(): HasMany
		{
			return $this->hasMany(Transaction::class);
		}

		public function withdraws(): HasMany
		{
			return $this->hasMany(Withdraw::class);
		}

		public function usersForAdminDashboard()
		{
			return User::orderBy('id', 'desc')->paginate(5);
		}

		public function numberOfReferrals($account_id)
		{
			$user = User::where('sponsor', $account_id)->get();
			return $user->count();
		}

		//Users has referrals
		public function referrals(): HasMany
		{
			return $this->hasMany('App\User', 'sponsor', 'account_id');
		}

	}
