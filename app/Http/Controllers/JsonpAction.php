<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class JsonpAction extends Controller
{
    public function __invoke(Request $request): JsonResponse
    {
        $response = Response::jsonp('callback', ['status' => 'success']);

        return $response;
    }
}
