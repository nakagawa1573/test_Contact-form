@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('button')
    <div class="header__link">
            <button class="header__link-btn">
                <a href="/login">login</a>
            </button>
    </div>
@endsection

@section('content')

@section('title')
    Register
@endsection

<section class="register__content">
    <form class="register__content-form" action="/register" method="post" novalidate>
        @csrf

        <div class="register__content-form__box">
            <p class="register__content-form__ttl" id="name">
                お名前
            </p>
            <input class="register__content-form__input" type="text" placeholder="例: 山田　太郎" name="name" value="{{ old('name') }}">
        </div>

        <div class="form__error">
            @error('name')
                {{ $message }}
            @enderror
        </div>

        <div class="register__content-form__box">
            <p class="register__content-form__ttl" id="email">
                メールアドレス
            </p>
            <input class="register__content-form__input" type="email" placeholder="例: test@example.com" name="email" value="{{ old('email') }}">
        </div>

        <div class="form__error">
            @error('email')
                {{ $message }}
            @enderror
        </div>

        <div class="register__content-form__box">
            <p class="register__content-form__ttl" id="pass">
                パスワード
            </p>
            <input class="register__content-form__input" type="password" placeholder="例: coachtech1106" name="password">
            <input type="hidden" name="password_confirmation" value="">
        </div>

        <div class="form__error">
            @error('password')
                {{ $message }}
            @enderror
        </div>

        <button class="register__content-btn" type="submit">
            登録
        </button>
    </form>
</section>
@endsection
