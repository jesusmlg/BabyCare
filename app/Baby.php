<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Collective\Html\Eloquent\FormAccessible;

class Baby extends Model
{
    use FormAccessible;

    protected $fillable = ['name','birthdate','genre','city','user_id'];

    //protected $dates = ['created_at', 'updated_at', 'birthdate'];
    //protected $dateFormat = 'd-m-Y H:i:s';


    public function user()
    {
    	return $this->belongsTo('App\User');
    }

    public function weights()
    {
        return $this->hasMany('App\Weight');
    }


    public function getCreatedAtAttribute($date)
	{
	    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
	}

	public function getUpdatedAtAttribute($date)
	{
	    return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d-m-Y H:i:s');
	}

	/*public function getBirthdateAttribute($date)
	{
	    return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('d-m-Y');
	}
	*/

	public function getBirthdateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
        //return \Carbon\Carbon::createFromFormat('Y-m-d', $date)->format('m-d-Y');
    }

    public function setBirthdateAttribute($value)
    {
        $this->attributes['birthdate'] = \Carbon\Carbon::parse($value)->format('Y-m-d');
        
    }

    /**
     * Get the user's first name for forms.
     *
     * @param  string  $value
     * @return string
     */
    public function formBirthdateAttribute($value)
    {
        return \Carbon\Carbon::parse($value)->format('d-m-Y');
    }
}
