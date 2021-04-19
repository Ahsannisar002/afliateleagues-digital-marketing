<?php

	namespace App\Http\Controllers;

	use App\Membership;
	use App\PaymentGateway;
	use App\PendingMembership;
	use Illuminate\Http\JsonResponse;
	use Illuminate\Http\RedirectResponse;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Validator;
	use Illuminate\Validation\ValidationException;

	class MembershipController extends Controller
	{

		public function create(Membership $membership, PendingMembership $pendingMembership)
		{
			$packages = $membership->all();
			$pendingPackages = $pendingMembership->where('user_id', current_user()->id)->get();
			return view('purchase.membership', ['packages' => $packages, 'pendingPackages' => $pendingPackages]);
		}

		public function store(Request $request, PendingMembership $PendingMembership)
		{
			$validatedData = $this->validator($request->all())->validate();
			$selectedMembershipName = $validatedData['name'];
			if (current_user()->purchasing_status === 'can_not') {
				throw ValidationException::withMessages([
					'purchasing_status' => 'A membership request is in pending Already.'
				]);
			} else {
				if ($selectedMembershipName === 'challenge_acceptance') {
					$membershipData = Membership::where('name', 'challenge_acceptance')->first();

					$this->purchasingRequest($membershipData, $PendingMembership, $validatedData);
					return redirect(route('membership.create'))->withToastSuccess('The Purchasing  request for ' . $selectedMembershipName . ' package sent Successfully');

				} elseif ($selectedMembershipName === 'challenge_booster') {
					$packageData = Membership::where('name', 'challenge_booster')->first();
					$this->purchasingRequest($packageData, $PendingMembership, $validatedData);
					return redirect(route('membership.create'))->withToastSuccess('The Purchasing  request for ' . $selectedMembershipName . ' package sent Successfully');
				} elseif ($selectedMembershipName === 'challenge_runner') {
					$packageData = Membership::where('name', 'challenge_runner')->first();
					$this->purchasingRequest($packageData, $PendingMembership, $validatedData);
					return redirect(route('membership.create'))->withToastSuccess('The Purchasing  request for ' . $selectedMembershipName . ' package sent Successfully');
				}
			}
		}

		protected function validator(array $data): \Illuminate\Contracts\Validation\Validator
		{
			$message = [
				'name.required' => 'Select a Package',
				'transaction_id.required' => 'Transaction Id is required'
			];
			return Validator::make($data, [
				'name' => ['required', 'string', 'exists:memberships,name'],
				'transaction_id' => ['required', 'string', 'regex:/^([A-Za-z0-9\_#]+)$/'],
				'payment_gateway_id' => ['required', 'exists:payment_gateways,id'],
			], $message);
		}

		protected function purchasingRequest($membershipData, $PendingMembership, $validatedData)
		{
			$id = $membershipData->id;

			$price = $membershipData->price + $membershipData->fee;

			$PendingMembership->add(current_user()->id, $id, $validatedData['payment_gateway_id'], $validatedData['transaction_id'], $price);

			current_user()->update(
				[
					'purchasing_status' => 'can_not'
				]
			);
		}

		public function getPackagePrice(Request $request, Membership $membership): JsonResponse
		{
			$value = $this->validator($request->all())->validate();
			$membershipInfo = $membership->where('name', $value['name'])->first();
			if ($membershipInfo === null) {
				throw ValidationException::withMessages([
					'name' => 'Package dose not exists'
				]);
			} else {
				$name = $value['name'];
				$price = $membershipInfo['price'];
				$fee = $membershipInfo['fee'];
				$array = ['name' => $name, 'price' => $price, 'fee' => $fee];
				return response()->json($array);
			}
		}
	}
