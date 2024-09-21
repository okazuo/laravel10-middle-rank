<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Support\Facades\Request;
use Illuminate\Http\Request as aaa;

class UserController extends Controller
{
    protected $service;
    public function __construct(UserService $service) {
        $this->service = $service;
    }

    public function index(string $id, aaa $request)
    {
        $result = $this->service->retrieve(intval($id));
        $requests['Request::get(\'id\',\'hoge\')'] = Request::get('id','hoge');
        $requests['Request::all()'] = Request::all();
        $requests['Request::only(\'varriable100\',\'id\')'] = Request::only('variable100','age');


        return view('user.index',[
            'user' => $result['user'],
            'name' => $result['name'],
            'requests' => json_encode($requests,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
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
