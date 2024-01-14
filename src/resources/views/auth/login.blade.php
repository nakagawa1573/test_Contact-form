@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('button')
    <div class="header__link">
            <button class="header__link-btn">
                <a href="/register">register</a>
            </button>
    </div>
@endsection

@section('content')

@section('title')
    Login
@endsection

<section class="login__content">
    <form class="login__content-form" action="/login" method="post">
        @csrf
        <div class="login__content-form__box">
            <p class="login__content-form__ttl" id="email">
                メールアドレス
            </p>
            <input class="login__content-form__input" type="text" placeholder="例: test@example.com" name="email" value="{{ old('email') }}">
        </div>

        <div class="form__error">
            @error('email')
                {{ $message }}
            @enderror
        </div>

        <div class="login__content-form__box">
            <p class="login__content-form__ttl" id="pass">
                パスワード
            </p>
            <input class="login__content-form__input" type="password" placeholder="例: coachtech1106" name="password">
        </div>

        <div class="form__error">
            @error('password')
                {{ $message }}
            @enderror
        </div>

        <button class="login__content-btn" type="submit">
            ログイン
        </button>
    </form>
</section>
@endsection
