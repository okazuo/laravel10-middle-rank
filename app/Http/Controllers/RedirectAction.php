<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class RedirectAction extends Controller
{
    public function __invoke(Request $request): RedirectResponse
    {
        $response = redirect('/');

        return $response;
    }
}
