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
Route::get('/', [PostController::class, 'index'])
    ->name('app.index');
Route::post('/', [PostController::class, 'index'])
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
// 新規作成
Route::get('post', [PostController::class, 'create'])
    ->name('app.post.create');

// 保存
Route::post('post', [PostController::class, 'store'])
    ->name('app.post.store');

// 個別表示
Route::get('post/show/{post}', [PostController::class, 'show'])
    ->name('app.post.show');

// 編集・更新
Route::get('post/{post}/edit', [PostController::class, 'edit'])
    ->name('app.post.edit');
Route::patch('post/{post}', [PostController::class, 'update'])
    ->name('app.post.update');

// 削除
Route::get('post/{post}/destroy', [PostController::class, 'confirmDelete'])
    ->name('app.post.confirmDelete');
Route::delete('post/{post}', [PostController::class, 'destroy'])
    ->name('app.post.destroy');

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
