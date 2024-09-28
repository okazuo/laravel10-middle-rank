<?php

namespace App\Http\Controllers;

use App\Service\UserService;
use Illuminate\Support\Facades\Request;
use App\Http\Requests\NumRequest;

class UserController extends Controller
{
    protected $service;
    public function __construct(UserService $service) {
        $this->service = $service;
    }

    // 入力値をjson形式で確認。
    public function index(NumRequest $request)
    {
        $id = auth()->id();
        $result = $this->service->retrieve(intval($id));
        // Requestの実態を確認
        $requests['Request::get(\'id\',\'hoge\')'] = Request::get('id','hoge');
        $requests['Request::all()'] = Request::all();
        $requests['Request::only(\'varriable100\',\'age\')'] = Request::only('variable100','age');

        return view('user.show',[
            'user' => $result['user'],
            'name' => $result['name'],
            'requests' => json_encode($requests,JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE),
        ]);
    }
}
