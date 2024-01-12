@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

@section('title')
    Contact
@endsection

<section class="contact">
    <form class="contact__form" action="">
        <table class="contact__form-table">
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    お名前<span>※</span>
                </td>
                <td class="contact__form-table__input" id="name">
                    <input type="text" name="last_name" placeholder="例:山田">
                    <input type="text" name="first_name" placeholder="例:太郎">
                </td>
            </tr>
            <tr class="contact__form-table__row">
                {{-- エラーメッセージ --}}
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    性別<span>※</span>
                </td>
                <td class="contact__form-table__input">
                    <div class="contact__form-table__input-gender">
                        <input type="radio" name="gender" value="1" id="man">
                        <label for="man">
                            男性
                        </label>
                    </div>
                    <div class="contact__form-table__input-gender">
                        <input type="radio" name="gender" value="2" id="woman">
                        <label for="woman">
                            女性
                        </label>
                    </div>
                    <div class="contact__form-table__input-gender">
                        <input type="radio" name="gender" value="3" id="others">
                        <label for="others">
                            その他
                        </label>
                    </div>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                {{-- エラーメッセージ --}}
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    メールアドレス<span>※</span>
                </td>
                <td class="contact__form-table__input">
                    <input class="contact__form-table__input-email" type="text" name="email"
                        placeholder="例:test@example.com">
                </td>
            </tr>
            <tr class="contact__form-table__row">
                {{-- エラーメッセージ --}}
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    電話番号<span>※</span>
                </td>
                <td class="contact__form-table__input" id="tell">
                    <input type="text" name="tell_1" placeholder="080">
                    <p>-</p>
                    <input type="text" name="tell_2" placeholder="1234">
                    <p>-</p>
                    <input type="text" name="tell_3" placeholder="5678">
                </td>
            </tr>
            <tr class="contact__form-table__row">
                {{-- エラーメッセージ --}}
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    住所<span>※</span>
                </td>
                <td class="contact__form-table__input">
                    <input class="contact__form-table__input-address" type="text" name="address"
                        placeholder="例:東京都渋谷区千駄ヶ谷1-2-3">
                </td>
            </tr>
            <tr class="contact__form-table__row">
                {{-- エラーメッセージ --}}
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    建物名
                </td>
                <td class="contact__form-table__input">
                    <input class="contact__form-table__input-building" type="text" name="building"
                        placeholder="例:千駄ヶ谷マンション101">
                </td>
            </tr>
            <tr class="contact__form-table__row">
                {{-- エラーメッセージ --}}
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    お問い合わせの種類<span>※</span>
                </td>
                <td class="contact__form-table__input">
                    <div class="select-box">
                        <select class="contact__form-table__input-select" name="category_id" required>
                            <option value="" disabled selected style="display:none;">
                                選択してください
                            </option>
                            <option value="">
                                テスト
                            </option>
                            {{-- foreachを使って各種カテゴリを表示 --}}
                        </select>
                    </div>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                {{-- エラーメッセージ --}}
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    お問い合わせ内容<span>※</span>
                </td>
                <td class="contact__form-table__input">
                    <textarea class="contact__form-table__input-textarea" name="detail" id="" cols="87" rows="7"
                        placeholder="お問い合わせ内容をご記載ください"></textarea>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                {{-- エラーメッセージ --}}
            </tr>
        </table>
        <div class="contact__form-submit">
            <button class="contact__form-submit__btn" type="submit">
                確認画面
            </button>
        </div>
    </form>
</section>
@endsection
