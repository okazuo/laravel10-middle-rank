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
            'title' => ['required','string'],
            'body' => 'string',
            'publish_at' => 'date',
        ];
        $validator = Validator::make($inputs, $rule);
        if ($validator->fails()) {
            return back();
        }

        $requestList = $request->only('title','body','publish_at');
        return view('validateCheck.index',['requestList' => $requestList]);
    }
}
