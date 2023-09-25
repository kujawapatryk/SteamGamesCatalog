<?php

declare(strict_types=1);

namespace App\Repository\Interface;


use App\Models\Game;

interface UserGameRepositoryInterface
{
    public function hasGame(int $gameId): bool;

    public function addGame(Game $game): void;

    public function removeGame(Game $game): void;

    public function rateGame(Game $game, int $rate);
}
