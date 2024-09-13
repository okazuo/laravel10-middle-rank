<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    {{-- @isset($errors)
        <p>{{$errors->first('message')}}</p>
    @endisset --}}
    {{session('message')}}

    <form name="loginform" method="post" action="/login" id="loginform">
        @csrf
        <dl>
            <dt>メールアドレス</dt>
            <dd><input type="text" name="email" size="30">
        </dl>
        <dl>
            <dt>パスワード</dt>
            <dd><input type="text" name="password" size="30">
        </dl>
        <button type="submit" name="action" value="send">送信</button>
    </form>
</body>
</html>
