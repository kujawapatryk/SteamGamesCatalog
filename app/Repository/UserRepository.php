<?php

declare(strict_types=1);

namespace App\Repository;

use App\Models\User;
use App\Repository\Interface\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class UserRepository implements UserRepositoryInterface {

    private User $user;
    public function __construct(User $user){
        $this->user = $user;
    }

    public function all(): Collection
    {
        return $this->user->get();
    }

    public function get(int $id): User
    {
       return $this->user->find($id);
    }
}
