<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index(string $id)
    {
        $user = User::find($id);
        $addObject = $user->addObject = '日本';
        $user->append($addObject);
        $name = 'たろう';
        return view('user.index',[
            'user' => $user,
            'name' => $name,
        ]);
    }
}
