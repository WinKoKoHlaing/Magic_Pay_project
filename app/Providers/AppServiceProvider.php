<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
// use Illuminate\Support\Facades\Schema;

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
        View::composer('*', function($view){
            $unread_noti_count = 0;
            if(auth()->guard('web')->check()){
                $unread_noti_count = auth()->guard('web')->user()->unreadNotifications()->count();
            }

            $view->with([
                'unread_noti_count' => $unread_noti_count
            ]);
        });
    }
}
