<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use App\Transaction;
	use Illuminate\Http\Request;

	class TransactionController extends Controller
	{
		public function index()
		{
			$transactions = Transaction::paginate(10);
			return view('Admin.transactions.transactions', compact('transactions'));
		}
	}
