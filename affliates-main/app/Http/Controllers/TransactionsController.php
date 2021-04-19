<?php

	namespace App\Http\Controllers;

	use App\Transaction;

	class TransactionsController extends Controller
	{
		public function index()
		{
			$transactions = Transaction::where('user_id', current_user()->id)
				->orderBy('id', 'desc')
				->paginate(15);
			return view('transactions.transactions', compact('transactions'));
		}
	}