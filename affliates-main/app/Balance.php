<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Balance extends Model
	{
		use Bbalance;
		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $guarded = [];

		/**
		 * The attributes that should be cast to native types.
		 *
		 * @var array
		 */
		protected $casts = [
			'id' => 'integer',
			'user_id' => 'integer',
		];

		public function user()
		{
			$this->belongsTo(User::class);
		}
	}
