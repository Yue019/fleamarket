@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection

@section('content')
    <form method="POST" action="{{ route('sell') }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
            <div class="sell-container">
                <!-- 見出しを中央配置 -->
                <div class="sell-form__heading">
                    <h2 class="profile-form__title">商品の出品</h2>
                </div>

                <div class="sell-img">
                    <p>商品画像</p>
                    <!-- 画像選択エリア -->
                    <div class="img-area">
                        <div class="choice-button" onclick="document.getElementById('img').click();">画像を選択</div>
                            <input type="file" name="img" id="img" accept="image/*" style="display: none;">
                    <!-- ファイル名を表示するエリア -->
                    <p id="file-name" style="margin-top: 5px;"></p>
                    </div>
                    @error('img')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror

                <div class="detail">
                    <h3>商品の詳細</h3>
                        <div class="category-choice">
                            <p>カテゴリー</p>
                                <div class="btn-group">
                                    @foreach($categories as $category)
                                    <div>
                                        <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}" class="category-checkbox">
                                        <label for="category-{{ $category->id }}" class="category-label">{{ $category->name }}</label>
                                    </div>
                                    @endforeach
                                </div>
                                @error('categories')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>

                        <div class="select-button">
                            <p>商品の状態</p>
                                <select name="select">
                                    <option value="" disabled selected>商品を選択してください</option>
                                    @foreach ($conditions as $condition)
                                        <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                                    @endforeach
                                </select>
                            @error('select')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>
                </div>

                <div class="explanation">
                    <h3>商品名と説明</h3>
                        <div class="explanation-form">
                            <p>商品名</p>
                            <div class="form__item">
                                <input type="text" name="name" />
                            </div>
                            @error('name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="explanation-form">
                            <p>商品の説明</p>
                            <div class="form__item">
                                <textarea name="description"  rows="3"></textarea>
                            </div>
                            @error('description')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                        </div>

                        <div class="explanation-form">
                            <p>販売価格</p>
                            <div class="form__item">
                                <input type="text" name="price" placeholder="￥" />
                            </div>
                            @error('price')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                </div>
                <div class="form__button">
                    <button class="form__button-submit" type="submit">出品する</button>
                </div>
            </div>
    </form>
@endsection

@section('js')
<script>
    document.getElementById('img').addEventListener('change', function(event) {
        const file = event.target.files[0]; // 選択されたファイルを取得
        const fileNameDisplay = document.getElementById('file-name');

        if (file) {
            // ファイル名（拡張子付き）を表示
            fileNameDisplay.textContent = '選択されたファイル: ' + file.name;
        } else {
            fileNameDisplay.textContent = '';
        }
    });
</script>
@endsection


