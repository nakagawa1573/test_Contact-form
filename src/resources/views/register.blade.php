@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('button')
    <div class="header__link">
        <form action="">
            <button class="header__link-btn">
                login
            </button>
        </form>
    </div>
@endsection

@section('content')

@section('title')
    Register
@endsection

    <section class="register__content">
        <form class="register__content-form" action="">

            <div class="register__content-form__box">
                <p class="register__content-form__ttl" id="name">
                    お名前
                </p>
                <input class="register__content-form__input" type="" placeholder="例: 山田　太郎">
            </div>

            <div class="register__content-form__box">
                <p class="register__content-form__ttl" id="email">
                    メールアドレス
                </p>
                <input class="register__content-form__input" type="" placeholder="例: test@example.com">
            </div>

            <div class="register__content-form__box">
                <p class="register__content-form__ttl" id="pass">
                    パスワード
                </p>
                <input class="register__content-form__input" type="" placeholder="例: coachtech1106">
            </div>

            <button class="register__content-btn" type="submit">
                ログイン
            </button>
        </form>
    </section>
@endsection
