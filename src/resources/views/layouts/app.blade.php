<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    @yield('css')
</head>
<body>
    <header class="header-content">
        <div class = "header-content__title">
            <h1>Todo</h1>
        </div>


@if ($errors->any())<!-- エラー時のフラッシュメッセージの実装 -->
    <div class="alert alert-danger text-center mx-auto w-75 mb-3">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@elseif (session('greenMessage'))<!-- 処理成功のフラッシュメッセージの実装 -->
    <div class="alert alert-success text-center mx-auto w-75 mb-3">
        {{ session('greenMessage') }}
    </div>
@endif

    </header>
    @yield('content')
</body>
</html>