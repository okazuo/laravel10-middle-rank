<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class StreamAction extends Controller
{
    public function __invoke(Request $request): StreamedResponse
    {

        return response()->stream(
            function(){
                while(true){
                    echo 'data:' .rand(1,100) ,"\n\n";
                    ob_flush();
                    flush();
                    usleep(200000);
                }
            },
            Response::HTTP_OK,
            [
                'content-type' => 'text/event-stream',
                'X-Accel-Buffering' => 'no',
                'Cache-Control' => 'no-cache',
            ]
        );
    }
}
