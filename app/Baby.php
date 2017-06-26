<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Baby extends Model
{
    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
