<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UploadController extends Controller
{
    public function store(Request $request){
        $this->validate($request, [
              'textFile' => 'required'
              ]);
          if ($request->file('textFile')->isValid([])) {
              $path = $request->file('textFile')->store('public');
              return view('resultUpload')->with([
                  'filename' => basename($path),
              ]);
          } else {
              return redirect()
                  ->back()
                  ->withInput()
                  ->withErrors(['file' => '画像がアップロードされていないか不正なデータです。']);
          }
      }
}
