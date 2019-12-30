<?php

namespace App\Http\Controllers;

use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //

    public function index()
    {
        // If the User is the SuperAdmin
        if(auth()->user()->role == "SuperAdmin"){

            // Request Global data
            $imageCount = DB::table('images')->count();
            $collectionCount = DB::table('collections')->count();
            $userCount = DB::table('users')->where([['confirmed','=','Yes'],['role','=','Admin']])->count();
    
        }else{
            $imageCount = DB::table('images')
                ->join('lesions','images.lesion_id','=','lesions.id')
                ->join('collections','lesions.collection_id','=','collections.id')->where('collections.user_id','=',auth()->user()->id)->get()->count();
            $collectionCount = DB::table('collections')->where('user_id','=',auth()->user()->id)->count();
            return view('Dashboard',compact('imageCount','collectionCount'));
        }
        return view('Dashboard',compact('imageCount','collectionCount','userCount'));
    }
}
