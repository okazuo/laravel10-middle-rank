<?php

declare(strict_type=1);

namespace App\Service;

use App\Models\User;
use PhpParser\Node\Identifier;


class UserService
{
    public function retrieve (int $identifier)
    {
        $user = User::find($identifier);
        $addObject = $user->addObject = '日本';
        $user->append($addObject);
        $name = 'たろう';
        return [
            'user' => $user,
            'name' => $name,
        ];
    }
}
