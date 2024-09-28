<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActionController extends Controller
{
    public function text(Request $request)
    {
        $action = new TextAction;
        return $action($request);
    }

    public function view(Request $request)
    {
        $action = new ViewAction;
        return $action($request);
    }

    public function json(Request $request)
    {
        $action = new JsonAction;
        return $action($request);
    }

    public function jsonp(Request $request)
    {
        $action = new jsonpAction;
        return $action($request);
    }

    public function download(Request $request)
    {
        $action = new DownloadAction;
        return $action($request);
    }

    public function redirect(Request $request)
    {
        $action = new RedirectAction;
        return $action($request);
    }

    public function sse(Request $request)
    {
        $action = new StreamAction;
        return $action($request);
    }
}
