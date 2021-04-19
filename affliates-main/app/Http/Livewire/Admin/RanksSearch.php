<?php

namespace App\Http\Livewire\Admin;

use App\Rank;
use Livewire\Component;

class RanksSearch extends Component
{
	public $rank;
    public function render()
    {
		$ranks = [];
		$ranks = Rank::where('status', 0)
			->where('user_id', 'LIKE', $this->rank. "%")
			->paginate(10);
        return view('livewire.admin.ranks-search', ['ranks' => $ranks]);
    }
}
