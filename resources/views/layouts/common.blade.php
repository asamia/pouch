<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>Mypouch</title>
        {{-- レスポンシブ対応 --}}
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        {{-- SEOのためのページ詳細表示 --}}
        <meta name="description" content="化粧品使用期限管理アプリ">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
        
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    </head>
    
    <body>
        
        {{-- ナビゲーションバー --}}
        @include('layouts.navbar')
        
        <div class="container">
            
             {{-- エラーメッセージ --}}
            @include('error_messages')
            @yield('content')
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    </body>
</html>