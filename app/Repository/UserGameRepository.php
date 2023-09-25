<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\Game;
use App\Repository\Interface\UserGameRepositoryInterface;
use Illuminate\Support\Facades\Auth;


class UserGameRepository implements UserGameRepositoryInterface
{

    public function hasGame(int $gameId): bool
    {
        return (boolean)Auth::user()->games()->where('userGames.game_id', $gameId)->first();
    }

    public function addGame(Game $game): void
    {
        Auth::user()->games()->save($game);
    }

    public function removeGame(Game $game): void
    {
        if (isset($game->id)) {
            Auth::user()->games()->detach($game->id);
        }
    }

    public function rateGame(Game $game, int $rate): void
    {
        Auth::user()->games()->updateExistingPivot($game, ['rate' => $rate]);
    }
}
