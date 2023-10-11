<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/test', [TestController::class, 'test'])
    ->name('test');

Route::get('/welcome', function () {
    return view('welcome');
});

// メインページ
Route::get('/', [IndexController::class, 'index'])
    ->name('app.index');
Route::post('/', [IndexController::class, 'index'])
    ->name('app.index');

Route::post('/', [IndexController::class, 'index'])
    ->name('app.index');

// プロフィール
Route::get('/profile', [ProfileController::class, 'index'])
    ->name('app.profile');

// 通知
Route::get('/notification', [NotificationController::class, 'index'])
    ->name('app.notification');

// 設定
Route::get('/settings', [NotificationController::class, 'index'])
    ->name('app.notification');

// メッセージ
Route::get('/message', [NotificationController::class, 'index'])
    ->name('app.notification');

// 投稿
Route::get('post', [PostController::class, 'create'])
    ->name('app.post.create');
Route::post('post', [PostController::class, 'store'])
    ->name('app.post.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Language Switcher Route 言語切替用ルートだよ
Route::get('language/{locale}', function ($locale) {
    app()->setLocale($locale);
    session()->put('locale', $locale);

    return redirect()->back();
});
