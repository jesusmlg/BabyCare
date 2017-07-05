<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use App\Http\Requests\CreateBabyRequest;
use App\Baby;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;
use \App\Weight;
use \App\Vaccine;
use Khill\Lavacharts\Lavacharts;

//use App\Http\Controllers\Input;

class BabiesController extends Controller
{    
    public function indexAction()
    {
    	$user = Auth::user();
        $babies = Baby::where('user_id',1)->get();
         
    	return view('babies.index',compact(['babies']));
    }

    public function createAction(\App\Http\Requests\CreateBabyRequest $request)
    {
        $baby = new Baby();

        $baby->fill(
            $request->only('name','city','genre','birthdate') 
        );
        $baby->user_id = Auth::user()->id;

        if($baby->save())
            session()->flash('message','Baby Created');

        return redirect()->route('all_babies_path');

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
        

        $baby->fill(
            $request->only('name','city','genre','birthdate')
        );
 
        if ($request->hasFile('baby_photo')) 
        {
            if($baby->baby_photo && Storage::exists('public/img/babies/'.$baby->baby_photo))
                Storage::delete(['public/img/babies/'.$baby->baby_photo]);

            
            $filename = md5(time()).'.'. $request->baby_photo->extension();

            //$path = $request->baby_photo->storeAs('public/img/babies', $filename);

            //$imgtmp = Image::make($request->baby_photo)->resize(80, 80)->save(public_path('img/'.$filename));
            $imgtmp = Image::make($request->baby_photo)->fit(250)->save(public_path('img/'.$filename));

            Storage::put('public/img/babies/'. $filename, $imgtmp);
            File::delete(public_path('img/'.$filename));
            $baby->baby_photo = $filename;
        }

        $baby->save();

        return redirect()->route('all_babies_path');
    }

    public function deleteAction(Baby $baby, Request $request)
    {
        if($baby->delete())
        {
            session()->flash('message','Baby deleted correctly');
        }

        return redirect()->route('all_babies_path');
    }

    public function showAction(Baby $baby, Request $request)
    {
        $weight = new \App\Weight();
        
        $vaccine = new Vaccine();
        
        $vaccines = \App\Vaccine::where('baby_id', $baby->id)
                                ->where('done',0)
                                ->orderBy('due_date','asc')
                                ->skip(0)
                                ->take(2)
                                ->get();

        $lava = new \Khill\Lavacharts\Lavacharts;

        $data = \App\Weight::select('date as 0','weight as 1')->where('baby_id',$baby->id)->orderBy('date','asc')->get()->toArray();

        $population = $lava->DataTable();

        $population->addDateColumn('Date')
                    ->addNumberColumn('Weight')
                    ->addRows($data);

        $lava->AreaChart('BabyWeights',$population,['ticle' => 'weight of my baby', 'lenged' => ['position' =>'in'] ]);

        return view('babies.show',compact('baby','weight','lava','vaccine','vaccines'));
    }

}
