<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baby;

class BabiesController extends Controller
{
    public function showHello($id)
    {
    	$baby = Baby::find($id);
    	return 'eyyyyyyyyyyy '.$baby->name;
    }

    public function indexAction()
    {
    	$babies = Baby::all();

    	return view('babies.index',compact('babies'));
    }
}
