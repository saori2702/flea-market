@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/items/sell.css') }}" />
@endsection

@section('content')
<div class="sell-container">
    <div class="sell-header">
        <h1>商品の出品</h1>
    </div>
    <form action="{{ route('sell.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <div class="group-content_image">
                <label for="image">商品画像</label>
                <div class="input-image">
                    <input type="file" name="image_url" accept="image/*" placeholder="画像を選択する">
                </div>
                <div class="form__error">
                    @error('image_url')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="group-content">
                <h2>商品の詳細</h2>
            </div>
            <div class="content_category">
                <label for="category">カテゴリー</label>
                <div class="category-grid">
                    @foreach($categories as $category)
                    <div class="category-item">
                        <input type="checkbox"
                            name="category_id[]"
                            value="{{ $category->id }}"
                            id="category_{{ $category->id }}"
                            class="category-checkbox">
                        <label for="category_{{ $category->id }}" class="category-label">
                            {{ $category->content }}
                        </label>
                    </div>
                    @endforeach
                </div>
                <div class="form__error">
                    @error('category_id')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="content-condition">
                <label for="condition">商品の状態</label>
                <div class="condition-item">
                    <select name="condition_id">
                        <option value="">選択してください</option>
                        @foreach($conditions as $condition)
                        <option value="{{ $condition->id }}">{{ $condition->content }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form__error">
                @error('condition_id')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="group-content">
            <h2>商品名と説明</h2>
        </div>
        <div class="form-group">
            <label for="name">商品名</label>
            <div class="input-text">
                <input type="text" name="name">
            </div>
            <div class="form__error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="brand">ブランド名</label>
            <div class="input-text">
                <input type="text" name="brand">
            </div>
        </div>
        <div class="form-group">
            <label for="description">商品の説明</label>
            <div class="input-text">
                <textarea name="description" rows="5"></textarea>
            </div>
            <div class="form__error">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group">
            <label for="price">販売価格</label>
            <div class="input-text">
                <input type="number" name="price" placeholder="¥">
            </div>
            <div class="form__error">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="sell-button">
            <button class="sell-button__submit" type="submit">出品する</button>
        </div>
    </form>
</div>
@endsection
