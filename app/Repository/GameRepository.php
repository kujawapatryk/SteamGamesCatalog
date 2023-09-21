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

    public function showDetails(int $id){

        return $this->gameModel
            ->where('id', $id)
            ->first();
    }

    public function stats(): array
    {

        return [
            'count' => $this->gameModel->count(),
            'countScoreGtSeventy' => $this->gameModel->where('metacritic_score', '>=', 70)->count(),
            'avg' => round($this->gameModel->avg('metacritic_score'), 2),
            'max' => $this->gameModel->max('metacritic_score'),
            'min' => $this->gameModel->min('metacritic_score'),
        ];

    }

    public function best()
    {
        return $this->gameModel
            ->with('genres')
            ->best()
            ->get();

    }

    public function scoreStats()
    {
        return $this->gameModel->select(
            $this->gameModel->raw('count(*) as count'), 'metacritic_score'
        )
            ->having('metacritic_score', '>=', 70)
            ->groupBy('metacritic_score')
            ->orderBy('metacritic_score', 'desc')
            ->get();
        }
}
