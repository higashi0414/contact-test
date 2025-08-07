@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<div class="container">
    <h2>Login</h2>
    <form class="form" action="/login" method="post">
        @csrf

        <div>
            <label>メールアドレス</label>
            <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
            @error('email')
              <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label>パスワード</label>
            <input type="password" name="password" placeholder="例: coachtechn06">
            @error('password')
              <div style="color:red;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">ログイン</button>
    </form>
</div>
@endsection