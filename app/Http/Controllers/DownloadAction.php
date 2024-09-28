<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

use function response;


class DownloadAction extends Controller
{
    public function __invoke(Request $request) :BinaryFileResponse
    {
        $response = Response::download('/var/www/html/storage/app/public/zffoGW98DDZrIHIQoC8c2EFRQ4OBCTwHY9e1gZi2.png');
        $response = response()->download('/var/www/html/storage/app/public/zffoGW98DDZrIHIQoC8c2EFRQ4OBCTwHY9e1gZi2.png');
        return $response;
    }
}
