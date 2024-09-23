<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request){
        //存在チェック
        $this->validate($request, [
              'textFile' => 'required'
              ]);
          if ($request->file('textFile')->isValid([])) {
                // サーバーに保存。
              $path = $request->file('textFile')->store('public');
              return view('resultUpload')->with([
                  'filename' => basename($path),
                  'requests' => $request->file('textFile')->getClientOriginalName(),
              ]);
          } else {
              return redirect()
                  ->back()
                  ->withInput()
                  ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
          }

        // アップロードしたファイルを取得する。
        // $file = Request::file('textFile');
        // $content = file_get_contents($file->getRealPath());

        // return view('resultUpload',[
        //     'requests' => $content,
        // ]);
    }
}
