@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('button')
    <div class="header__link">
        <form action="">
            <button class="header__link-btn">
                register
            </button>
        </form>
    </div>
@endsection

@section('content')

@section('title')
    Login
@endsection

    <section class="login__content">
        <form class="login__content-form" action="">

            <div class="login__content-form__box">
                <p class="login__content-form__ttl" id="email">
                    メールアドレス
                </p>
                <input class="login__content-form__input" type="" placeholder="例: test@example.com">
            </div>

            <div class="login__content-form__box">
                <p class="login__content-form__ttl" id="pass">
                    パスワード
                </p>
                <input class="login__content-form__input" type="" placeholder="例: coachtech1106">
            </div>

            <button class="login__content-btn" type="submit">
                ログイン
            </button>
        </form>
    </section>
@endsection
