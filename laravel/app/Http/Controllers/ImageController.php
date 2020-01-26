<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Lesion;
use App\Http\Requests\ImagesRequest;
class ImageController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }

    public function create()
    {

    }

    public function show($id)
    {
        $image = Image::where('lesion_id','=',$id)->paginate(12);

        return view('Image.ImagesList',compact('image'));
    }
}
