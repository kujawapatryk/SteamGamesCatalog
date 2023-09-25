<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Publisher extends Model
{
    public function games():BelongsToMany{
        return$this->belongsToMany('App\Models\Game', 'gamePublishers');
    }
}
