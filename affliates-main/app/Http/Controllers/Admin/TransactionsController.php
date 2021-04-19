<?php

	namespace App\Http\Controllers\Admin;

	use App\Balance;
	use App\Http\Controllers\Controller;
	use App\Transaction;
	use App\User;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Support\Facades\Validator;

	class TransactionsController extends Controller
	{
		public function index(AdminTransaction $adminTransaction)
		{
			$data = $adminTransaction->where('id', current_admin()->id)->orderBy('id', 'desc')->paginate(15);

			return view('Admin.transactions.transactions', ['transactions' => $data]);
		}


		public function showPointsCreationForm()
		{
			return view('Admin.transactions.create-points');
		}


		public function createPoints(Request $request, Balance $balance, Transaction $transaction)
		{
			$data = $this->validator($request->all())->validate();
			$adminBalance = $balance->where('user_id', 2)->first();
			$newBalance = $adminBalance['main_balance'] + $data['number'];
			DB::transaction(function () use ($adminBalance, $data, $transaction, $newBalance, $balance) {
				$transaction->createTransaction(2,
					'Credit',
					$data['number'],
					$newBalance,
					$adminBalance['main_balance'],
					$data['number'] . ' Points Transferred From Super Admin',
					'main_balance');
				$balance->updateMainBalance(2, $newBalance);
			});

			return back()->with('toast_success', $data['number'] . ' Points Created Successfully!');

		}

		/**
		 * @param array $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function validator(array $data)
		{
			$rule = [
				'number' => 'required|integer'
			];
			return Validator::make($data, $rule);
		}
	}
