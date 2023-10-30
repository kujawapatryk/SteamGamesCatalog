<?php

namespace App\Providers;

use App\Repository\Interface\GameRepositoryInterface;
use Illuminate\Support\ServiceProvider;

use App\Repository\Eloquent\GameRepository;
//use App\Repository\QueryBuilder\GameRepository;

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
