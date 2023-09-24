<?php

declare(strict_types=1);

namespace App\Repository\Interface;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepositoryInterface
{

    public function all():Collection;
    public function get(int $id):User;
}
