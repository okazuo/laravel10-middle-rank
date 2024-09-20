<?php

declare(stript_types=1);

namespace App\Repository;

use App\Models\User;

class UserRepository implements UserRepositoryInterface
{
    public function find(int $id): array
    {
        $user = User::find($id)->toArray();

        return $user;
    }
}
