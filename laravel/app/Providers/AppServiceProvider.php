<?php

namespace App\Providers;

use App\User;
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
<<<<<<< Updated upstream
        Schema::defaultStringLength(191);

        view()->composer('sidebars.dashboard',function ($view)
        {
            $pendingUsers = User::all()->where('role','=','Admin')->where('confirmed','=','Pending')->count();
            $view->with('pendingUsers',$pendingUsers);
        });
=======
        VerifyEmail::toMailUsing(function ($notifiable,$url){
            $mail = new MailMessage;
            $mail->subject("Vérifier l'adresse e-mail");
            $mail->line("Veuillez cliquer sur le bouton ci-dessous pour vérifier votre adresse e-mail.");
            $mail->action("Vérifier l'adresse e-mail",$url);
            $mail->line("Si vous n'avez pas créé de compte, aucune autre action n'est requise.");
           
            return $mail;
        });
       
>>>>>>> Stashed changes
    }
}
