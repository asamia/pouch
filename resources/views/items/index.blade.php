@extends('layouts.common')

@section('content')

    <h1>My pouch</h1>
    @if (count($items) > 0)
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>アイテム</th>
                    <th>購入日</th>
                    <th>使用期限</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td>{!! link_to_route('items.show', $item->id, ['item' => $item->id]) !!}</td>
                    <td>{{ $item->content }}</td>
                    <td>{{ $item->purchase_date }}</td>
                    <td>{{ $item->expiration_date }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @endif

    {{-- アイテム作成ページへのリンク --}}
    {!! link_to_route('items.create', '新規アイテム登録', [], ['class' => 'btn btn-primary']) !!}
    

@endsection