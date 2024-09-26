<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\TextAction;
use Symfony\Component\HttpKernel\Event\ViewEvent;

class ValidateCheckController extends Controller
{
    public function index(Request $request)
    {
        $rules = [
            'title' => 'required',
            'body' => 'nullable|ascii_alpha',
            'number' => 'confirmed',
            'publish_at' => 'nullable|date',
        ];

        $viewAction = new ViewAction();
        $viewAction = $viewAction($request);


        Validator::extend('ascii_alpha', function($attribute, $value, $parameters)
        // 半角アルファベットを追加
        {
            return preg_match('/^[a-zA-Z]+$/',$value);
        });
        // バリデーションチェック
        $validator = Validator::make($request->all(), $rules);
        // 20以上は暗証番号を必須項目にする。
        $validator->sometimes('number','required',function($request){
            return $request->age >= '20';
        });
        // NGの場合はリダイレクト
        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        // バリデーションで弾かれた時の処理を定めたい時の記述
        // $inputs = $request->all();
        // $validator = Validator::make($inputs, $rule);
        // if ($validator->fails()) {
        //     return back();
        // }

        $requestList = $request->only('title','body','age','number','publish_at');
        $keys = ['タイトル','ボデイ','年齢','暗証番号','日付'];
        $requestList = array_combine($keys, $requestList);
        return view('validateCheck.index',['requestList' => $requestList]);
    }
}
