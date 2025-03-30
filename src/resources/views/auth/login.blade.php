@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')
<div class="login__content">
    <div class="login-form__heading">
        <h2>ログイン</h2>
    </div>
    <form class="form" action="/login" method="post">
        @csrf

        <div class="form__group-content">
            <p>ユーザー名／メールアドレス</p>
            <div class="form__item">
                <input type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}" />
            </div>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form__group-content">
            <p>パスワード</p>
            <div class="form__item">
                <input type="password" name="password" placeholder="パスワード" />
            </div>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <!-- ログインエラー（メールアドレスまたはパスワードのエラー） -->
            @if ($errors->has('login'))
                <div class="text-danger">
                {{ $errors->first('email') }}
                </div>
            @endif

        <div class="form__button">
            <button class="form__button-submit" type="submit">ログインする</button>
        </div>
    </form>
    <div class="register__link">
        <div class="register__item">
            <a class="register__link-text" href="/register">会員登録はこちら</a>
        </div>
    </div>
</div>
@endsection