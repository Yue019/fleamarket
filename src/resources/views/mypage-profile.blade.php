@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection

@section('content')
    <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="container">
                <!-- 見出しを中央配置 -->
                <div class="profile-form__heading">
                    <h2 class="profile-form__title">プロフィール設定</h2>
                </div>

                <div class="header-info">
                    <!-- 画像選択エリア -->
                    <div class="circle">
                        <img id="profileImagePreview"
                        src="{{ Auth::user()->thumbnail ? asset('storage/thumbnail/' . Auth::user()->thumbnail) : '' }}"
                        alt=""
                        style="{{ Auth::user()->thumbnail ? '' : 'display: none;' }}">
                    </div>
                    <div class="choice-button" onclick="document.getElementById('thumbnail').click();">画像を選択</div>
                        <input type="file" name="thumbnail" id="thumbnail" accept="image/*" style="display: none;">
                </div>

                <div class="form__group-content">
                        <p>ユーザー名</p>
                        <div class="form__item">
                            <input type="text" name="name" value="{{ old('name', auth()->user()->first_login ? '' : auth()->user()->name) }}" />
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form__group-content">
                        <p>郵便番号</p>
                        <div class="form__item">
                            <input type="text" name="post_code" value="{{ old('post_code', auth()->user()->first_login ? '' : auth()->user()->post_code) }}" />
                        </div>
                        @error('post_code')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form__group-content">
                        <p>住所</p>
                        <div class="form__item">
                            <input type="text" name="address" value="{{ old('address', auth()->user()->first_login ? '' : auth()->user()->address) }}" />
                        </div>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                </div>

                <div class="form__group-content">
                        <p>建物名</p>
                        <div class="form__item">
                            <input type="text" name="building" value="{{ old('building', auth()->user()->first_login ? '' : auth()->user()->building) }}" />
                        </div>
                </div>

                <div class="form__button">
                        <button class="form__button-submit" type="submit">更新する</button>
                </div>
            </div>
    </form>
@endsection

@section('js')
    <script>
        document.getElementById('thumbnail').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const previewImage = document.getElementById('profileImagePreview');
            const noImageText = document.getElementById('noImageText');

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    // 画像が読み込まれたらプレビューを表示
                    previewImage.style.display = 'block';
                    previewImage.src = e.target.result;
                };

                reader.readAsDataURL(file); // ファイルを読み込み
            } else {
                // 画像が選択されていない場合
                previewImage.style.display = 'none';
            }
        });
    </script>
@endsection


