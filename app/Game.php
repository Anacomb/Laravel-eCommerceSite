<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function gamepack()
	{
	    return $this->belongsTo(Gamepacks::class);
	}
}
