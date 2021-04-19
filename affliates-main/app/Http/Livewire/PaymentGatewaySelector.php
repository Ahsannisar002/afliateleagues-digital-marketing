<?php

	namespace App\Http\Livewire;

	use App\PaymentGateway;
	use Livewire\Component;

	class PaymentGatewaySelector extends Component
	{
		public $selected_payment_gateway_id;

		public function render(PaymentGateway $paymentGateway)
		{
			$details = [];
			$paymentMethods = $paymentGateway->all();
			$details = $paymentGateway->where('id', $this->selected_payment_gateway_id)->first();
			return view('livewire.payment-gateway-selector', ['paymentMethods' => $paymentMethods, 'details' => $details]);
		}
	}
