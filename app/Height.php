<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Height extends Model
{
    protected $fillable = ['height','date','baby_id'];

    public function geteDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
        //return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    public function getDateCarbon()
    {
        return \Carbon\Carbon::parse($this->attributes['date']);
    }
}
