<?php

namespace App\Providers;

use App\Http\Responses\CustomRegisterResponse;
use Laravel\Fortify\Contracts\RegisterResponse;
use Illuminate\Support\ServiceProvider;
use Laravel\Fortify\Fortify;
use Illuminate\Pagination\Paginator;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(RegisterResponse::class, CustomRegisterResponse::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Fortify::registerView(function() {
            return view('auth.register');
        });

        Fortify::loginView(function () {
            return view('auth.login');
        });


    }
}
