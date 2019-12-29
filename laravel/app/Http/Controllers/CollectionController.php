<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CollectionsRequest;
use App\Collection;
use App\Image;
use App\Lesion;
use App\User;

class CollectionController extends Controller
{
    public function create()
    {
        return view('photo');
    }

    public function store(CollectionsRequest $request)
    {
        $Collect = new Collection();
        $le = new Lesion();

         $Collect->user_id =auth()->user()->id;
         $Collect->save();
         $le->collection_id=$Collect->id ;

         $le->dx= $request->input('dx');
         $le->dx_type = $request->input('dx_type');
         $le->localization = $request->input('localization');
         $le->sex = $request->input('sex');
         $le->age= $request->input('age');
         $le->save();
         foreach($request->image as $photo) {
         $im = new Image();
         $im->path = $photo->store(config('images.path'),'local');
         $im->path = '/storage/'.$im->path;
         $im->lesion_id= $le->id;
         $im->save(); }
        return view('photo_accepter');
    }
}
