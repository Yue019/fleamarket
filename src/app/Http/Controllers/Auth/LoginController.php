<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    // ログイン処理
    public function login(LoginRequest $request)
    {
        // バリデーション済みデータの取得
        $validated = $request->validated();

        // 認証試行
        if (!Auth::attempt($validated, $request->filled('remember'))) {
            throw ValidationException::withMessages([
                'email' => ['ログイン情報が登録されていません。'],
            ]);
        }

            // ログインしたユーザー情報を取得
        $user = Auth::user();

        // メール認証がされていない場合はログアウトさせる
        if (!$user->hasVerifiedEmail()) {
            Auth::logout();
            return back()->withErrors(['email' => 'メール認証が完了していません。']);
        }

        // 初回ログインの判定
        if ($user->first_login) {
            return redirect()->route('mypage.profile'); // 初回ログインページ
        }

        //通常のログインリダイレクト
        return redirect()->intended(route('home'));
    }

    // ログインフォーム
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // ログアウト処理
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}