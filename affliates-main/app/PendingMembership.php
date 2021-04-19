<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Database\Eloquent\Relations\BelongsTo;

	class PendingMembership extends Model
	{
		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $guarded = [];

		public function user(): BelongsTo
		{
			return $this->belongsTo(User::class);
		}

		public function paymentGateway(): BelongsTo
		{
			return $this->belongsTo(PaymentGateway::class);
		}

		public function membership(): BelongsTo
		{
			return $this->belongsTo(Membership::class);
		}

		public function add($user_id, $membershipId, $payment_gateway_id, $transaction_id, $transaction_amount)
		{
			PendingMembership::create(
				[
					'user_id' => $user_id,
					'membership_id' => $membershipId,
					'payment_gateway_id' => $payment_gateway_id,
					'transaction_id' => $transaction_id,
					'transaction_amount' => $transaction_amount,
					'status' => 0,
				]
			);
		}
	}
