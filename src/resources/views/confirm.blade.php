@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

@section('title')
    Confirm
@endsection

<section class="confirm">
    <form action="/confirm" method="post">
        @csrf
        <table class="confirm__table">
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    お名前
                </td>
                <td class="confirm__table-item">
                    {{ session('contact')['last_name'] . ' ' . session('contact')['first_name'] }}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    性別
                </td>
                <td class="confirm__table-item">
                    @if (session('contact')['gender'] == 1)
                        男性
                    @elseif (session('contact')['gender'] == 2)
                        女性
                    @else
                        その他
                    @endif
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    メールアドレス
                </td>
                <td class="confirm__table-item">
                    {{ session('contact')['email'] }}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    電話番号
                </td>
                <td class="confirm__table-item">
                    {{ session('contact')['tell'] }}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    住所
                </td>
                <td class="confirm__table-item">
                    {{ session('contact')['address'] }}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    建物名
                </td>
                <td class="confirm__table-item">
                    {{ session('contact')['building'] }}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    お問い合わせの種類
                </td>
                <td class="confirm__table-item">
                    {{ session('category')['content'] }}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    お問い合わせ内容
                </td>
                <td class="confirm__table-item">
                    {{ session('contact')['detail'] }}
                </td>
            </tr>
        </table>

        <div class="test">
            <div class="confirm__submit">

                <input type="hidden" name="last_name" value="{{ session('contact')['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ session('contact')['first_name'] }}">
                <input type="hidden" name="gender" value="{{ session('contact')['gender'] }}">
                <input type="hidden" name="email" value="{{ session('contact')['email'] }}">
                <input type="hidden" name="tell" value="{{ session('contact')['tell'] }}">
                <input type="hidden" name="address" value="{{ session('contact')['address'] }}">
                <input type="hidden" name="building" value="{{ session('contact')['building'] }}">
                <input type="hidden" name="category_id" value="{{ session('contact')['category_id'] }}">
                <input type="hidden" name="detail" value="{{ session('contact')['detail'] }}">

                <button class="confirm__submit-btn" type="submit">
                    送信
                </button>
            </div>
            {{-- <div class="confirm__link"> --}}
                    <a class="confirm__link-txt" href="/">
                        修正
                    </a>

            {{-- </div> --}}
        </div>
    </form>
</section>
@endsection
