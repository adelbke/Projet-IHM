<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LesionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }

    public function index()
    {
        if(auth()->user()->role == "Admin"){
            return view('lesions.index');
        }
        if(auth()->user()->role == "SuperAdmin"){
            return view('lesions.superadmin.index');
        }
    }
    //
}
