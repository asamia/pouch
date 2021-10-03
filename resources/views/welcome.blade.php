@extends('layouts.common')

@section('content')
    <div class="center jumbotron">
        <div class="text-center">
            <h1>My pouch</h1>
            <p>化粧品の使用期限を管理するWebアプリです。</p>
             {{-- ログインページへのリンク --}}
            {!! link_to_route('login', 'ログイン', [], ['class' => 'btn btn-lg btn-primary']) !!}
            {{-- ユーザ登録ページへのリンク --}}
            {!! link_to_route('signup.get', '新規登録', [], ['class' => 'btn btn-lg btn-primary']) !!}
        </div>
    </div>
@endsection