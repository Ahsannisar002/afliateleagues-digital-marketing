<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PackagePurchased
{
    use Dispatchable, SerializesModels;

	public $user;
	public $sponsor_account_id;
	public $totalAmount;

	/**
	 * Create a new event instance.
	 *
	 * @param $sponsor_account_id
	 * @param $totalAmount
	 * @param $user
	 */
	public function __construct($sponsor_account_id, $totalAmount, $user)
	{
		$this->user = $user;
		$this->sponsor_account_id = $sponsor_account_id;
		$this->totalAmount = $totalAmount;
	}
}
