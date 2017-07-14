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
use \App\Height;
use \App\Vaccine;
use \App\Photo;
use Khill\Lavacharts\Lavacharts;

//use App\Http\Controllers\Input;

class BabiesController extends Controller
{       

    public function indexAction()
    {
    	$user = Auth::user();
        $babies = Baby::where('user_id',Auth::id())->get();
         
    	return view('babies.index',compact(['babies']));
    }

    public function createAction(\App\Http\Requests\CreateBabyRequest $request)
    {
        $baby = new Baby();

        $baby->fill(
            $request->only('name','city','genre','birthdate') 
        );
        $baby->user_id = Auth::user()->id;

        $filename = md5(time()).'.'. $request->baby_photo->extension();

        Storage::put(config('paths.baby_avatar').'/'.$filename, Image::make($request->baby_photo)->fit(250,function($constraint){
                                                                                          $constraint->upsize();
                                                                                            }
                                                                                        )
                                                                                 ->encode());
        $baby->baby_photo = $filename;

        if($baby->save())
            session()->flash('message','Baby Created');

        return redirect()->route('all_babies_path');

    }

    public function newAction()
    {
        $baby = new Baby();

        return view('babies.new',compact('baby'));
    }

    

    public function editAction(Baby $baby)
    {        

        return view('babies.edit',compact('baby'));        
    }

    public function updateAction(Baby $baby, \App\Http\Requests\CreateBabyRequest $request)
    {
        

        $baby->fill(
            $request->only('name','city','genre','birthdate')
        );
 
        if ($request->hasFile('baby_photo')) 
        {
            if($baby->baby_photo && Storage::exists(config('paths.baby_avatar').'/'.$baby->baby_photo))
                Storage::delete([config('paths.baby_avatar').'/'.$baby->baby_photo]);

            
            $filename = md5(time()).'.'. $request->baby_photo->extension();

            Storage::put(config('paths.baby_avatar').'/'.$filename, Image::make($request->baby_photo)->widen(250,function($constraint){
                                                                                          $constraint->upsize();
                                                                                            }
                                                                                        )
                                                                                 ->encode());

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
        $height = new \App\Height();
        
        $vaccine = new Vaccine();
        
        $vaccines = \App\Vaccine::where('baby_id', $baby->id)
                                ->where('done',0)
                                ->orderBy('due_date','asc')
                                ->skip(0)
                                ->take(50)
                                ->get();
        $photos = \App\Photo::where('baby_id',$baby->id)
                            ->orderBy('date','desc')
                            ->skip(0)
                            ->take(4)
                            ->get();

        //$lava = new \Khill\Lavacharts\Lavacharts;
        //$lavaHeights = new \Khill\Lavacharts\Lavacharts;

        $data = \App\Weight::select('date as 0','weight as 1')->where('baby_id',$baby->id)->orderBy('date','asc')->get()->toArray();
        $dataHeights= \App\Height::select('date as 0','height as 1')->where('baby_id',$baby->id)->orderBy('date','asc')->get()->toArray();

        $population = \Lava::DataTable();
        $populationHeights = \Lava::DataTable();

        $population->addDateColumn('Date')
                    ->addNumberColumn('Weight')
                    ->addRows($data);
        $populationHeights->addDateColumn('Date')
                    ->addNumberColumn('Height')
                    ->addRows($dataHeights);

        \Lava::AreaChart('BabyHeights',$populationHeights,['title' => '']);

        \Lava::AreaChart('BabyWeights',$population,['title' => '']);


        if($request->ajax())
        {
            return view('vaccines._index',compact('baby','vaccines','vaccine'));            
        }

        return view('babies.show',compact('baby','weight','height','population','populationHeights','vaccine','vaccines','photos'));
    }

}
