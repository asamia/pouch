@extends('layouts.common')

@section('content')
    <div class="text-center">
    <h1>アイテム詳細</h1>
    </div>
    <div class="row">
           <div class="col-sm-6 offset-sm-3">
    <table class="table table-striped table-light">
            <th>アイテム</th>
            <td>{{ $item->content }}</td>
        </tr>
        <tr>
            <th>購入日</th>
            <td>{{ $item->purchase_date }}</td>
        </tr>
        <tr>
            <th>使用期限</th>
            <td>{{ $item->expiration_date }}</td>
        </tr>
    </table>
            
    </div>
    <div class="text-center">
      {{-- 編集ページへのリンク --}}
    {!! link_to_route('items.edit', 'このアイテムを編集', ['item' => $item->id], ['class' => 'btn btn-secondary']) !!}
    {{-- メッセージ削除フォーム --}}
    {!! Form::model($item, ['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    </div>
    {!! Form::close() !!}
</div>
@endsection
