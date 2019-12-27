<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
use App\Lesion;
use App\Http\Requests\ImagesRequest;
class ImageController extends Controller
{
    public function create()
    {
        return view('photo');
    }

    public function store(ImagesRequest $request)
    { $im = new Image();
      $le = new Lesion();
        $im->path = $request->image->store(config('images.path'), 'local');

         $le->collection_id=1;
         $le->dx= $request->input('dx');
         $le->dx_type = $request->input('dx_type');
         $le->localization = $request->input('localization');
         $le->sex = $request->input('sex');
         $le->age= $request->input('age');
         $le->save();
         $im->lesion_id=$le->id;
         $im->save();
        return view('photo_accepter');
    }

}
