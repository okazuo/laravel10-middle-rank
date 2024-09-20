<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>userディレクトリのindexビューファイルの表示完了</p>
    <ul>
        <li>id:{{$user->id}}</li>
        <li>名前:{{$user->name}}</li>
        <li>メールアドレス:{{$user->email}}</li>
        <li>登録日時:{{$user->created_at}}</li>
        <li>更新日時:{{$user->updated_at}}</li>
    </ul>
    <p>管理人：{{$user->addObject}} {{$name}}</p>
</body>
</html>
