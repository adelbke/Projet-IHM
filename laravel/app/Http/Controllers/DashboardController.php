<?php

namespace App\Http\Controllers;

use App\Collection;
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
        $collectionList = Collection::all()->where('user_id','=',auth()->user()->id);
        $collectionList->loadCount('lesions');

        $lesionsDataCount = $this->lesionsDataCount()->toJson();

        return view('Dashboard',compact('collectionList','lesionsDataCount'));
    }

    public function lesionsDataCount()
    {
        $dx= ['akiec','bcc','bkl','df','mel','nv','vasc'];
        $result = [];
        foreach ($dx as $key => $value) {
            $result[$value] = Lesion::where('dx','=',$value)->count();
        }
        return collect($result);
    }
}
