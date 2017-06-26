<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeightsController extends Controller
{
    public function indexAction()
    {
    	$weights = App\Weight::all();

    	return view('')
    }
}
