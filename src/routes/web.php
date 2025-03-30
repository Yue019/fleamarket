<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Verified;
use App\Models\User;

// ホーム画面
Route::get('/', [AuthController::class, 'index'])->name('home');

// ユーザー登録
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// ログイン・ログアウト
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// 認証待ち画面（ログインしていなくてもアクセス可能）
Route::get('/email/verify', function () {
    return view('auth.verify-email',compact('user'));
})->name('verification.notice');

// 認証メールの再送信（ログインしていないユーザー向け）
Route::post('/email/resend', [VerificationController::class, 'resend'])->name('verification.resend');

// メール認証処理（ボタンを押して認証）
Route::post('/email/verify/{id}/{hash}', [VerificationController::class, 'verify'])->name('verification.verify');

// 初回ログイン後のプロフィールページ
Route::get('/mypage/profile', [ProfileController::class, 'showProfileForm'])->name('mypage.profile')->middleware('verified');

// プロフィール更新、商品登録
Route::middleware(['auth'])->group(function () {
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');

    Route::get('/mypage', [AuthController::class, 'mypage'])->name('mypage');
    Route::get('/sell', [SellController::class, 'ShowSellForm'])->name('sell');

    Route::put('/sell', [SellController::class, 'store'])->name('sell.store');

});


