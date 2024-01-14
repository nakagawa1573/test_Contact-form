@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('button')
    <div class="header__link">
        <form action="/logout" method="post">
            @csrf
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
    <form class="admin__search-form" action="/admin/search" method="get" novalidate>
        @csrf
        <div class="admin__search-box__txt">
            <input class="admin__search-txt" type="text" placeholder="名前やメールアドレスを入力してください" name="keyword" value="{{ $keyword['keyword'] ?? '' }}">
            <button class="admin__search-btn" type="submit">
                <img src="{{ asset('img/search.svg') }}" alt="search">
            </button>
        </div>

        <div class="admin__search-box__gender">
            <select class="admin__search-gender" name="gender" required>
                <option value="" disabled selected style="display:none;">
                    性別
                </option>
                <option value="1">
                    男性
                </option>
                <option value="2">
                    女性
                </option>
                <option value="3">
                    その他
                </option>
            </select>
        </div>

        <div class="admin__search-box__category">
            <select class="admin__search-category" name="category_id" required>
                <option value="" disabled selected style="display:none;">
                    お問い合わせの種類
                </option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">
                        {{ $category->content }}
                    </option>
                @endforeach
            </select>
        </div>

        <input class="admin__search-date" type="date" name="created_at">
    </form>
</div>

<div class="admin__group">
    <button class="adminn__group-export">
        エクスポート
    </button>
    <div class="admin__group-pages">
        {{ $contacts->appends(request()->query())->links('vendor.pagination.pages') }}
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
        @foreach ($contacts as $contact)
            <tr class="admin__list-table__row-2">
                <td class="admin__list-table__item" id="name">
                    {{ $contact->last_name . ' ' . $contact->first_name }}
                </td>
                <td class="admin__list-table__item" id="gender">
                    @if ($contact->gender == 1)
                        男性
                    @elseif ($contact->gender == 2)
                        女性
                    @else
                        その他
                    @endif
                </td>
                <td class="admin__list-table__item" id="email">
                    {{ $contact->email }}
                </td>
                <td class="admin__list-table__item" id="category">
                    {{ $contact->category->content }}
                </td>
                <td class="admin__list-table__item" id="detail">
                    <button class="admin__list-table__item-form__btn" id="detail">
                        <a href="#{{ $contact->id }}">詳細</a>
                    </button>
                </td>
            </tr>
        @endforeach
    </table>
</section>

<div class="admin__submit">
    <button class="admin__submit-btn">
        <a class="admin__submit-link" href="/admin">リセット</a>  
    </button>
</div>

{{-- モーダルウィンドウ --}}
@foreach ($contacts as $contact)
    <section class="detail__modal" id="{{ $contact->id }}">
        <div class="detail__close">
            <a class="detail__close-btn" href="#">
                <img src="{{ asset('img/close.svg') }}" alt="close">
            </a>
        </div>

        <article class="detail__list">
            <table .detail__list-table>
                <tr class="detail__list-table__row">
                    <th class="detail__list-table__header">お名前</th>
                    <td class="detail__list-table__item">
                        {{ $contact->last_name . ' ' . $contact->first_name }}
                    </td>
                </tr>
                <tr class="detail__list-table__row">
                    <th class="detail__list-table__header">性別</th>
                    <td class="detail__list-table__item">
                        @if ($contact->gender == 1)
                            男性
                        @elseif ($contact->gender == 2)
                            女性
                        @else
                            その他
                        @endif
                    </td>
                </tr>
                <tr class="detail__list-table__row">
                    <th class="detail__list-table__header">メールアドレス</th>
                    <td class="detail__list-table__item">
                        {{ $contact->email }}
                    </td>
                </tr>
                <tr class="detail__list-table__row">
                    <th class="detail__list-table__header">電話番号</th>
                    <td class="detail__list-table__item">
                        {{ $contact->tell }}
                    </td>
                </tr>
                <tr class="detail__list-table__row">
                    <th class="detail__list-table__header">住所</th>
                    <td class="detail__list-table__item">
                        {{ $contact->address }}
                    </td>
                </tr>
                <tr class="detail__list-table__row">
                    <th class="detail__list-table__header">建物名</th>
                    <td class="detail__list-table__item">
                        {{ $contact->building }}
                    </td>
                </tr>
                <tr class="detail__list-table__row">
                    <th class="detail__list-table__header">お問い合わせの種類</th>
                    <td class="detail__list-table__item">
                        {{ $contact->category->content }}
                    </td>
                </tr>
                <tr class="detail__list-table__row">
                    <th class="detail__list-table__header" id="detail-content">お問い合わせ内容</th>
                    <td class="detail__list-table__item">
                        {{ $contact->detail }}
                    </td>
                </tr>
            </table>
        </article>

        <div class="detail__delete">
            <form action="/admin/delete" method="post">
                @csrf
                @method('delete')
                <input type="hidden" name="id" value="{{ $contact->id }}">
                <button class="detail__delete-btn" type="submit">
                    削除
                </button>
            </form>
        </div>

    </section>
@endforeach


@endsection
