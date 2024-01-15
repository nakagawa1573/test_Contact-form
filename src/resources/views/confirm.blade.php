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
                        {{ session('last_name') . ' ' . session('first_name') }}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    性別
                </td>
                <td class="confirm__table-item">
                    @if (session('gender') == 1)
                        男性
                    @elseif (session('gender') == 2)
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
                    {{ session('email') }}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    電話番号
                </td>
                <td class="confirm__table-item">
                    {{ session('tell_1') . session('tell_2') . session('tell_3')}}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    住所
                </td>
                <td class="confirm__table-item">
                    {{ session('address') }}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    建物名
                </td>
                <td class="confirm__table-item">
                    {{ session('building') }}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    お問い合わせの種類
                </td>
                <td class="confirm__table-item">
                    {{ session('content') }}
                </td>
            </tr>
            <tr class="confirm__table-row">
                <td class="confirm__table-area">
                    お問い合わせ内容
                </td>
                <td class="confirm__table-item">
                    {{ session('detail') }}
                </td>
            </tr>
        </table>

        <div class="test">
            <div class="confirm__submit">

                <input type="hidden" name="last_name" value="{{ session('last_name')}}">
                <input type="hidden" name="first_name" value="{{ session('first_name') }}">
                <input type="hidden" name="gender" value="{{ session('gender')}}">
                <input type="hidden" name="email" value="{{ session('email')}}">
                <input type="hidden" name="tell" value="{{ session('tell_1') . session('tell_2') . session('tell_3')}}">
                <input type="hidden" name="address" value="{{ session('address')}}">
                <input type="hidden" name="building" value="{{ session('building')}}">
                <input type="hidden" name="category_id" value="{{ session('category_id')}}">
                <input type="hidden" name="detail" value="{{ session('detail')}}">

                <button class="confirm__submit-btn" type="submit">
                    送信
                </button>
            </div>
        </div>
    </form>
                <form class="confirm__fix-form" action="/confirm/fix" method="post">
                    @csrf
                <input type="hidden" name="last_name" value="{{ session('last_name')}}">
                <input type="hidden" name="first_name" value="{{ session('first_name') }}">
                <input type="hidden" name="gender" value="{{ session('gender')}}">
                <input type="hidden" name="email" value="{{ session('email')}}">
                    <input type="hidden" name="tell_1" value="{{ session('tell_1')}}">
                    <input type="hidden" name="tell_2" value="{{ session('tell_2')}}">
                    <input type="hidden" name="tell_3" value="{{ session('tell_3')}}">
                <input type="hidden" name="address" value="{{ session('address')}}">
                <input type="hidden" name="building" value="{{ session('building')}}">
                <input type="hidden" name="category_id" value="{{ session('category_id')}}">
                <input type="hidden" name="detail" value="{{ session('detail')}}">
                    
                    <button class="confirm__fix-link" type="submit">
                        <p class="confirm__fix-link__txt">
                            修正
                        </p>
                    </button>
                </form>
</section>
@endsection
