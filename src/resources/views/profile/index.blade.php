@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile/index.css') }}" />
@endsection

@section('content')
<div class="profile-container">
    <div class="profile-header">
        <div class="user-visual">
            <img src="{{ $profile && $profile->image_url ? asset('storage/' . $profile->image_url) : asset('img/default-user.png') }}" alt="User Icon" class="user-icon-large">
            <h2 class="user-name">{{ $user->name }}</h2>
        </div>
        <a href="{{ route('profile.edit') }}" class="btn-edit-profile">プロフィールを編集</a>
    </div>

    <div class="tab-menu">
        <a href="{{ route('profile.index', ['page' => 'sell']) }}" class="tab-item {{ $page !== 'buy' ? 'active' : '' }}">出品した商品</a>
        <a href="{{ route('profile.index', ['page' => 'buy']) }}" class="tab-item {{ $page === 'buy' ? 'active' : '' }}">購入した商品</a>
    </div>

    <div class="item-grid">
        @forelse($items as $item)
            <div class="item-card">
                <a href="{{ route('item.show', ['item_id' => $item->id]) }}">
                    <div class="image-box">
                        <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->name }}">
                        @if($item->order)
                            <div class="sold-tag">Sold</div>
                        @endif
                    </div>
                    <p class="item-name">{{ $item->name }}</p>
                </a>
            </div>
        @empty
            <p>表示する商品がありません。</p>
        @endforelse
    </div>
</div>
@endsection