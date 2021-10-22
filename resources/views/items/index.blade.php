@extends('layouts.common')

@section('content')

    <h1>アイテム一覧</h1>
    <div class="add-item">
     {{-- アイテム作成ページへのリンク --}}
    {!! link_to_route('items.create', '新規アイテム登録', [], ['class' => 'btn btn-primary']) !!}
    </div>
    @if (count($items) > 0)
        <table class="table table-striped table-light">
            <thead>
                <tr class="heading">
                    <th>アイテム</th>
                    <th></th>
                    <th>購入日</th>
                    <th>使用期限</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($items as $item)
                <tr>
                    <td data-label="アイテム">{{ $item->content }}</td>
                    <td>
                    @if($item->image == null)
                      <img src="{{ asset('images/cosme.png') }}">
                    @else
                      <img src="{{ asset('storage/uploads'. $item->image) }}">
                    @endif
                    </td>
                    <td data-label="購入日">{{ $item->purchase_date }}</td>
                    <td data-label="使用期限">{{ $item->expiration_date }}</td>
                    <td>{!! link_to_route('items.show', '詳細', ['item' => $item->id], ['class' => 'btn btn-secondary']) !!}</td>
                </tr>　
                @endforeach
            </tbody>
        </table>
    @endif
    {{-- ページネーション --}}
    {{ $items->links() }}
    

@endsection