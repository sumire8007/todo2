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
    <header>
        <div class="header">
            <div class = "header__logo">
                <a href="/"><h1>Todo</h1></a>
                <nav class="header_nav">
                    <a href="/categories">カテゴリ一覧</a>
                </nav>
            </div>
        </div>

@if ($errors->any())<!-- エラー時のフラッシュメッセージの実装 -->
    <div class="alert alert-danger text-center">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@elseif (session('greenMessage'))<!-- 処理成功のフラッシュメッセージの実装 -->
    <div class="alert alert-success text-center">
        {{ session('greenMessage') }}
    </div>
@endif

    </header>
    @yield('content')
</body>
</html>