<?php

declare(strict_types=1);

namespace App\Repository\QueryBuilder;

use App\Repository\Interface\GameRepositoryInterface;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\DatabaseManager;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class GameRepository implements GameRepositoryInterface {
    private Builder $table;

    public function __construct(){
        $this->table = DB::table('games');
    }

    public function get(int $id){
        return $this->table->where('id', $id)->first();
    }

    public function filterBy(?string $phrase, string $type = self::TYPE_DEFAULT, int $limit = self::LIMIT) : LengthAwarePaginator
    {
        $query = $this->table->orderBy('created_at');

        if ($type !== self::TYPE_ALL) {
            $query->where('type', $type);
        }

        if ($phrase) {
            $query->where('name', 'like', '%' . $phrase . '%');
        }

        $games = $query->paginate($limit);

        $gameIds = $games->pluck('id')->toArray();

        $genresData = DB::table('gameGenres')
            ->join('genres', 'gameGenres.genre_id', '=', 'genres.id')
            ->whereIn('gameGenres.game_id', $gameIds)
            ->select('gameGenres.game_id', 'genres.name')
            ->get()
            ->groupBy('game_id');

        foreach ($games as $game) {
            $game->genres = $genresData->get($game->id, collect());
        }

        return $games;
    }

    public function showDetails(int $id)
    {

        $game = $this->table->where('id', $id)->first();

        if (!$game) {
            return null;
        }

        $game->genres = DB::table('gameGenres')
            ->join('genres', 'gameGenres.genre_id', '=', 'genres.id')
            ->where('gameGenres.game_id', $id)
            ->select('genres.name')
            ->get();

        $game->publishers = DB::table('gamePublishers')
            ->join('publishers', 'gamePublishers.publisher_id', '=', 'publishers.id')
            ->where('gamePublishers.game_id', $id)
            ->select('publishers.name')
            ->get();

        return $game;
    }

    public function stats(): array
    {
        return [
            'count' => $this->table->count(),
            'countScoreGtSeventy' => $this->table->where('metacritic_score', '>=', 70)->count(),
            'avg' => round($this->table->avg('metacritic_score'), 2),
            'max' => $this->table->max('metacritic_score'),
            'min' => $this->table->min('metacritic_score'),
        ];
    }

    public function best()
    {

        $bestGames = $this->table
            ->where('metacritic_score', '>', 70)
            ->orderBy('metacritic_score', 'desc')
            ->get();

        $gameIds = $bestGames->pluck('id')->toArray();

        $genres = DB::table('gameGenres')
            ->join('genres', 'gameGenres.genre_id', '=', 'genres.id')
            ->whereIn('gameGenres.game_id', $gameIds)
            ->select('gameGenres.game_id', 'genres.name')
            ->get()
            ->groupBy('game_id');

        foreach ($bestGames as $game) {
            $game->genres = $genres->get($game->id, collect());
        }

        return $bestGames;

    }

    public function scoreStats()
    {
        return $this->table->select(
            $this->table->raw('count(*) as count'), 'metacritic_score'
        )
            ->having('metacritic_score', '>=', 70)
            ->groupBy('metacritic_score')
            ->orderBy('metacritic_score', 'desc')
            ->get();
    }
}
