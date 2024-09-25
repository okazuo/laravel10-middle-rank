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
                <div>variable100<input type="text" name='variable100' value="{{ old('variable100') }}">
                    @if ($errors->has('variable100'))
                        {{$errors->first('variable100')}}
                    @endif
                </div>
                <div>num<input type="text" name='num' value="{{ old('num') }}">
                    @if ($errors->has('num'))
                        {{$errors->first('num')}}
                    @endif
                </div>
                <p><button type="submit" >getリクエスト</button></p>
            </form>
        </div>
    </div>

    <div style="border: 1px solid;margin-top:10px">
        <p>ファイルアップロード確認</p>
        <form action="{{ url('/upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="alert alert-danger">
                @if ($errors->has('textFile'))
                    {{$errors->first('textFile')}}
                @endif
            </div>
            <input type="file" class="form-control" name="textFile">
            <p><input type="submit" value="アップロード"></p>
        </form>
    </div>

    <div style="border: 1px solid;margin-top:10px">
        <p>入力値のバリデーション試験</p>
        <form action="{{ url('/validate/index')}}" method="post">
            @csrf
            <p>タイトル<input type="text" name="title" value="{{ old('title') }}">
                @if ($errors->has('title'))
                {{$errors->first('title')}}
                @endif
            </p>
            <p>ボデイ<input type="text" name="body" value="{{ old('body') }}">
                @if ($errors->has('body'))
                {{$errors->first('body')}}
                @endif
            </p>
            <p>年齢<input type="number" name="age" value="{{ old('age') }}">
                @if ($errors->has('age'))
                {{$errors->first('age')}}
                @endif
            </p>
            <p>暗証番号<input type="number" name="number">
                @if ($errors->has('number'))
                {{$errors->first('number')}}
                @endif
            </p>
            <p>暗証番号（確認用）<input type="number" name="number_confirmation"></p>
            <p>日付<input type="date" name="publish_at">
                @if ($errors->has('date'))
                {{$errors->first('date')}}
                @endif
            </p>
            <p><input type="submit" value="次へ"></p>
        </form>
    </div>
</body>
</html>
