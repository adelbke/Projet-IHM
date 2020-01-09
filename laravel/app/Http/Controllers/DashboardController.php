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
        return view('Dashboard');

    }
}
