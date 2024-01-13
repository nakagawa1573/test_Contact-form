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
                    <input type="text" name="last_name" placeholder="例:山田"  value="{{old('last_name')}}">
                    <input type="text" name="first_name" placeholder="例:太郎"  value="{{old('first_name')}}">
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
                    <input class="contact__form-table__input-email" type="email" name="email" placeholder="例:test@example.com" value="{{old('email')}}">
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
                    <input type="text" name="tell_1" placeholder="080" value="{{old('tell_1')}}">
                    <p>-</p>
                    <input type="text" name="tell_2" placeholder="1234" value="{{old('tell_2')}}">
                    <p>-</p>
                    <input type="text" name="tell_3" placeholder="5678" value="{{old('tell_3')}}">
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
                    <input class="contact__form-table__input-address" type="text" name="address" placeholder="例:東京都渋谷区千駄ヶ谷1-2-3"
                    value="{{old('address')}}">
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
                    <input class="contact__form-table__input-building" type="text" name="building" placeholder="例:千駄ヶ谷マンション101"
                    value="{{old('building')}}">
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
                                <option value="{{ $category->id }}">
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
                <td class="contact__form-table__item">
                    お問い合わせ内容<span>※</span>
                </td>
                <td class="contact__form-table__input">
                    <textarea class="contact__form-table__input-textarea" id="" name="detail" cols="87" rows="7" placeholder="お問い合わせ内容をご記載ください">{{old('detail')}}</textarea>
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
