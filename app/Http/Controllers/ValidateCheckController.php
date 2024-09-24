<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ValidateCheckController extends Controller
{
    public function index(Request $request)
    {
        $inputs = $request->all();
        $rule = [
            'title' => 'required|string',
            'body' => 'nullable|string',
            'number' => 'confirmed',
            'publish_at' => 'nullable|date',
        ];
        $validator = Validator::make($inputs, $rule);
        if ($validator->fails()) {
            return back();
        }

        $requestList = $request->only('title','body','number','publish_at');
        $keys = ['タイトル','ボデイ','暗証番号','日付'];
        $requestList = array_combine($keys, $requestList);
        return view('validateCheck.index',['requestList' => $requestList]);
    }
}
