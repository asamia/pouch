@extends('layouts.common')

@section('content')
    <div class="text-center">
    <h1>アイテム編集</h1>
    </div>
        <div class="row">
            <div class="col-sm-6 offset-sm-3">
                {!! Form::model($item, ['route' => ['items.update', $item->id], 'method' => 'put']) !!}
                    <div class="form-group">
                        {!! Form::label('content', 'アイテム：') !!}
                        {!! Form::text('content', null, ['class' => 'form-control']) !!}
                        {!! Form::label('purchase_date', '購入日：') !!}
                        {!! Form::date('purchase_date', null, ['class' => 'form-control']) !!}
                        {!! Form::label('expiration_date', '使用期限：') !!}
                        {!! Form::date('expiration_date', null, ['class' => 'form-control']) !!}
                    </div>
                <div class="text-center">
                    {!! Form::submit('更新', ['class' => 'btn btn-primary']) !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
</div>
@endsection