<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Http\Requests\AddressRequest;
use App\Http\Requests\ProfileRequest;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
        public function showProfileForm()
    {
        $user = Auth::user();

        // 初回ログインかどうかを判定
        if ($user->first_login) {
            return view('mypage-profile', ['user' => null]);
        } else {
            return view('mypage-profile', ['user' => $user]);
        }
    }

        public function updateProfile(ProfileRequest $profileRequest, AddressRequest $addressRequest)
    {
      // バリデーション済みデータを取得（プロフィール関連）
        $validatedProfile = $profileRequest->validated();

      // バリデーション済みデータを取得（住所関連）
        $validatedAddress = $addressRequest->validated();

      // 現在のユーザー情報を取得
        $user = Auth::user();

      // プロフィール画像のアップロード処理
        if ($profileRequest->hasFile('thumbnail')) {
        // 古い画像があれば削除
            if ($user->thumbnail) {
            Storage::delete(str_replace('storage/', 'public/', $user->thumbnail));
        }

        // 新しい画像を保存
        $path = $profileRequest->file('thumbnail')->store('public/thumbnail');

        // 保存パスを `storage/thumbnail/xxx.jpg` に変換
        $validatedProfile['thumbnail'] = str_replace('public/', 'storage/', $path);
    }

    // 初回ログインフラグを false にする（初回のみ）
    if ($user->first_login) {
        $validatedProfile['first_login'] = false;
    }

    // ユーザー情報を更新
    $user->update(array_merge($validatedProfile, $validatedAddress));

        return redirect()->route('home');
    }
}
