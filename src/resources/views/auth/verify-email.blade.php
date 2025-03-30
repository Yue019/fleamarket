@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="container">
    <h2>認証メールを送信しました</h2>
    <p>登録していただいたメールアドレスに認証メールを送付しました。</p>
    <p>メール認証を完了してください。</p>

    {{-- 認証ボタン --}}
    <form action="{{ route('verification.verify', ['id' => $user->id, 'hash' => sha1($user->getEmailForVerification())]) }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">認証はこちらから</button>
    </form>

    {{-- 認証メール再送 --}}
    <p class="resend-link">
        <a href="{{ route('verification.resend') }}" onclick="event.preventDefault(); document.getElementById('resend-form').submit();">
            認証メールを再送信
        </a>
    </p>

    <form id="resend-form" action="{{ route('verification.resend') }}" method="POST" style="display: none;">
        @csrf
    </form>

    @if (session('status'))
        <div>{{ session('status') }}</div>
    @endif
</div>
@endsection
