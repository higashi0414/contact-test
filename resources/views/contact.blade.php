@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact-form-wrapper">
    <div class="contact-header">
        <h1 class="contact-title">Contact</h1>
    </div>

    <form class="contact-form" action="{{ route('confirm') }}" method="post">
        @csrf
        <div class="form-group">
            <div class="form-label-wrapper">
                <label for="name" class="form-label">お名前<span class="required-mark">※</span></label>
            </div>
            <div class="form-input-wrapper name-inputs">
                <input type="text" name="last_name" id="last_name" class="form-input-half" placeholder="例: 山田" value="{{ old('last_name') }}">
                <input type="text" name="first_name" id="first_name" class="form-input-half" placeholder="例: 太郎" value="{{ old('first_name') }}">
            </div>
        </div>
        <div class="form-error-wrapper">
            @error('last_name')
                <div class="form-error">{{ $message }}</div>
            @enderror
            @error('first_name')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-label-wrapper">
                <label class="form-label">性別<span class="required-mark">※</span></label>
            </div>
            <div class="form-input-wrapper gender-inputs">
                <label class="radio-label">
                    <input type="radio" name="gender" value="male" class="radio-input" @if(old('gender', 'male') == 'male') checked @endif> 男性
                </label>
                <label class="radio-label">
                    <input type="radio" name="gender" value="female" class="radio-input" @if(old('gender') == 'female') checked @endif> 女性
                </label>
                <label class="radio-label">
                    <input type="radio" name="gender" value="other" class="radio-input" @if(old('gender') == 'other') checked @endif> その他
                </label>
            </div>
        </div>
        <div class="form-error-wrapper">
            @error('gender')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-label-wrapper">
                <label for="email" class="form-label">メールアドレス<span class="required-mark">※</span></label>
            </div>
            <div class="form-input-wrapper">
                <input type="email" name="email" id="email" class="form-input" placeholder="例: test@example.com" value="{{ old('email') }}">
            </div>
        </div>
        <div class="form-error-wrapper">
            @error('email')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-label-wrapper">
                <label for="tel" class="form-label">電話番号<span class="required-mark">※</span></label>
            </div>
            <div class="form-input-wrapper tel-inputs">
                <input type="tel" name="tel_1" id="tel_1" class="form-input-tel" placeholder="080" value="{{ old('tel_1') }}"> -
                <input type="tel" name="tel_2" id="tel_2" class="form-input-tel" placeholder="1234" value="{{ old('tel_2') }}"> -
                <input type="tel" name="tel_3" id="tel_3" class="form-input-tel" placeholder="5678" value="{{ old('tel_3') }}">
            </div>
        </div>
        <div class="form-error-wrapper">
            @error('tel')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-label-wrapper">
                <label for="address" class="form-label">住所<span class="required-mark">※</span></label>
            </div>
            <div class="form-input-wrapper">
                <input type="text" name="address" id="address" class="form-input" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
            </div>
        </div>
        <div class="form-error-wrapper">
            @error('address')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-label-wrapper">
                <label for="building" class="form-label">建物名</label>
            </div>
            <div class="form-input-wrapper">
                <input type="text" name="building" id="building" class="form-input" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
            </div>
        </div>
        <div class="form-error-wrapper">
            @error('building')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-label-wrapper">
                <label for="category_id" class="form-label">お問い合わせの種類<span class="required-mark">※</span></label>
            </div>
        <div class="form-input-wrapper">
            <select name="category_id" id="category_id" class="form-select">
                <option value="">選択してください</option>
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" @if(old('category_id') == $category->id) selected @endif>
                    {{ $category->content }}
                </option>
                @endforeach
            </select>
        </div>

        </div>
        <div class="form-error-wrapper">
            @error('category_id')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <div class="form-label-wrapper">
                <label for="detail" class="form-label">お問い合わせ内容<span class="required-mark">※</span></label>
            </div>
            <div class="form-input-wrapper">
                <textarea name="detail" id="detail" class="form-textarea" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
            </div>
        </div>
        <div class="form-error-wrapper">
            @error('detail')
                <div class="form-error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-submit-wrapper">
            <button type="submit" class="form-submit-button">確認画面</button>
        </div>
    </form>
</div>
@endsection