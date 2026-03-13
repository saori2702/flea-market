@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items/show.css') }}" />
@endsection

@section('content')
<div class="item-detail-container">
    <div class="item-image">
        <img src="{{ str_starts_with($item->image_url, 'http') ? $item->image_url : asset('storage/' . $item->image_url) }}" alt="{{ $item->name }}">
    </div>

    <div class="item-info">
        <h1>{{ $item->name }}</h1>
        <p class="brand-name">{{ $item->brand }}</p>
        <p class="price">¥{{ number_format($item->price) }}(税込)</p>

        <!-- いいね・コメント数 -->
        <div class="interaction-icons">
            <div class="like-section">
                @if($item->is_liked_by_auth_user())
                    <form action="{{ route('like.destroy', ['item_id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">
                            <img src="{{ asset('img/like_red.png') }}">
                        </button>
                    </form>
                @else
                    <form action="{{ route('like.store', ['item_id' => $item->id]) }}" method="POST">
                        @csrf
                        <button type="submit">
                            <img src="{{ asset('img/like.png') }}">
                        </button>
                    </form>
                @endif
                <span>{{ $item->likes->count() }}</span>
            </div>

            <div class="comment-section">
                <img src="{{ asset('img/comment.png') }}">
                <span>{{ $item->comments->count() }}</span>
            </div>
        </div>

        <a class="buy-button" href="{{ route('purchase.show', ['item_id' => $item->id]) }}">購入手続きへ</a>

        <h2>商品説明</h2>
        <p>{{ $item->description }}</p>

        <h2>商品の情報</h2>
        <div class="detail-table">
            <p>カテゴリー:
                @foreach($item->categories as $category)
                    <span>{{ $category->content }}</span>
                @endforeach
            </p>
            <p>商品の状態: {{ $item->condition->content }}</p>
        </div>

        <div class="comment-area">
            <h3>コメント ({{ $item->comments->count() }})</h3>
            @foreach($item->comments as $comment)
                <div class="comment-item">
                    <strong>{{ $comment->user->name }}</strong>
                    <p>{{ $comment->content }}</p>
                </div>
            @endforeach
            <div class="comment-form">
                <h4>商品へのコメント</h4>
                <form action="{{ route('comment.store', ['item_id' => $item->id]) }}" method="post">
                    @csrf
                    <textarea name="content" rows="3"></textarea>
                    <div class="form__error">
                        @error('content')
                            {{ $message }}
                        @enderror
                    </div>
                    <button class="comment-submit" type="submit">コメントを送信する</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
