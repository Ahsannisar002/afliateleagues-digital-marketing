<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Title extends Model
{
    protected $guarded = [];

	public function membership(): BelongsTo
	{
		return $this->belongsTo(Membership::class);
	}

	public function content(): HasOne
	{
		return $this->hasOne(Content::class);
	}
}
