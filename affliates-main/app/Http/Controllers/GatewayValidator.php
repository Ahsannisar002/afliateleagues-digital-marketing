<?php


	namespace App\Http\Controllers;


	use Illuminate\Support\Facades\Validator;

	trait GatewayValidator
	{

		protected function BankValidator($data)
		{
			$message = [
				'account_iban.required' => 'Bank Account IBAN is required.',
				'reference_number.required' => 'Reference number is required.',
				'bank_name.required' => 'Bank Name is required.',
				'bank_name.regex' => 'Bank Name Format is invalid.',
				'account_iban.regex' => 'Bank Name Format is invalid.',
				'account_holder_name.regex' => 'Bank Name Format is invalid.',
			];
			return Validator::make($data, [
				'branch_code' => 'required|numeric',
				'amount' => 'required|numeric',
				'reference_number' => 'required|numeric',
				'bank_name' => 'required|string|regex:/^([A-Za-z0-9\s]+)$/',
				'account_holder_name' => 'required|string|regex:/^([A-Za-z0-9\s]+)$/',
				'account_iban' => 'required|string|regex:/^([A-Za-z0-9]+)$/',
			], $message);
		}

		/**
		 * @param $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function EasypaisaValidator($data): \Illuminate\Contracts\Validation\Validator
		{
			$message = [
				'account_number.required' => 'Easypaisa Account Number is required.',
				'account_number.regex' => 'Easypaisa Account Number format is e.g: 03060189273 .',
			];
			return Validator::make($data, [
				'amount' => 'required|numeric',
				'account_number' => ['required', 'numeric', 'regex:/^03[0-9]{9}$/'],
				'account_holder_name' => 'required|string|regex:/^([A-Za-z0-9\s]+)$/',
			], $message);
		}

		/**
		 * @param $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function JazzcashValidator($data): \Illuminate\Contracts\Validation\Validator
		{
			$message = [
				'account_number.required' => 'Jazzcash Account Number is required.',
				'account_number.regex' => 'Jazzcash Account Number format is e.g: 03060189273 .',
			];
			return Validator::make($data, [
				'amount' => 'required|numeric',
				'account_number' => ['required', 'numeric', 'regex:/^03[0-9]{9}$/'],
				'account_holder_name' => 'required|string|regex:/^([A-Za-z0-9\s]+)$/',
			], $message);
		}

		/**
		 * @param $data
		 * @return \Illuminate\Contracts\Validation\Validator
		 */
		protected function BTCValidator($data): \Illuminate\Contracts\Validation\Validator
		{
			$message = [
				'wallet_address.required' => 'Receiving address is required.',
			];
			return Validator::make($data, [
				'amount' => 'required|numeric',
				'wallet_address' => ['required', 'string', 'regex:/^([A-Za-z0-9\_#-]+)$/'],
			], $message);
		}
	}