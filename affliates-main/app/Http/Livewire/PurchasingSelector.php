<?php

namespace App\Http\Livewire;

use App\PaymentGateway;
use App\Rate;
use Livewire\Component;

class PurchasingSelector extends Component
{
	public $social_id;
	public $subscribersPrice;
	public $selected_payment_gateway_id;

	public function render(PaymentGateway $paymentGateway, Rate $rate)
    {
		$details = [];
		$rates = $rate->all();
		$subscribersRate = $rates->where('name' , '=', 'subscriberPrice')->first();
		$number = $this->subscribersPrice;
		if ($this->subscribersPrice >= 1) {
			$number++;
		}
		$paymentMethods = $paymentGateway->all();
		$details = $paymentGateway->where('id', $this->selected_payment_gateway_id)->first();
        return view('livewire.purchasing-selector', ['paymentMethods' => $paymentMethods, 'details' => $details]);
    }
}
