<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

// トップページを認証ページに変更
Route::get('/', function () {
    return view('welcome'); // Laravelのデフォルトウェルカムページ
})->name('home');

// 認証済みユーザー用ルート
Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('tasks', TaskController::class);
    Route::get('/dashboard', function () {
        return redirect()->route('tasks.index');
    })->name('dashboard');
});

// 管理者用ルート
Route::prefix('admin')->name('admin.')->group(function () {
    Route::match(['get', 'post'], '/login', [AdminController::class, 'login'])->name('login');
    Route::get('/logout', [AdminController::class, 'logout'])->name('logout');
    Route::get('/database', [AdminController::class, 'database'])->name('database');
});

require __DIR__.'/auth.php';