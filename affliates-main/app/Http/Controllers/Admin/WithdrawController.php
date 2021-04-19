<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use App\Withdraw;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\View\View;

	class WithdrawController extends Controller
	{
		public function index()
		{
			$withdraws = Withdraw::all();
			return view('Admin.withdraws.index', ['withdraws' => $withdraws]);
		}

		public function pending()
		{
			$withdraws = Withdraw::where('status', 0)->paginate(15);
			return view('Admin.withdraws.pending', ['withdraws' => $withdraws]);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Response
		 */
		public function create()
		{
			//
		}

		/**
		 * Store a newly created resource in storage.
		 *
		 * @param Request $request
		 * @return Response
		 */
		public function store(Request $request)
		{
			//
		}

		/**
		 * Display the specified resource.
		 *
		 * @param int $id
		 * @return Application|Factory|Response|View
		 */
		public function show(int $id)
		{
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param int $id
		 * @return Application|Factory|Response|View
		 */
		public function edit(int $id)
		{
			$withdraw = Withdraw::where('id', $id)->firstOrFail();
			return view('Admin.withdraws.edit', ['withdraw' => $withdraw]);
		}

		/**
		 * Update the specified resource in storage.
		 *
		 * @param Request $request
		 * @param int $id
		 * @return Response
		 */
		public function update(Request $request, $id)
		{
			//
		}

		/**
		 * Remove the specified resource from storage.
		 *
		 * @param int $id
		 * @return Response
		 */
		public function destroy($id)
		{
			//
		}

		protected function approve($id, Request $request)
		{
			$withdrawData = Withdraw::where('id', $id)->firstOrFail();
			$withdrawData->update(
				[
					'approved_transaction_id' => $request->transaction_id,
					'status' => 1,
				]
			);
			return redirect(route('withdraws.index'))->with('toast_success', 'Withdraw approved successfully');
		}
	}
