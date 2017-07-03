<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Vaccine;
use \App\Baby;

class VaccinesController extends Controller
{
    public function indexAction(Baby $baby)
    {
    	$vaccine = new Vaccine();
    	$allVaccines = Vaccine::where('baby_id', $baby->id);

    	return view('vaccines.index', compact('vaccine','allVaccines'));
    }


}
