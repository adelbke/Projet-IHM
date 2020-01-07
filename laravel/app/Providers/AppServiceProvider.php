<?php

namespace App\Providers;

use App\User;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
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
    }
}
