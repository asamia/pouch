@extends('layouts.common')

@section('content')
    <div class="text-center">
        <h1>ログイン</h1>
    </div>

    <div class="row">
        <div class="col-sm-6 offset-sm-3">

            {!! Form::open(['route' => 'login.post']) !!}
                <div class="form-group">
                    {!! Form::label('email', 'メールアドレス') !!}
                    {!! Form::email('email', null, ['class' => 'form-control']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                <div class="text-center">
                {!! Form::submit('ログイン', ['class' => 'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
            {{-- 新規ユーザー登録リンク --}}
            <p class="mt-2">登録はこちらから☆ {!! link_to_route('signup.get', '新規登録') !!}</p>
        </div>
    </div>
@endsection