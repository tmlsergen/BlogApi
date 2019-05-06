<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Passport\Passport;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(
            'App\Repositories\Contacts\AuthRepositoryInterface',
            'App\Repositories\Base\AuthRepository'
        );
        $this->app->bind(
            'App\Services\Contacts\AuthServiceInterface',
            'App\Services\Base\AuthService'
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Passport::routes();
    }
}
