<?php

namespace App\Http\Livewire\Admin;

use App\Transaction;
use Livewire\Component;

class TransactiosSearch extends Component
{
	public $user_id;
	public function render()
	{
		$transactions = [];
		$transactions = Transaction::where('user_id', 'LIKE', $this->user_id)
						->orWhere('balance_field', 'LIKE', $this->user_id . "%")
						->get();
		return view('livewire.admin.transactios-search', ['transactions' => $transactions]);
	}
}
