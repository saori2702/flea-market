@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items/index.css') }}" />
@endsection

@section('content')
<div class="tabs">
    <a href="{{ route('item.index') }}"
        class="{{ request('tab') !== 'mylist' ? 'active' : '' }}">おすすめ</a>
    <a href="{{ route('item.index', ['tab' => 'mylist']) }}"
        class="{{ request('tab') === 'mylist' ? 'active' : '' }}">マイリスト</a>
</div>

<div class="item-grid">
    @foreach($items as $item)
        <div class="item-card">
            <a href="{{ route('item.show', ['item_id' => $item->id]) }}">
                <div class="image-wrapper">
                    <img src="{{ str_starts_with($item->image_url, 'http') ? $item->image_url : asset('storage/' . $item->image_url) }}" alt="{{ $item->name }}">
                    @if($item->order)
                        <div class="sold-badge">Sold</div>
                    @endif
                </div>
                <p>{{ $item->name }}</p>
            </a>
        </div>
    @endforeach
</div>
@endsection
