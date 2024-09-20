<?php

declare(strict_type=1);

namespace App\Service;

use App\Repository\UserRepositoryInterface;


class UserService
{
    protected $userRepository;
    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function retrieve(int $identifier)
    {
        $user = $this->userRepository->find($identifier);
        $addObject = $user['addObject'] = '日本';
        $user[] = $addObject;
        $name = 'たろう';
        return [
            'user' => $user,
            'name' => $name,
        ];
    }

    // $user = User::find($identifier);
    // $addObject = $user->addObject = '日本';
    // $user->append($addObject);
    // $name = 'たろう';
    // return [
    //     'user' => $user,
    //     'name' => $name,
        // ];

}
