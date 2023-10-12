<?php

namespace App\Providers;

use App\Repository\Interface\UserGameRepositoryInterface;
use Illuminate\Support\ServiceProvider;

use App\Repository\Eloquent\UserGameRepository;
//use App\Repository\QueryBuilder\UserGameRepository;

class UserGameServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            UserGameRepositoryInterface::class,
            UserGameRepository::class
        );//
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
