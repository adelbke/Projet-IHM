<?php

namespace App\Http\Controllers;

use App\Image;
use App\Lesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }

    public function index()
    {
        // If the User is the SuperAdmin
        if(auth()->user()->role == "SuperAdmin"){

            // Request Global data
            $imageCount = DB::table('images')->count(); // Number of all images
            $collectionCount = DB::table('collections')->count(); // Number of all collections
            $lesionCount = DB::table('lesions')->count();
            $userCount = DB::table('users')->where([['confirmed','=','Yes'],['role','=','Admin']])->count(); // number of contributors (Admins)
            $userPendingCount = DB::table('users')->where([['confirmed','=','Pending'],['role','=','Admin']])->count(); // number of pending users (Admins)

            // Get gender chart data
            $genderData = $this->genderData()->toJson();
            $usergenderData = $this->genderData(true)->toJson();
            return view('Dashboard',compact('imageCount','collectionCount','userCount','genderData','usergenderData','userPendingCount','lesionCount'));

        }else{
            // Number of images that belong to the admin
            $imageCount = DB::table('images')
                ->join('lesions','images.lesion_id','=','lesions.id')
                ->join('collections','lesions.collection_id','=','collections.id')->where('collections.user_id','=',auth()->user()->id)->get()->count();
            // Number of collections that belong to the Admin
            $collectionCount = DB::table('collections')->where('user_id','=',auth()->user()->id)->count();
            $lesionCount = DB::table('lesions')
                ->join('collections','lesions.collection_id','=','collections.id')
                ->where('collections.user_id','=',auth()->user()->id)->count();

            $usergenderData = $this->genderData(true)->toJson();

            return view('Dashboard',compact('imageCount','collectionCount','usergenderData','lesionCount'));
        }

    }

    private function genderData($byUser = false)
    {
        if($byUser){
            $femaleLesionsCount = DB::table('lesions')
                ->join('collections','lesions.collection_id','=','collections.id')
                ->where('lesions.sex','=','female')
                ->where('collections.user_id','=',auth()->user()->id)->count();

            $maleLesionsCount = DB::table('lesions')
                ->join('collections','lesions.collection_id','=','collections.id')
                ->where('lesions.sex','=','male')
                ->where('collections.user_id','=',auth()->user()->id)->count();

            $otherLesionsCount = DB::table('lesions')
                ->join('collections','lesions.collection_id','=','collections.id')
                ->where('lesions.sex','=','unknown')
                ->where('collections.user_id','=',auth()->user()->id)->count();

        }else{
            $femaleLesionsCount = DB::table('lesions')->where('sex','=','female')->count();
            $maleLesionsCount = DB::table('lesions')->where('sex','=','male')->count();
            $otherLesionsCount = DB::table('lesions')->where('sex','=','unknown')->count();
        }

        return collect([$maleLesionsCount,$femaleLesionsCount,$otherLesionsCount]);

    }
}
