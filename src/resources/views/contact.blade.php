@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')

@section('title')
    Contact
@endsection
<section class="contact">
    <form class="contact__form" action="/" method="post" novalidate>
        @csrf
        <table class="contact__form-table">
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    お名前<span>※</span>
                </td>
                <td class="contact__form-table__input" id="name">
                    <input type="text" name="last_name" placeholder="例:山田"
                        value="{{ session('contact')['last_name'] ?? old('last_name') }}">
                    <input type="text" name="first_name" placeholder="例:太郎"
                        value="{{ session('contact')['first_name'] ?? old('first_name') }}">
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td>&nbsp;</td>
                <td>
                    <div class="form__error" id="error__name">
                        <div>
                            @error('last_name')
                                {{ $message }}
                            @enderror
                        </div>
                        <div>
                            @error('first_name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    性別<span>※</span>
                </td>
                <td class="contact__form-table__input">
                    <div class="contact__form-table__input-gender">
                        <input type="radio" name="gender" value="1" id="man" checked>
                        <label for="man">
                            男性
                        </label>
                    </div>
                    <div class="contact__form-table__input-gender">
                        <input type="radio" name="gender" value="2" id="woman"
                            {{ isset(session('contact')['gender']) && session('contact')['gender'] == 2 ? 'checked' : '' }}{{ old('gender') == 2 ? 'checked' : '' }}>
                        <label for="woman">
                            女性
                        </label>
                    </div>
                    <div class="contact__form-table__input-gender">
                        <input type="radio" name="gender" value="3" id="others"
                            {{ isset(session('contact')['gender']) && session('contact')['gender'] == 3 ? 'checked' : '' }}{{ old('gender') == 3 ? 'checked' : '' }}>
                        <label for="others">
                            その他
                        </label>
                    </div>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td>&nbsp;</td>
                <td>
                    <div class="form__error">
                        @error('gender')
                            {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    メールアドレス<span>※</span>
                </td>
                <td class="contact__form-table__input">
                    <input class="contact__form-table__input-email" type="email" name="email"
                        placeholder="例:test@example.com" value="{{ session('contact')['email'] ?? old('email') }}">
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td>&nbsp;</td>
                <td>
                    <div class="form__error">
                        @error('email')
                            {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    電話番号<span>※</span>
                </td>
                <td class="contact__form-table__input" id="tell">
                    <input type="text" name="tell_1" placeholder="080"
                        value="{{ session('contact')['tell_1'] ?? old('tell_1') }}">
                    <p>-</p>
                    <input type="text" name="tell_2" placeholder="1234"
                        value="{{ session('contact')['tell_2'] ?? old('tell_2') }}">
                    <p>-</p>
                    <input type="text" name="tell_3" placeholder="5678"
                        value="{{ session('contact')['tell_3'] ?? old('tell_3') }}">
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td>&nbsp;</td>
                <td>
                    <div class="form__error">
                        @if ($errors->has('tell_1'))
                            @error('tell_1')
                                {{ $message }}
                            @enderror
                        @elseif ($errors->has('tell_2'))
                            @error('tell_2')
                                {{ $message }}
                            @enderror
                        @else
                            @error('tell_3')
                                {{ $message }}
                            @enderror
                        @endif
                    </div>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    住所<span>※</span>
                </td>
                <td class="contact__form-table__input">
                    <input class="contact__form-table__input-address" type="text" name="address"
                        placeholder="例:東京都渋谷区千駄ヶ谷1-2-3" value="{{ session('contact')['address'] ?? old('address') }}">
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td>&nbsp;</td>
                <td>
                    <div class="form__error">
                        @error('address')
                            {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item">
                    建物名
                </td>
                <td class="contact__form-table__input">
                    <input class="contact__form-table__input-building" type="text" name="building"
                        placeholder="例:千駄ヶ谷マンション101" value="{{ session('contact')['building'] ?? old('building') }}">
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td>&nbsp;</td>
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
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}"
                                    {{ isset(session('contact')['category_id']) && session('contact')['category_id'] == $category->id ? 'selected' : '' }}
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}>

                                    {{ $category->content }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td>&nbsp;</td>
                <td>
                    <div class="form__error">
                        @error('category_id')
                            {{ $message }}
                        @enderror
                    </div>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td class="contact__form-table__item" id="detail">
                    お問い合わせ内容<span>※</span>
                </td>
                <td class="contact__form-table__input">
                    <textarea class="contact__form-table__input-textarea" id="" name="detail" cols="87" rows="7"
                        placeholder="お問い合わせ内容をご記載ください">{{ session('contact')['detail'] ?? old('detail') }}</textarea>
                </td>
            </tr>
            <tr class="contact__form-table__row">
                <td>&nbsp;</td>
                <td>
                    <div class="form__error">
                        @error('detail')
                            {{ $message }}
                        @enderror
                    </div>
                </td>
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
