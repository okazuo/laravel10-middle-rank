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

    <div style="border: 1px solid">
        <div>
            <p>リクエストをjsonで確認</p>
            <form action="{{route('user.index')}}" method="get"” >
                <p>variable100<input type="text" name='variable100'></p>
                <p>num<input type="text" name='num'>
                </p>
                @foreach ($errors->get('num') as $error)
                    {{ $error }}<br>
                @endforeach
                <button type="submit" >getリクエスト</button>
            </form>
        </div>
    </div>

    <div style="border: 1px solid;margin-top:10px">
        <p>ファイルアップロード確認</p>
        <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- アップロードファイルのバリデーションエラー -->
            @if ($errors->any())
                <div class="alert alert-danger">
                <ul>
                @foreach ($errors->get('textFile') as $error)
                    <li>{{ $error }}</li>
                @endforeach
                </ul>
                </div>
            @endif
            <input type="file" class="form-control" name="textFile">
            <p><input type="submit" value="アップロード"></p>
        </form>
    </div>

    <div style="border: 1px solid;margin-top:10px">
        <p>入力値のバリデーション試験</p>
        <form action="{{ url('/validate/index')}}" method="post">
        @csrf
            <p>タイトル<input type="text" name=title></p>
            <p>ボデイ<input type="text" name=body></p>
            <p>日付<input type="date" name=publish_at></p>
            <p><input type="submit" value="次へ"></p>
        </form>

    </div>
</body>
</html>
