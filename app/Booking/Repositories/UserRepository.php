<?php

namespace App\Booking\Repositories;

use Illuminate\Support\Facades\DB;

class UserRepository implements UserRepositoryInterface
{
    private string $table = 'users';

    public function getUser(int $userId)
    {
        return DB::table($this->table)->where('id', '=', $userId)->first();
    }
}
