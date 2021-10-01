@extends('layouts.common')

@section('content')

    <h1>アイテム詳細</h1>
    <div class="row">
           <div class="col-6">
    <table class="table table-striped table-light">
        <tr>
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
            
    </div>
    <div style="display:inline-flex">
      {{-- 編集ページへのリンク --}}
    {!! link_to_route('items.edit', 'このアイテムを編集', ['item' => $item->id], ['class' => 'btn btn-secondary']) !!}
    {{-- メッセージ削除フォーム --}}
    {!! Form::model($item, ['route' => ['items.destroy', $item->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
    </div>
</div>
@endsection
