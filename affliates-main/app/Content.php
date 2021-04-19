<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Content extends Model
{
    protected $guarded = [];

	public function title(): BelongsTo
	{
		return $this->belongsTo(Title::class);
	}
}
