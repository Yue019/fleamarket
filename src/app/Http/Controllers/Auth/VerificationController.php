<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;
use App\Models\User;
use Illuminate\Support\Facades\Notification;
use Illuminate\Auth\Notifications\VerifyEmail;

class VerificationController extends Controller
{
    // 認証メールの再送信
    public function resend(Request $request)
    {
        $email = $request->input('email');

        // ユーザーをメールアドレスで検索
        $user = User::where('email', $email)->first();

        if (!$user) {
            return back()->withErrors(['email' => '登録されていないメールアドレスです。']);
        }

        // 既に認証済みの場合
        if ($user->hasVerifiedEmail()) {
            return back()->with('status', 'すでに認証済みです。');
        }

        // 認証メールの送信
        $user->notify(new VerifyEmail());

        return back()->with('status', '認証メールを再送しました。');
    }

    // 認証処理
    public function verify(Request $request, $id, $hash)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json(['error' => 'ユーザーが見つかりません。'], 404);
        }

        if (!hash_equals((string) $hash, sha1($user->getEmailForVerification()))) {
            return response()->json(['error' => '無効な認証リンクです。'], 403);
        }

        if (!$user->hasVerifiedEmail()) {
            $user->markEmailAsVerified();
            event(new Verified($user));
        }

        // 認証後に自動ログイン
        Auth::login($user);

        // プロフィールページへリダイレクト
        return redirect()->route('mypage.profile');
    }
}
