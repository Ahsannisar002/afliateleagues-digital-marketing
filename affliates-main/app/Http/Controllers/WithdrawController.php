<?php

	namespace App\Http\Controllers;

	use App\PaymentGateway;
	use App\User;
	use App\Rate;
	use App\Balance;
	use App\Transaction;
	use App\Withdraw;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\DB;
	use Illuminate\Validation\ValidationException;

	class WithdrawController extends Controller
	{
		use GatewayValidator;

		public function create(Withdraw $withdraw)
		{
			$history = $withdraw->where('user_id', current_user()->id)->get();
			return view('transactions.withdraw-balance', ['history' => $history]);
		}

		/**
		 * @param Request $request
		 * @return RedirectResponse
		 * @throws ValidationException
		 */
		public function store(Request $request): RedirectResponse
		{
			$validatedGatewayId = $request->validate(
				[
					'payment_gateway_id' => ['required', 'exists:payment_gateways,id'],
				]
			);

			$gateway = PaymentGateway::where('id', $validatedGatewayId)->first();
			if ($gateway->name == 'BTC') {
				$data = $this->BTCValidator($request->all())->validate();
				if ($data['amount'] > current_user()->balance->main_balance) {
					throw ValidationException::withMessages([
						'name' => 'Withdrawal amount exceeded then Main Balance'
					]);
				} elseif ($data['amount'] < 1) {
					throw ValidationException::withMessages([
						'name' => 'Can not withdraw less than 1$'
					]);
				} else {
					Withdraw::create(
						[
							'user_id' => current_user()->id,
							'payment_gateway_id' => $gateway->id,
							'account_iban' => $data['wallet_address'],
							'amount' => $data['amount'],
						]
					);
					$this->balanceTransaction($data['amount'], current_user()->balance->main_balance, current_user(), 'Amount deducted for withdrawal.');
					return redirect(route('withdraw.create'))->with('toast_success', 'Withdrawal request sent successfully.');
				}
			} elseif ($gateway->name == 'Bank') {

				$data = $this->BankValidator($request->all())->validate();

				if ($data['amount'] > current_user()->balance->main_balance) {
					throw ValidationException::withMessages([
						'name' => 'Withdrawal amount exceeded then Main Balance'
					]);
				} elseif ($data['amount'] < 1) {
					throw ValidationException::withMessages([
						'name' => 'Can not withdraw less than 1$'
					]);
				} else {
					Withdraw::create(
						[
							'user_id' => current_user()->id,
							'payment_gateway_id' => $gateway->id,
							'branch_code' => $data['branch_code'],
							'amount' => $data['amount'],
							'reference_number' => $data['reference_number'],
							'bank_name' => $data['bank_name'],
							'account_holder_name' => $data['account_holder_name'],
							'account_iban' => $data['account_iban'],
						]
					);
					$this->balanceTransaction($data['amount'], current_user()->balance->main_balance, current_user(), 'Amount deducted for withdrawal.');
					return redirect(route('withdraw.create'))->with('toast_success', 'Withdrawal request sent successfully.');
				}

			} elseif ($gateway->name == 'Jazzcash') {
				$data = $this->JazzcashValidator($request->all())->validate();

				$this->easypaisaAndJazzcashTransactionsCalculator($data, $gateway);

				return redirect(route('withdraw.create'))->with('toast_success', 'Withdrawal request sent successfully.');
			} elseif ($gateway->name == 'Easypaisa') {

				$data = $this->EasypaisaValidator($request->all())->validate();

				$this->easypaisaAndJazzcashTransactionsCalculator($data, $gateway);

				return redirect(route('withdraw.create'))->with('toast_success', 'Withdrawal request sent successfully.');
			}
		}

		protected function balanceTransaction($amount, $currentMainBalance, $user, $transactionDetails)
		{
			$withdraw = $amount;
			$total = $currentMainBalance - $withdraw;

			DB::transaction(function () use ($transactionDetails, $user, $currentMainBalance, $withdraw, $total) {
				(new Balance)->updateMainBalance($user->id, $total);
				$user
					->addTransaction('main_balance', 'Debit', $withdraw, $currentMainBalance, $user->balance->currentMainBalance($user->id), $transactionDetails, $user->id);
			});
		}

		protected function easypaisaAndJazzcashTransactionsCalculator($data, $gateway)
		{
			if ($data['amount'] < 1) {
				throw ValidationException::withMessages([
					'name' => 'Can not withdraw less than 1$'
				]);
			} elseif ($data['amount'] > current_user()->balance->main_balance) {
				throw ValidationException::withMessages([
					'name' => 'Withdrawal amount exceeded then Main Balance'
				]);
			} else {
				Withdraw::create(
					[
						'user_id' => current_user()->id,
						'payment_gateway_id' => $gateway->id,
						'account_holder_name' => $data['account_holder_name'],
						'account_iban' => $data['account_number'],
						'amount' => $data['amount'],
					]
				);
				$this->balanceTransaction($data['amount'], current_user()->balance->main_balance, current_user(), 'Amount deducted for withdrawal.');
			}
		}

	}
