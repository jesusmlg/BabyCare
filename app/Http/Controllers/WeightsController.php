<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baby;

class WeightsController extends Controller
{
    public function indexAction($baby)
    {
    	$weights = App\Weight::where('baby_id',$baby->id);

    	return view('weights.index',compact('weights'));
    }

    public function newAction(Baby $baby)
    {
    	$weight = new \App\Weight();

    	return view('weights.new', compact('weight','baby'));
    }

    public function createAction(Request $request)
    {
    	$weight = new \App\Weight();

    	$weight->fill([
    		'baby_id' => $request->baby_id,
    		'weight' => $request->weight,
    		'date' => $request->date
    		]
    		 
    	);

    	if($weight->save())
    		session()->flash('message','Weight added');

    	return redirect()->route('show_baby_path',['baby' => $request->baby_id]);
    }
    
}
