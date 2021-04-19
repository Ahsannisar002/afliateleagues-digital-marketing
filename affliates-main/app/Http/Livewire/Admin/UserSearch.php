<?php

	namespace App\Http\Livewire\Admin;

	use App\User;
	use Livewire\Component;

	class UserSearch extends Component
	{
		public $username;

		public function render()
		{
			$users = [];
			$users = User::where('username', 'LIKE', $this->username . "%")
				->orWhere('id', 'LIKE', $this->username)
				->orWhere('account_id', 'LIKE', $this->username)
				->orWhere('name', 'LIKE', $this->username . "%")
				->paginate(10);
			return view('livewire.admin.user-search', ['users' => $users]);
		}
	}
