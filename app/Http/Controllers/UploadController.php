<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;

class UploadController extends Controller
{
    public function store(){
        // $this->validate($request, [
        //       'textFile' => 'required'
        //       ]);
        //   if ($request->file('textFile')->isValid([])) {
        //       $path = $request->file('textFile')->store('public');
        //       return view('resultUpload')->with([
        //           'filename' => basename($path),
        //       ]);
        //   } else {
        //       return redirect()
        //           ->back()
        //           ->withInput()
        //           ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
        //   }

        // アップロードしたファイルを取得する。
        $file = Request::file('textFile');
        $content = file_get_contents($file->getRealPath());

        return view('resultUpload',[
            'requests' => $content,
        ]);
    }
}
