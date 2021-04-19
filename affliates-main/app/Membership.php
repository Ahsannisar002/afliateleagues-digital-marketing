<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class Membership extends Model
	{
		protected $guarded = [];

		public function titles(): \Illuminate\Database\Eloquent\Relations\HasMany
		{
			return $this->hasMany(Title::class);
		}
	}
