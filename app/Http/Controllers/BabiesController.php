<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baby;
use Illuminate\Support\Facades\Auth;

class BabiesController extends Controller
{
    public function showHello($id)
    {
    	$baby = Baby::find($id);
    	return 'eyyyyyyyyyyy '.$baby->name;
    }

    public function indexAction()
    {
    	$user = Auth::user();
        $babies = Baby::where('user_id',1);
        //$babies = Baby::all(); 
    	return view('babies.index',compact(['babies']));
    }

    public function createAction()
    {
        $baby = new App\Baby();

    }
}
