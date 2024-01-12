@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')

@section('title')
    Confirm
@endsection

<section class="confirm">
    <table class="confirm__table">
        <tr class="confirm__table-row">
            <td class="confirm__table-area">
                お名前
            </td>
            <td class="confirm__table-item">
                {{-- contactページから送られたデータを表示 --}}
                テスト
            </td>
        </tr>
        <tr class="confirm__table-row">
            <td class="confirm__table-area">
                性別
            </td>
            <td class="confirm__table-item">
                {{-- contactページから送られたデータを表示 --}}
            </td>
        </tr>
        <tr class="confirm__table-row">
            <td class="confirm__table-area">
                メールアドレス
            </td>
            <td class="confirm__table-item">
                {{-- contactページから送られたデータを表示 --}}
            </td>
        </tr>
        <tr class="confirm__table-row">
            <td class="confirm__table-area">
                電話番号
            </td>
            <td class="confirm__table-item">
                {{-- contactページから送られたデータを表示 --}}
            </td>
        </tr>
        <tr class="confirm__table-row">
            <td class="confirm__table-area">
                住所
            </td>
            <td class="confirm__table-item">
                {{-- contactページから送られたデータを表示 --}}
            </td>
        </tr>
        <tr class="confirm__table-row">
            <td class="confirm__table-area">
                建物名
            </td>
            <td class="confirm__table-item">
                {{-- contactページから送られたデータを表示 --}}
            </td>
        </tr>
        <tr class="confirm__table-row">
            <td class="confirm__table-area">
                お問い合わせの種類
            </td>
            <td class="confirm__table-item">
                {{-- contactページから送られたデータを表示 --}}
            </td>
        </tr>
        <tr class="confirm__table-row">
            <td class="confirm__table-area">
                お問い合わせ内容
            </td>
            <td class="confirm__table-item">
                {{-- contactページから送られたデータを表示 --}}
            </td>
        </tr>
    </table>

    <div class="test">
        <div class="confirm__submit">
            <form action="">
                <button class="confirm__submit-btn">
                    送信
                </button>
            </form>
        </div>
        {{-- <div class="confirm__link"> --}}
        <a class="confirm__link-txt" href="">
            修正
        </a>
        {{-- </div> --}}
    </div>

</section>
@endsection
