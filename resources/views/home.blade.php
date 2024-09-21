<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>こんちは
    @if (Auth::check())
        {{Auth::user()->name}}さん</p>
        <p><a href="/logout">ログアウト</a></p>
    @else
        ゲストさん</p>
        <p><a href="/register">新規登録</a><br><a href="/login">ログイン</a></p>
    @endif
    <div>
        <form action="{{route('user.index',['id' => Auth::user()->id])}}" method="get" enctype=”multipart/form-data” >
            <p>variable100<input type="text" name='variable100'></p>
            <p>num<input type="text" name='num'></p>
            <p>アップロードファイル<input type="file" name="upfile"></p>
            <button type="submit" >userコントローラのインデクスメソッド実行 -> ビューの</button>
        </form>
    </div>


    {{-- <a href="{{route('user.index',['id' => Auth::user()->id])}}">userコントローラのインデクスメソッド実行 -> ビューの</a> --}}
</body>
</html>
