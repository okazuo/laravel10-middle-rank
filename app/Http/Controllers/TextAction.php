<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response as IlluminateResponse;
use Illuminate\Support\Facades\Response;
use function response;
use function view;

class TextAction extends Controller
{
    public function __invoke(Request $request)
    {
        $response = Response::make('hello world');
        $response = response('hello world');
        $response = response(
            'hello world',
            IlluminateResponse::HTTP_OK,
            [
                'content-type' => 'text/plain'
            ]
        );
        dd($response);
        return $response;
    }
}
