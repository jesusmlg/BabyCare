<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weight extends Model
{
    
    protected $fillable = ['baby_id','weight','date'];

    public function baby()
    {
    	return $this->belongsTo('App\Baby');
    }

    public function getDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
        //return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
        
    }
}
