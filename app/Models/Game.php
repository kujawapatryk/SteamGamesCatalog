<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Game extends Model
{
    public function genres(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Genre', 'gameGenres');
    }

    public function publishers(): BelongsToMany
    {
        return $this->belongsToMany('App\Models\Publisher', 'gamePublishers');
    }

    public function scopeBest(Builder $query): Builder
    {
        return $query->where('metacritic_score', '>' , 70)
            ->orderBy('metacritic_score', 'desc');
    }
}
