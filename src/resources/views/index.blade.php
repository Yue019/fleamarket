@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
@endsection

@section('content')

    <div class="container">
        <div class="index-heading">
            <nav>
                <ul>
                    <li><a href="{{ route('home') }}" class="{{ request()->is('/') ? 'active' : '' }}">おすすめ</a></li>
                    <li>マイリスト</li>
                </ul>
            </nav>
        </div>
        <div class='gallery'>
        @foreach ($items as $item)
        <div class="thumbnail-item">
            <img src="{{ asset($item->img) }}" alt="{{ $item->name }}" class="thumbnail">
            <p class="caption">{{ $item->name }}</p>
        </div>
        @endforeach
        </div>
    </div>
@endsection