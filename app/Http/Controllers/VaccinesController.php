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

    public function createAction(Vaccine $vaccine, Request $request)
    {
    	$vaccine = new \App\Vaccine();

    	$vaccine->fill(
    		$request->only("name","due_date","baby_id")
    	);


    	if($vaccine->save())
    		session()->flash('message','Vaccine save succesfully');

    	return redirect()->route('show_baby_path',['baby' => $request->baby_id]);
    }

    public function destroyVaccine($baby,$vaccine)
    {
        if($vaccine->delete())
            session()->flash('message','Vaccine deleted');

        return redirect()->route('show_baby_path',$baby->id);
    }

   
       
        

}
