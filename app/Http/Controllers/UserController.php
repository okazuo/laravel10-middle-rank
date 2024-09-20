<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Service\UserService;

class UserController extends Controller
{
    protected $service;
    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function index(string $id)
    {
        $result = $this->service->retrieve(intval($id));
        return view('user.index',[
            'user' => $result['user'],
            'name' => $result['name'],
        ]);

        // $user = User::find($id);
        // $addObject = $user->addObject = '日本';
        // $user->append($addObject);
        // $name = 'たろう';
        // return view('user.index',[
        //     'user' => $user,
        //     'name' => $name,
        // ]);
    }
}
