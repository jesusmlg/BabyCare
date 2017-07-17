<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateBabyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'name' => 'required',
            'genre' => 'required',
            'birthdate' => 'required|date_format:d-m-Y',
            'city' => 'required',
            //'baby_photo' => 'required|max:4000|mimes:jpg,jpeg,bmp,png,gif',
        ];
    }
}
