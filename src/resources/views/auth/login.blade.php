@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css') }}" />
@endsection

@section('content')
<div class="login-form">
    <div class="login-form__group">
        <div class="login__header">
            <h1>ログイン</h1>
        </div>
        <form class="form-group" method="POST" action="/login">
            @csrf
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
            <div class="login-button">
                <button class="login-button__submit" type="submit">ログインする</button>
            </div>
        </form>
        <a class="register-link" href="/register">会員登録はこちら</a>
    </div>
</div>
@endsection
