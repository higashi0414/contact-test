@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('content')
<div class="thanks-container">
    <div class="thanks-message">
        <p class="thanks-text">お問い合わせありがとうございました</p>
        <a href="/" class="home-button">HOME</a>
    </div>
</div>
@endsection
