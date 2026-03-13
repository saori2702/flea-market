@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/purchase/show.css') }}" />
@endsection

@section('content')
<div class="purchase-container">
    <div class="main-content">
        <!-- 商品情報 -->
        <div class="item-summary">
            <img src="{{ asset('storage/' . $item->image_path) }}" class="item-img">
            <div class="item-text">
                <h2>{{ $item->name }}</h2>
                <p>¥{{ number_format($item->price) }}</p>
            </div>
        </div>

        <!-- 支払い方法選択 -->
        <div class="payment-selection">
            <div class="payment-header">
                <h3>支払い方法</h3>
            </div>
            <select name="payment_method" id="payment-selector" form="purchase-form" required>
                <option value="" disabled selected>選択してください</option>
                <option value="convenience">コンビニ払い</option>
                <option value="card">カード支払い</option>
            </select>
            <div class="form__error">
                @error('payment_method')
                    <p>{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- 配送先表示 -->
        <div class="address-section">
            <div class="address-header">
                <h3>配送先</h3>
                <a class="address-edit" href="{{ route('address.edit', ['item_id' => $item->id]) }}">変更する</a>
            </div>
            <p>〒 {{ $profile->post_code ?? '' }}</p>
            <p>{{ $profile->address ?? '' }}</p>
            <p>{{ $profile->building ?? '' }}</p>
        </div>
        <div class="form__error">
            @if($errors->has('post_code') || $errors->has('address'))
                <p>{{ $message }}</p>
            @endif
        </div>
    </div>

    <div class="side-panel">
        <table class="confirm-table">
            <tr>
                <th>商品代金</th>
                <td>¥{{ number_format($item->price) }}</td>
            </tr>
            <tr>
                <th>支払い方法</th>
                <td id="display-payment">未選択</td>
            </tr>
        </table>

        <form action="{{ route('purchase.store', ['item_id' => $item->id]) }}" method="POST" id="purchase-form">
            @csrf
            <input type="hidden" name="post_code" value="{{ $profile->post_code ?? '' }}">
            <input type="hidden" name="address" value="{{ $profile->address ?? '' }}">
            <input type="hidden" name="building" value="{{ $profile->building ?? '' }}">
            <input type="hidden" name="payment_method" id="hidden-payment-method">
            <div class="buy-button">
                <button class="buy-button__submit" type="submit">購入する</button>
            </div>
        </form>
    </div>
</div>

<script>
    // 支払い方法をリアルタイムに右側へ反映
    document.getElementById('payment-selector').addEventListener('change', function() {
        const selectedText = this.options[this.selectedIndex].text;
        document.getElementById('display-payment').textContent = selectedText;
    });
</script>
@endsection