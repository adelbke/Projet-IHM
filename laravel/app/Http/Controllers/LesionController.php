<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LesionController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }
    //
}
