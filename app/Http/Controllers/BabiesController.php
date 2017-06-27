<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\CreateBabyRequest;
use App\Baby;
use Illuminate\Support\Facades\Auth;

class BabiesController extends Controller
{    
    public function indexAction()
    {
    	$user = Auth::user();
        $babies = Baby::where('user_id',1)->get();
         
    	return view('babies.index',compact(['babies']));
    }

    public function createAction()
    {
        $baby = new App\Baby();

    }

    public function newAction()
    {
        $baby = new Baby();

        return view('babies.new',compact('baby'));
    }

    

    public function editAction($id)
    {
        $baby = Baby::find($id);

        return view('babies.edit',compact('baby'));        
    }

    public function updateAction(Baby $baby, \App\Http\Requests\CreateBabyRequest $request)
    {
        $baby->update(
            $request->only('name','city','genre','birthdate')
        );

        $baby->save();

        return redirect()->route('all_babies_path');
    }

}
