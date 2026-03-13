@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css') }}" />
@endsection

@section('content')
<div class="register-form">
    <div class="register-form__group">
        <div class="register-header">
            <h1>会員登録</h1>
        </div>
        <form class="form-group" method="POST" action="/register">
            @csrf
            <div class="group-content">
                <label for="name">ユーザー名</label>
                <div class="input-text">
                    <input type="text" name="name" />
                </div>
            </div>
            <div class="form__error">
                @error('name')
                    {{$message}}
                @enderror
            </div>
            <div class="group-content">
                <label for="email">メールアドレス</label>
                <div class="input-text">
                    <input type="email" name="email" />
                </div>
            </div>
            <div class="form__error">
                @error('email')
                    {{$message}}
                @enderror
            </div>
            <div class="group-content">
                <label for="password">パスワード</label>
                <div class="input-text">
                    <input type="password" name="password" />
                </div>
            </div>
            <div class="form__error">
                @error('password')
                    {{$message}}
                @enderror
            </div>
            <div class="group-content">
                <label for="password">確認用パスワード</label>
                <div class="input-text">
                    <input type="password" name="password_confirmation" />
                </div>
            </div>
            <div class="form__error">
                @error('password')
                    {{$message}}
                @enderror
            </div>
            <div class="register-button">
                <button class="register-button__submit" type="submit">登録する</button>
            </div>
        </form>
    </div>
    <a class="login-link" href="/login">ログインはこちら</a>
</div>
@endsection