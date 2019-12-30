<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{
    public function index(){
        $users=User::all();
        return view('user',['users'=>$users])->with('role','SuperAdmin');
    }

    public function update(Request $request,$id){
        $user=User::findOrFail($id);
        $user->confirmed=true;
        $user->save();
        return redirect('list');
    }

    public function destroy(Request $request,$id){
        $user=User::findOrFail($id);
        $user->delete();
        return redirect('list');
    }
}
