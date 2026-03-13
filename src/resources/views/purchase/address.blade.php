@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase/address.css') }}" />
@endsection

@section('content')
<div class="address-container">
    <div class="address-header">
        <h1>住所の変更</h1>
    </div>
    <form action="{{ route('address.update', ['item_id' => $item->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="postal_code">郵便番号</label>
            <div class="input-text">
                <input type="text" name="post_code" value="{{ old('post_code', $profile->post_code ?? '') }}">
            </div>
        </div>
        <div class="form__error">
            @error('post_code')
                {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label for="address">住所</label>
            <div class="input-text">
                <input type="text" name="address" value="{{ old('address', $profile->address ?? '') }}">
            </div>
        </div>
        <div class="form__error">
            @error('address')
                {{$message}}
            @enderror
        </div>
        <div class="form-group">
            <label for="building">建物名</label>
            <div class="input-text">
                <input type="text" name="building" value="{{ old('building', $profile->building ?? '') }}">
            </div>
        </div>
        <div class="form__error">
            @error('building')
                {{$message}}
            @enderror
        </div>
        <div class="address-button">
            <button class="address-button__submit" type="submit">更新する</button>
        </div>
    </form>
</div>
@endsection