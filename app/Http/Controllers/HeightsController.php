<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Baby;
use App\Height;
use App\Http\Requests\CreateHeightRequest;

class HeightsController extends Controller
{
    public function indexAction(Baby $baby)
    {
    	$heights = \App\Height::where('baby_id',$baby->id)->orderBy('date','asc')->get();

    	return view('heights.index',compact('heights','baby'));
    }

    public function newAction(Baby $baby)
    {
    	$height = new \App\height();

    	return view('heights.new', compact('height','baby'));
    }

    public function createAction(CreateHeightRequest $request)
    {
    	$height = new \App\Height();

    	$height->fill([
    		'baby_id' => $request->baby_id,
    		'height' => $request->height,
    		'date' => $request->date
    		]
    		 
    	);

    	if($height->save())
    		session()->flash('message','height added');

    	return redirect()->route('show_baby_path',['baby' => $request->baby_id]);
    }
}
