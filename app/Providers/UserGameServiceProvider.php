<?php

namespace App\Providers;


use App\Repository\Interface\UserGameRepositoryInterface;
use App\Repository\UserGameRepository;
use Illuminate\Support\ServiceProvider;

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
