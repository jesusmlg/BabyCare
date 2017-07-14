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

        if($request->ajax())
        {
            return response()->json(['messange' => 'ok']);
        }

    	return redirect()->route('show_baby_path',['baby' => $request->baby_id]);
    }

    public function deleteAction(Baby $baby,Vaccine $vaccine, Request $request)
    {
        if($vaccine->delete())
            session()->flash('message','Vaccine deleted');

        if($request->ajax())
        {
            return response()->json(['message' => 'ok']);
        }

        return redirect()->route('show_baby_path',$baby->id);
    }

   
       
        

}
