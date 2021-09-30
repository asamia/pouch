@extends('layouts.common')

@section('content')

    <h1>アイテム一覧</h1>
    @if (count($items) > 0)
        <table class="table table-striped table-light">
            <thead>
                <tr>
                    <th>アイテム</th>
                    <th>購入日</th>
                    <th>使用期限</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->purchase_date }}</td>
                    <td>{{ $item->expiration_date }}</td>
                    <td>{!! link_to_route('items.show', '詳細', ['item' => $item->id], ['class' => 'btn btn-secondary']) !!}</td>
                </tr>　
                @endforeach
            </tbody>
        </table>
    @endif
    {{-- ページネーション --}}
    {{ $items->links() }}
    {{-- アイテム作成ページへのリンク --}}
    {!! link_to_route('items.create', '新規アイテム登録', [], ['class' => 'btn btn-primary']) !!}
    

@endsection