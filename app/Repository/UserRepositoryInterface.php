<?php

declare(stript_types=1);

namespace App\Repository;

interface UserRepositoryInterface
{
    public function find(int $id): array;
}
