<?php

namespace App\Providers;

use App\Repository\Interface\GameRepositoryInterface;
use App\Repository\GameRepository;
use Illuminate\Support\ServiceProvider;

class GameServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton(
            GameRepositoryInterface::class,
            GameRepository::class
        );

        $this->app->singleton('game', GameRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
