<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Auth\Notifications\VerifyEmail;
use Illuminate\Notifications\Messages\MailMessage;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);

        view()->composer('sidebars.dashboard',function ($view)
        {
            $pendingUsers = User::all()->where('role','=','Admin')->where('confirmed','=','Pending')->count();
            $view->with('pendingUsers',$pendingUsers);
        });
        VerifyEmail::toMailUsing(function ($notifiable,$url){
            $mail = new MailMessage;
            $mail->subject("Vérifier l'adresse e-mail");
            $mail->line("Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse e-mail.");
            $mail->action("Vérifier l'adresse e-mail",$url);
            $mail->line("Si vous n'avez pas créé de compte, aucune autre action n'est requise.");

            return $mail;
        });

        view()->composer('Dashboard',function($view){

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
                $view->with(compact('imageCount','collectionCount','userCount','genderData','usergenderData','userPendingCount','lesionCount'));

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
                $view->with(compact('imageCount','collectionCount','usergenderData','lesionCount'));
            }
        });
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

