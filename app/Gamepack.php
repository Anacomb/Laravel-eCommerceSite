<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamepack extends Model
{
    public function games()
	{
	    return $this->hasMany(Game::class);
	}
}
