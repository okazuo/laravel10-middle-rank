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
</body>
</html>
