<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;


class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth'=>'verified']);
    }
    //pour afficher la liste des utilisateurs pour le super admin
    public function index(){
        $users=User::all();
        return view('userlist',['users'=>$users])->with('role','SuperAdmin');
    }
// pour que le super admin puisse confirmer un utilisateur 
    public function update(Request $request,$id){
        $user=User::findOrFail($id);
        $user->confirmed="Yes";
        $user->save();
        return redirect('list');
    }
// pour que le super admin puisse supprimer un utilisateur 
    public function destroy(Request $request,$id){
        $user=User::findOrFail($id);
        $user->confirmed='Rejected';
        $user->save();
        $user->delete();
        return redirect('list');
    }
// pour afficher les données de profile d'un utilisateur
    public function show (){
        return view('profile');
    }



}
