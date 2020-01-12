<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Collection;
use App\Lesion;
use App\Image;

class LesionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);

    }

    public function index()
    {
        if(auth()->user()->role == "Admin"){
            $Collection = Collection::all()->where('user_id','=',auth()->user()->id);
            $Lesion = Lesion::all();
            $Image = Image::all();
            return view('lesions.index',compact('Collection','Lesion','Image'));
        }
        if(auth()->user()->role == "SuperAdmin"){
            $Collection = Collection::all();
            $Lesion = Lesion::all();
            $Image = Image::all();

            return view('lesions.superadmin.index',compact('Collection','Lesion','Image'));
        }
    }

    //
}
