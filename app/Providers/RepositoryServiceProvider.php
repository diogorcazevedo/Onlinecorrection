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
            'Onlinecorrection\Repositories\UserRepository',
            'Onlinecorrection\Repositories\UserRepositoryEloquent'
        );

        $this->app->bind(
            'Onlinecorrection\Repositories\ClientRepository',
            'Onlinecorrection\Repositories\ClientRepositoryEloquent'
        );

        $this->app->bind(
            'Onlinecorrection\Repositories\ProjectRepository',
            'Onlinecorrection\Repositories\ProjectRepositoryEloquent'
        );

        $this->app->bind(
            'Onlinecorrection\Repositories\DocumentRepository',
            'Onlinecorrection\Repositories\DocumentRepositoryEloquent'
        );

        $this->app->bind(
            'Onlinecorrection\Repositories\OrderRepository',
            'Onlinecorrection\Repositories\OrderRepositoryEloquent'
        );

        $this->app->bind(
            'Onlinecorrection\Repositories\OrderItemRepository',
            'Onlinecorrection\Repositories\OrderItemRepositoryEloquent'
        );

        $this->app->bind(
            'Onlinecorrection\Repositories\DocumentImageRepository',
            'Onlinecorrection\Repositories\DocumentImageRepositoryEloquent'
        );

    }
}
