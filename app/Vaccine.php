<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vaccine extends Model
{
    protected $fillable = ['name','done_date','due_date','done','baby_id'];

     public function getDueDateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
        //return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }

    public function setDueDateAttribute($value)
    {
        $this->attributes['due_date'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
    }

    public function getDueDateCarbon()
    {
        return \Carbon\Carbon::parse($this->attributes['due_date']);
    }
}
