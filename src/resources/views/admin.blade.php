@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
    <div class="header__link">
        <form action="">
            <button class="header__link-btn">
                logout
            </button>
        </form>
    </div>
@endsection

@section('content')

@section('title')
    Admin
@endsection

<div class="admin__search">
    <form class="admin__search-form" action="">
        <div class="admin__search-box__txt">
            <input class="admin__search-txt" type="text" placeholder="名前やメールアドレスを入力してください">
            <button class="admin__search-btn" type="submit">
                <img src="{{ asset('img/search.svg') }}" alt="search">
            </button>
        </div>

        <div class="admin__search-box__gender">
            <select class="admin__search-gender" name="" id="" required>
                <option value="" disabled selected style="display:none;">
                    性別
                </option>
                <option value="">
                    テスト
                </option>
            </select>
        </div>

        <div class="admin__search-box__category">
            <select class="admin__search-category" name="" id="" required>
                <option value="" disabled selected style="display:none;">
                    お問い合わせの種類
                </option>
                <option value="">
                    テスト
                </option>
            </select>
        </div>

        <input class="admin__search-date" type="date">
    </form>
</div>

<div class="admin__group">
    <button class="adminn__group-export">
        エクスポート
    </button>
    <div class="admin__group-pages">
        ページネーション
    </div>
</div>

<section class="admin__list">
    <table class="admin__list-table">
        <tr class="admin__list-table__row-1">
            <th class="admin__list-table__header">お名前</th>
            <th class="admin__list-table__header">性別</th>
            <th class="admin__list-table__header">メールアドレス</th>
            <th class="admin__list-table__header">お問い合わせの種類</th>
            <th class="admin__list-table__header"></th>
        </tr>

        <tr class="admin__list-table__row-2">
            <td class="admin__list-table__item" id="name">山田　太郎</td>
            <td class="admin__list-table__item" id="gender">男性</td>
            <td class="admin__list-table__item" id="email">test@example.com</td>
            <td class="admin__list-table__item" id="category">商品の交換について</td>
            <td class="admin__list-table__item" id="detail">
                <form action="" class="admin__list-table__item-form">
                    <button class="admin__list-table__item-form__btn" id="detail">
                        <a href="#modal">詳細</a>
                    </button>
                </form>
            </td>
        </tr>

        <tr class="admin__list-table__row-2">
            <td class="admin__list-table__item" id="name">山田　太郎</td>
            <td class="admin__list-table__item" id="gender">男性</td>
            <td class="admin__list-table__item" id="email">test@example.com</td>
            <td class="admin__list-table__item" id="category">商品の交換について</td>
            <td class="admin__list-table__item" id="detail">
                <form action="" class="admin__list-table__item-form">
                    <button class="admin__list-table__item-form__btn" id="detail">
                        <a href="#modal">詳細</a>
                    </button>
                </form>
            </td>
        </tr>

        <tr class="admin__list-table__row-2">
            <td class="admin__list-table__item" id="name">山田　太郎</td>
            <td class="admin__list-table__item" id="gender">男性</td>
            <td class="admin__list-table__item" id="email">test@example.com</td>
            <td class="admin__list-table__item" id="category">商品の交換について</td>
            <td class="admin__list-table__item" id="detail">
                <form action="" class="admin__list-table__item-form">
                    <button class="admin__list-table__item-form__btn" id="detail">
                        <a href="#modal">詳細</a>
                    </button>
                </form>
            </td>
        </tr>
    </table>
</section>

<div class="admin__submit">
    <button class="admin__submit-btn">
        リセット
    </button>
</div>

{{-- モーダルウィンドウ --}}
<section class="detail__modal" id="modal">
    <div class="detail__close">
                <a class="detail__close-btn" href="#">
                    <img src="{{ asset('img/close.svg') }}" alt="close">
                </a>
    </div>

    <article class="detail__list">
        <table .detail__list-table>
            <tr class="detail__list-table__row">
                <th class="detail__list-table__header">お名前</th>
                <td class="detail__list-table__item">山田　太郎</td>
            </tr>
            <tr class="detail__list-table__row">
                <th class="detail__list-table__header">性別</th>
                <td class="detail__list-table__item">男性</td>
            </tr>
            <tr class="detail__list-table__row">
                <th class="detail__list-table__header">メールアドレス</th>
                <td class="detail__list-table__item">test@example.com</td>
            </tr>
            <tr class="detail__list-table__row">
                <th class="detail__list-table__header">電話番号</th>
                <td class="detail__list-table__item">08012345678</td>
            </tr>
            <tr class="detail__list-table__row">
                <th class="detail__list-table__header">住所</th>
                <td class="detail__list-table__item">東京都渋谷区千駄ヶ谷1-2-3</td>
            </tr>
            <tr class="detail__list-table__row">
                <th class="detail__list-table__header">建物名</th>
                <td class="detail__list-table__item">千駄ヶ谷マンション101</td>
            </tr>
            <tr class="detail__list-table__row">
                <th class="detail__list-table__header">お問い合わせの種類</th>
                <td class="detail__list-table__item">商品の交換について</td>
            </tr>
            <tr class="detail__list-table__row">
                <th class="detail__list-table__header" id="detail-content">お問い合わせ内容</th>
                <td class="detail__list-table__item">届いた商品が注文した商品ではありませんでした。商品の交換をお願いします。</td>
            </tr>
        </table>
    </article>

    <div class="detail__delete">
        <form action="">
            <button class="detail__delete-btn">
                削除
            </button>
        </form>
    </div>

</section>
@endsection
