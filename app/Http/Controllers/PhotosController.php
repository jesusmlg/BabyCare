<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Photo;
use \App\Baby;
use \App\Http\Requests\CreatePhotoRequest;
use Intervention\Image\Facades\Image;

class PhotosController extends Controller
{

	private $_path = "storage/photos/";
	private $_path_thumb = "storage/photos_thumb/";

    public function newAction(Baby $baby)
    {
    	$photo = new Photo();

    	return view('photos.new', compact('baby','photo'));
    }

    public function createAction(Baby $baby, CreatePhotoRequest $request)
    {
    	$photo = new Photo();

    	if($request->photo->hasFile())
    	{
    		$filename = md5(time()) . "." . $request->photo->extension();

    		
    	}
    }
}
