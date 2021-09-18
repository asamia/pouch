@extends('layouts.common')

@section('content')
    
    <h1>新規アイテム登録</h1>
        <div class="row">
            <div class="col-6">
                {!! Form::model($item, ['route' => 'items.store']) !!}
                    <div class="form-group">
                        {!! Form::label('content', 'アイテム：') !!}
                        {!! Form::text('content', null, ['class' => 'form-control']) !!}
                        {!! Form::label('purchase_date', '購入日：') !!}
                        {!! Form::date('purchase_date', null, ['class' => 'form-control']) !!}
                        {!! Form::label('expiration_date', '使用期限：') !!}
                        {!! Form::date('expiration_date', null, ['class' => 'form-control']) !!}
                    </div>
                    
                    {!! Form::submit('登録', ['class' => 'btn btn-primary']) !!}
    
                {!! Form::close() !!}
            </div>
        </div>
@endsection