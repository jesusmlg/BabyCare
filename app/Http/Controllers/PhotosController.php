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

	private $_path = "photos/";
	private $_path_thumb = "photos_thumb/";

    public function newAction(Baby $baby)
    {
    	$photo = new Photo();

    	return view('photos.new', compact('baby','photo'));
    }

    public function createAction(Baby $baby, CreatePhotoRequest $request)
    {
    	$photo = new Photo();

    	if($request->hasFile('photo'))
    	{
    		$filename = md5(time()) . "." . $request->photo->extension();
            Storage::put($this->_path.$baby->id."/".$filename, Image::make($request->photo)
                                                                    ->widen(1024,function($constraint){
                                                                                $constraint->upsize();
                                                                        })
                                                                    ->encode());
            Storage::put($this->_path_thumb.$baby->id."/".$filename, Image::make($request->photo)->encode());

    		
    	}

        $photo->photo = "x";
        $photo->photo_thumb = "x";
        $photo->description = $request->description;
        $photo->date = $request->date;
        $photo->baby_id = $request->baby_id;

        $photo->save();
    }
}
