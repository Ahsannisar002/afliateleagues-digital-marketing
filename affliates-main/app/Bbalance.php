<?php


	namespace App;

	trait Bbalance
	{
		public function currentMainBalance($id)
		{
			$balance = Balance::where('user_id', $id)->first();
			return $balance->main_balance;
		}

		public function currentGroupBalance($id)
		{
			$balance = Balance::where('user_id', $id)->first();
			return $balance->group_balance;
		}

		public function updateGroupBalance($id, $amount)
		{
			Balance::where('user_id', $id)->update([
				'group_balance' => $amount
			]);
		}

		public function updateMainBalance($id, $amount)
		{
			Balance::where('user_id', $id)->update([
				'main_balance' => $amount
			]);
		}

		public function totalMainBalance()
		{
			$mainBalance = Balance::all();
			return $mainBalance->sum('main_balance');
		}


		public function totalGroupBalance()
		{
			$mainBalance = Balance::all();
			return $mainBalance->sum('group_balance');
		}
	}