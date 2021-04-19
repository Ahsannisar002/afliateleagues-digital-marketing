<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Withdraw extends Model
{
	protected $guarded = [];

	public function paymentGateway(): BelongsTo
	{
		return $this->BelongsTo(PaymentGateway::class);
	}

	public function user(): BelongsTo
	{
		return $this->BelongsTo(User::class);
	}
}
