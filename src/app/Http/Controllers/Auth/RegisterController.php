<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Notifications\VerifyEmail;


class RegisterController extends Controller
{  public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(RegisterRequest $request)
    {
        // バリデーションが通ると、リクエストデータは自動的に利用可能
        $validated = $request->validated();

        // ユーザーを登録
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'first_login' => true, // 初回ログインフラグを true にする
        ]);

        $user->notify(new VerifyEmail());
        event(new Registered($user));

        //認証待ちページへ
        return view('auth.verify-email', ['user' => $user]);
    }
}