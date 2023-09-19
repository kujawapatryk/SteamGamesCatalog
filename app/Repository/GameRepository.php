<?php

declare(strict_types=1);

namespace App\Repository;

use App\Repository\Interface\GameRepositoryInterface;
use App\Models\Game;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class GameRepository implements GameRepositoryInterface{
    private Game $gameModel;
    public function __construct(Game $gameModel){
        $this->gameModel = $gameModel;
    }

    public function filterBy(?string $phrase, string $type = self::TYPE_DEFAULT, int $limit = self::LIMIT) : LengthAwarePaginator
    {
        $query = $this->gameModel
            ->with('genres')
            ->orderBy('created_at');
        if($type != self::TYPE_ALL){
            $query->where('type', $type);
        }

        if($phrase){
            $query->whereRaw('name like ?', ["$phrase%"]);
        }
        return $query->paginate($limit);
    }
}