<?php

declare(strict_types=1);

namespace App\Repository\QueryBuilder;

use App\Models\Game;
use App\Repository\Interface\UserGameRepositoryInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserGameRepository implements UserGameRepositoryInterface
{
    private Builder $table;

    public function __construct()
    {
        $this->table = DB::table('userGames');
    }

    public function hasGame(int $gameId): bool
    {
        return (bool) $this->table
            ->where('user_id', Auth::id())
            ->where('game_id', $gameId)
            ->first();
    }

    public function addGame(Game $game): void
    {
        $this->table->insert([
            'user_id' => Auth::id(),
            'game_id' => $game->id
        ]);
    }

    public function removeGame(Game $game): void
    {
        if (isset($game->id)) {
            $this->table
                ->where('user_id', Auth::id())
                ->where('game_id', $game->id)
                ->delete();
        }
    }

    public function rateGame(Game $game, int $rate): void
    {
        $this->table
            ->where('user_id', Auth::id())
            ->where('game_id', $game->id)
            ->update(['rate' => $rate]);
    }
}

