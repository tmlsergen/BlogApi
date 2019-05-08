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
          'App\Libraries\Contacts\ServiceInterface',
          'App\Libraries\Base\Service'
        );

        $this->app->bind(
            'App\Repositories\Contacts\AuthRepositoryInterface',
            'App\Repositories\Base\AuthRepository'
        );
        $this->app->bind(
            'App\Services\Contacts\AuthServiceInterface',
            'App\Services\Base\AuthService'
        );
        $this->app->bind(
            'App\Repositories\Contacts\PostRepositoryInterface',
            'App\Repositories\Base\PostRepository'
        );
        $this->app->bind(
            'App\Services\Contacts\PostServiceInterface',
            'App\Services\Base\PostService'
        );
        $this->app->bind(
            'App\Repositories\Contacts\CommentRepositoryInterface',
            'App\Repositories\Base\CommentRepository'
        );
        $this->app->bind(
            'App\Services\Contacts\CommentServiceInterface',
            'App\Services\Base\CommentService'
        );
        $this->app->bind(
            'App\Repositories\Contacts\CategoryRepositoryInterface',
            'App\Repositories\Base\CategoryRepository'
        );
        $this->app->bind(
            'App\Services\Contacts\CategoryServiceInterface',
            'App\Services\Base\CategoryService'
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
