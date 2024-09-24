<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>入力値</h1>
        @foreach ($requestList as $key => $request)
        @if (isset($request))
        <p>{{$key}}:{{$request}}</p>
        @endif
        @endforeach
    </div>
</body>
</html>
