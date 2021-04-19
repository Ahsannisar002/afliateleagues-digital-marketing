<?php

	namespace App\Http\Livewire\Admin;

	use App\Admin;
	use Livewire\Component;

	class AdminSearch extends Component
	{
		public $username;

		public function render()
		{
			$admins = [];
			$admins = Admin::where('username', 'LIKE', $this->username . "%")
				->orWhere('id', 'LIKE', $this->username)
				->orWhere('name', 'LIKE', $this->username . "%")
				->get();
			return view('livewire.admin.admin-search', ['admins' => $admins]);
		}
	}
