@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/mypage.css') }}">
@endsection

@section('content')

    <div class="container">
        <div class="index-heading">
            <div class="header-info">
                <div class="circle">
                    <!-- ユーザー画像を円の中に表示 -->
                    <img src="{{ asset(Auth::user()->thumbnail) }}" alt="" class="user-image">


                </div>

                <div class="user-info">
                    <span class="user-name">{{ Auth::user()->name }}</span> <!-- ユーザー名 -->
                </div>
                <a href="{{ route('mypage.profile') }}" class="profile-link">プロフィールを編集</a>
            </div>
                <!-- リストをその下に配置 -->
            <nav>
                <ul>
                    <li>出品した商品</li>
                    <li>購入した商品</li>
                </ul>
            </nav>
        </div>

        <div class='gallery'>
            <div class="thumbnail-item">
                <img src="{{ asset('img/clock.jpg') }}" alt="腕時計" class="thumbnail">
                    <p class="caption">腕時計</p>
            </div>
            <div class="thumbnail-item">
                <img src="{{ asset('img/coffee-grinder.jpg') }}" alt="コーヒーミル" class="thumbnail">
                    <p class="caption">コーヒーミル</p>
            </div>
            <div class="thumbnail-item">
                <img src="{{ asset('img/hdd.jpg') }}" alt="HDD" class="thumbnail">
                    <p class="caption">HDD</p>
            </div>
            <div class="thumbnail-item">
                <img src="{{ asset('img/Laptop.jpg') }}" alt="ノートPC" class="thumbnail">
                    <p class="caption">ノートPC</p>
            </div>
            <div class="thumbnail-item">
                <img src="{{ asset('img/leather-shoes.jpg') }}" alt="革靴" class="thumbnail">
                    <p class="caption">革靴</p>
            </div>
            <div class="thumbnail-item">
                <img src="{{ asset('img/makeup.jpg') }}" alt="メイクセット" class="thumbnail">
                    <p class="caption">メイクセット</p>
            </div>
            <div class="thumbnail-item">
                <img src="{{ asset('img/Mic.jpg') }}" alt="マイク" class="thumbnail">
                    <p class="caption"> マイク</p>
            </div>
            <div class="thumbnail-item">
                <img src="{{ asset('img/onion.jpg') }}" alt="玉ねぎ3束" class="thumbnail">
                    <p class="caption">玉ねぎ3束</p>
            </div>
            <div class="thumbnail-item">
                <img src="{{ asset('img/pocket.jpg') }}" alt="ショルダーバッグ" class="thumbnail">
                    <p class="caption">ショルダーバッグ</p>
            </div>
            <div class="thumbnail-item">
                <img src="{{ asset('img/tumbler.jpg') }}" alt="タンブラー" class="thumbnail">
                    <p class="caption">タンブラー</p>
            </div>
        </div>
    </div>
@endsection