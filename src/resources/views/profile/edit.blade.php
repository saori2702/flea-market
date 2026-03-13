@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/profile/edit.css') }}" />
@endsection

@section('content')
<div class="edit-container">
    <div class="register-header">
        <h1>プロフィール設定</h1>
    </div>
    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="profile-form">
        @csrf
        <div class="image-upload-flex">
            <img src="{{ $profile && $profile->image_url ? asset('storage/' . $profile->image_url) : asset('img/default-user.png') }}" id="preview" class="user-icon-preview">
            <label class="btn-select-image">
                画像を選択する
                <input type="file" name="image" onchange="previewImage(this)" style="display:none;">
            </label>
        </div>

        <div class="form-group">
            <label for="name">ユーザー名</label>
            <div class="input-text">
                <input type="text" name="name" value="{{ old('name', $user->name) }}">
            </div>
        </div>
        <div class="form__error">
            @error('name')
                {{$message}}
            @enderror
        </div>

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
        <div class="edit-button">
            <button class="edit-button__submit" type="submit">更新する</button>
        </div>
    </form>
</div>

<script>
function previewImage(input) {
    if (input.files && input.files[0]) {
        const reader = new FileReader();
        reader.onload = (e) => {
            document.getElementById('preview').src = e.target.result;
        }
        reader.readAsDataURL(input.files[0]);
    }
}
</script>
@endsection