<?php

declare(strict_types=1);

namespace App\Repository\Interface;

use App\Models\User;  //ELOQUENT
use Illuminate\Database\Eloquent\Collection;   //ELOQUENT

//use Illuminate\Database\Query\Builder;  //QUERY BUILDER
//use Illuminate\Support\Collection;     //QUERY BUILDER
interface UserRepositoryInterface
{
//    ELOQUENT
    public function all(): Collection;
    public function get(int $id): User;

    //QUERY BUILDER
//    public function all(): Collection;
//    public function get(int $id): Builder;
}
