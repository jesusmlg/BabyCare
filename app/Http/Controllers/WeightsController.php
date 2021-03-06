<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baby;
use App\Http\Requests\CreateWeightRequest;

class WeightsController extends Controller
{
    public function indexAction(Baby $baby)
    {
    	$weights = \App\Weight::where('baby_id',$baby->id)->orderBy('date','asc')->get();

    	return view('weights.index',compact('weights','baby'));
    }

    public function newAction(Baby $baby)
    {
    	$weight = new \App\Weight();

    	return view('weights.new', compact('weight','baby'));
    }

    public function createAction(CreateWeightRequest $request)
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
