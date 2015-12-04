<?php

namespace Onlinecorrection\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(
            'Onlinecorrection\Repositories\ProjectRepository',
            'Onlinecorrection\Repositories\ProjectRepositoryEloquent'
        );

        $this->app->bind(
            'Onlinecorrection\Repositories\UserRepository',
            'Onlinecorrection\Repositories\UserRepositoryEloquent'
        );
    }
}
