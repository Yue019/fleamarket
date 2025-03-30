@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
<link rel="stylesheet" href="{{ asset('css/common.css') }}">
@endsection

@section('content')

<div class="register__content">
    <div class="register-form__heading">
        <h2>会員登録</h2>
    </div>
    <form class="form" action="/register" method="post">
        @csrf
        <div class="form__group-content">
            <p> ユーザー名</p>
            <div class="form__item">
                <input type="text" name="name" placeholder="名前" value="{{ old('name') }}" />
            </div>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div >

        <div class="form__group-content">
            <p>メールアドレス</p>
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

        <div class="form__group-content">
            <p>確認用パスワード</p>
            <div class="form__item">
                <input type="password" name="password_confirmation" placeholder="確認用パスワード" />
            </div>
        </div>

        <div class="form__button">
            <button class="form__button-submit" type="submit">登録する</button>
        </div>
    </form>
    <div class="login__link">
        <div class="login__item">
                <a class="login__link-text" href="/login">ログインはこちら</a>
        </div>

    </div>
</div>
@endsection