<?php

	namespace App\Listeners;

	use App\Balance;
	use App\Events\PackagePurchased;
	use App\Transaction;
	use App\User;
	use Illuminate\Database\Eloquent\Model;
	use Illuminate\Support\Facades\DB;

	class PackageCommission
	{
		/**
		 * Create the event listener.
		 *
		 * @return void
		 */
		public function __construct()
		{
			//
		}

		/**
		 * Handle the event.
		 *
		 * @param PackagePurchased $event
		 * @return void
		 */
		public function handle(PackagePurchased $event)
		{
			$sponsor_account_id = $event->sponsor_account_id;
			$percentage = 100;
			// Get The User
			$sponsor = User::where('account_id', $sponsor_account_id)->first();
			if ($sponsor->sale_no === 2) {
				$secondSponsor = User::where('account_id', $sponsor->sponsor)->first();
				if ($secondSponsor->membership()->id > 1) {
					$this->commissionProcesses2($event, $secondSponsor, $percentage, 2, $sponsor);
				}
			} else {
				if ($sponsor->membershipId->membership_id > 1) {
					$this->commissionProcesses($event, $sponsor, $percentage, 1);
				}
			}
		}

		protected function commissionProcesses2(PackagePurchased $event, $sponsor, $percentage, $level, $sponsor2)
		{
			$userBalance = Balance::where('user_id', $sponsor->id)->first();

			// Commission Calculation
			$totalDirectCommission = $event->totalAmount * $percentage / 100;

			$newGroupBalance = $userBalance->group_balance + $totalDirectCommission;
			$newMainBalance = $userBalance->main_balance + $totalDirectCommission;
			// Transaction for Direct Commission

			DB::transaction(function () use ($sponsor2, $sponsor, $totalDirectCommission, $newGroupBalance, $userBalance, $event, $level, $newMainBalance) {
				(new Transaction)->createTransaction($sponsor->id,
					'Credit',
					$totalDirectCommission,
					$newGroupBalance,
					$userBalance->group_balance,
					'Commission received on purchase of Package by ' . $event->user->username . ' from level: ' . $level,
					'Group Balance'
				);

				(new Transaction)->createTransaction($sponsor->id,
					'Credit',
					$totalDirectCommission,
					$newMainBalance,
					$userBalance->main_balance,
					'Commission received on purchase of Package by ' . $event->user->username . ' from level: ' . $level,
					'Main Balance'
				);

				// Update the Group Balance
				(new Balance)->updateGroupBalance($sponsor->id, $newGroupBalance);
				// Update the Main Balance
				(new Balance)->updateMainBalance($sponsor->id, $newMainBalance);
				$number = $sponsor2->sale_no + 1;

				// Update Sale Number

				$sponsor2->update(
					[
						'sale_no' => $number
					]
				);
			});
		}

		protected function commissionProcesses(PackagePurchased $event, $sponsor, $percentage, $level)
		{
			$userBalance = Balance::where('user_id', $sponsor->id)->first();

			// Commission Calculation
			$totalDirectCommission = $event->totalAmount * $percentage / 100;

			$newGroupBalance = $userBalance->group_balance + $totalDirectCommission;
			$newMainBalance = $userBalance->main_balance + $totalDirectCommission;
			// Transaction for Direct Commission

			DB::transaction(function () use ($sponsor, $totalDirectCommission, $newGroupBalance, $userBalance, $event, $level, $newMainBalance) {
				(new Transaction)->createTransaction($sponsor->id,
					'Credit',
					$totalDirectCommission,
					$newGroupBalance,
					$userBalance->group_balance,
					'Commission received on purchase of Package by ' . $event->user->username . ' from level: ' . $level,
					'Group Balance'
				);

				(new Transaction)->createTransaction($sponsor->id,
					'Credit',
					$totalDirectCommission,
					$newMainBalance,
					$userBalance->main_balance,
					'Commission received on purchase of Package by ' . $event->user->username . ' from level: ' . $level,
					'Main Balance'
				);

				// Update the Group Balance
				(new Balance)->updateGroupBalance($sponsor->id, $newGroupBalance);
				// Update the Main Balance
				(new Balance)->updateMainBalance($sponsor->id, $newMainBalance);
				$number = $sponsor->sale_no + 1;

				// Update Sale Number

				$sponsor->update(
					[
						'sale_no' => $number
					]
				);
			});
		}
	}
