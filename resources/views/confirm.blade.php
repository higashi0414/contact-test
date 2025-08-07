@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
@endsection

@section('content')
<div class="confirm">
    <h1 class="confirm__title">Confirm</h1>
    <form action="{{ route('contacts.store') }}" method="POST">
        @csrf
        <table class="confirm__table">
            <tr>
                <th>お名前</th>
                <td>{{ $inputs['last_name'] }}　{{ $inputs['first_name'] }}</td>
            </tr>
            <tr>
                <th>性別</th>
                <td>
                    @if ($inputs['gender'] === 'male')
                        男性
                    @elseif ($inputs['gender'] === 'female')
                        女性
                    @else
                        その他
                    @endif
                </td>
            </tr>
            <tr>
                <th>メールアドレス</th>
                <td>{{ $inputs['email'] }}</td>
            </tr>
            <tr>
                <th>電話番号</th>
                <td>{{ $inputs['tel'] }}</td>
            </tr>
            <tr>
                <th>住所</th>
                <td>{{ $inputs['address'] }}</td>
            </tr>
            <tr>
                <th>建物名</th>
                <td>{{ $inputs['building'] }}</td>
            </tr>
            <tr>
                <th>お問い合わせの種類</th>
                <td>{{ $inputs['type'] }}</td>
            </tr>
            <tr>
                <th>お問い合わせ内容</th>
                <td>{!! nl2br(e($inputs['content'])) !!}</td>
            </tr>
        </table>

        {{-- hiddenでデータを再送信 --}}
        @foreach ($inputs as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
        @endforeach

        <div class="confirm__buttons">
            <button type="submit" class="confirm__button">送信</button>
            <a href="{{ route('contacts.form') }}" class="confirm__link">修正</a>
        </div>
    </form>
</div>
@endsection
