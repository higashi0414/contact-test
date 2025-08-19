@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')

<div class="container">
  <h2>Register</h2>
  <form action="{{ url('/register') }}" method="POST">
    @csrf
    <div>
      <label>お名前</label>
      <input type="text" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
      @error('name')
        <div style="color:red;">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label>メールアドレス</label>
      <input type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
      @error('email')
        <div style="color:red;">{{ $message }}</div>
      @enderror
    </div>

    <div>
      <label>パスワード</label>
      <input type="password" name="password" placeholder="例: coachtechno06">
      @error('password')
        <div style="color:red;">{{ $message }}</div>
      @enderror
    </div>

    <button type="submit">登録</button>
  </form>
</div>
@endsection