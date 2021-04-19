<?php

	namespace App\Http\Controllers\Admin;

	use App\Http\Controllers\Controller;
	use App\PaymentGateway;
	use Illuminate\Contracts\Foundation\Application;
	use Illuminate\Contracts\View\Factory;
	use Illuminate\Http\Request;
	use Illuminate\Http\Response;
	use Illuminate\Support\Facades\View;

	class PaymentGatewayController extends Controller
	{
		/**
		 * Display a listing of the resource.
		 *
		 * @return Application|Factory|View|\Illuminate\View\View
		 */
		public function index()
		{
			$paymentGateways = PaymentGateway::all();
			return view('Admin.paymentGateways.index', ['paymentGateways' => $paymentGateways]);
		}

		/**
		 * Show the form for creating a new resource.
		 *
		 * @return Application|Factory|Response|\Illuminate\View\View
		 */
		public function create()
		{
			return view('Admin.paymentGateways.create');
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
		 * @return Application|Factory|Response|\Illuminate\View\View
		 */
		public function show(int $id)
		{
			$gateway = PaymentGateway::findOrFail($id);
			return view('Admin.paymentGateways.show', ['gateway' => $gateway]);
		}

		/**
		 * Show the form for editing the specified resource.
		 *
		 * @param int $id
		 * @return Response
		 */
		public function edit($id)
		{
			//
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

		/**
		 * @param Request $request
		 * @param PaymentGateway $paymentGateway
		 * @return \Illuminate\Http\JsonResponse
		 */
		public function getRateDetailsForDestroying(Request $request, PaymentGateway $paymentGateway): \Illuminate\Http\JsonResponse
		{
			$data = $request->all();
			$rateInfo = $paymentGateway->where('id', $data['id'])->first();
			$array = ['bank_name' => $rateInfo->name];
			return response()->json($array);
		}
	}
