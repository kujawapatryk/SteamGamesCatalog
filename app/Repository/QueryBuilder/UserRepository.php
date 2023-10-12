<?php
declare(strict_types=1);

namespace App\Repository\QueryBuilder;

use App\Repository\Interface\UserRepositoryInterface;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use stdClass;

class UserRepository implements UserRepositoryInterface {

    private Builder $table;

    public function __construct(){
        $this->table = DB::table('users');
    }

    public function all() :Collection
    {
        return $this->table->select('id', 'name', 'email')->get();
    }

    public function get(int $id): ?stdClass
    {
        return $this->table->select('id', 'name', 'email')->where('id', $id)->first();
    }
}
