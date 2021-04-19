<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Transaction extends Model
	{
		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $guarded = [];

		/**
		 * The attributes that should be cast to native types.
		 *
		 * @var array
		 */
		protected $casts = [
			'id' => 'integer',
			'user_id' => 'integer',
		];


		public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
		{
			return $this->belongsTo(User::class);
		}

		public function createTransaction($user_id, $creditOrDebit, $amount, $newBalance, $oldBalance, $transactionsDetails, $balanceField)
		{
			Transaction::create([
				'user_id' => $user_id,
				'balance_field' => $balanceField,
				'credit_debit' => $creditOrDebit,
				'transaction_amount' => $amount,
				'old_balance' => $oldBalance,
				'new_balance' => $newBalance,
				'transactions_details' => $transactionsDetails,
				'trans_date_time' => now(),
			]);
		}

		public function todayEarning()
		{
			$todayEarning = Transaction::where(
				[
					['user_id', '=', current_user()->id],
					['balance_field', '=', 'Group Balance'],
					['credit_debit', '=', 'Credit' ],
				]
			)->whereDate('created_at', '=', today())->get();

			return $todayEarning->sum('transaction_amount');
		}
		public function yesterdayEarning()
		{
			$yesterday = date("Y-m-d", strtotime( '-1 day' ) );
			$todayEarning = Transaction::where(
				[
					['user_id', '=', current_user()->id],
					['balance_field', '=', 'Group Balance'],
					['credit_debit', '=', 'Credit' ],
				]
			)->whereDate('created_at', '=', $yesterday)->get();

			return $todayEarning->sum('transaction_amount');
		}
		public function last7Earning()
		{
			$last7Earning = date("Y-m-d", strtotime( '-7 days' ) );
			$todayEarning = Transaction::where(
				[
					['user_id', '=', current_user()->id],
					['balance_field', '=', 'Group Balance'],
					['credit_debit', '=', 'Credit' ],
				]
			)->whereDate('created_at', '>=', $last7Earning)->get();

			return $todayEarning->sum('transaction_amount');
		}

		public function last30Earning()
		{
			$last30Earning = date("Y-m-d", strtotime( '-30 days' ) );
			$todayEarning = Transaction::where(
				[
					['user_id', '=', current_user()->id],
					['balance_field', '=', 'Group Balance'],
					['credit_debit', '=', 'Credit' ],
				]
			)->whereDate('created_at', '>=', $last30Earning)->get();

			return $todayEarning->sum('transaction_amount');
		}
		public function last365Earning()
		{
			$last365Earning = date("Y-m-d", strtotime( '-365 days' ) );
			$todayEarning = Transaction::where(
				[
					['user_id', '=', current_user()->id],
					['balance_field', '=', 'Group Balance'],
					['credit_debit', '=', 'Credit' ],
				]
			)->whereDate('created_at', '>=', $last365Earning)->get();

			return $todayEarning->sum('transaction_amount');
		}
	}
