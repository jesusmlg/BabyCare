<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Photo;
use \App\Baby;
use \App\Http\Requests\CreatePhotoRequest;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;

class PhotosController extends Controller
{

    public function newAction(Baby $baby)
    {
    	$photo = new Photo();

    	return view('photos.new', compact('baby','photo'));
    }

    public function indexAction(Baby $baby)
    {
        $photo = new Photo();
        $photos = \App\Photo::where('baby_id',$baby->id)->orderBy('date','desc')->paginate(10);

        return view('photos.index', compact('photos','photo','baby'));
    }

    public function createAction(Baby $baby, CreatePhotoRequest $request)
    {
    	
        $ok = true;

        foreach ($request->photo as $img) 
        {
            $photo = new Photo();

            $filename = md5(time()) . "." . $img->extension();    

            Storage::put(config('paths.baby_photo')."/".$baby->id."/".$filename, $this->getImg(1980,$img));
            Storage::put(config('paths.baby_thumb')."/".$baby->id."/".$filename, $this->getImg(150,$img,false));

            $photo->fill(
                $request->only('baby_id','description','date')
            );

            $photo->photo = $filename;
            $photo->photo_thumb = $filename;

            if(!$photo->save())
                $ok=false;
            
        }   

        if($ok) session()->flash('message','Photos Uploaded');   

        return redirect()->route('all_photos_path',['baby' => $baby->id ]);

    }

    public function destroyAction(Baby $baby,Photo $photo, $multiple = false)
    {
        Storage::delete([config('paths.baby_photo')."/".$baby->id."/".$photo->photo, config('paths.baby_photo')."/".$baby->id."/".$photo->photo ]);

        if($photo->delete())
            session()->flash('message','Photo deleted');

        if(!$multiple)
            return redirect()->route('all_photos_path',['baby' => $baby->id ]);
    }

    public function deleteAction(Baby $baby, Request $request)
    {
        if($request->photos)
        {
            foreach ($request->photos as $photo) 
            {                
                $photo = Photo::find($photo);
                $this->destroyAction($baby, $photo, true);
            }    
        }
        else
        {
            session()->flash('message','No photos selected');
        }

        return redirect()->route('all_photos_path',['baby' => $baby->id ]);
    }

    private function getImg($size, $img, $upsize = true)
    {
        $img = Image::make($img)->widen($size,function($constraint) use ($upsize){
                                                            if($upsize) $constraint->upsize();
                                                        }
                                                      );
        if(!$upsize) // this is for thumbnails to set the same size
            $img->fit(150);

        return $img->encode();

    }
}
