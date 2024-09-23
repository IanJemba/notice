<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categories', CategoryController::class);
Route::resource('notices', NoticeController::class);
Route::resource('comments', CommentController::class);

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/users/create', [AdminController::class, 'userCreate'])->name('admin.users.create');
Route::get('/admin/users/{id}/edit', [AdminController::class, 'userEdit'])->name('admin.users.edit');
Route::get('/admin/users/{id}/delete', [AdminController::class, 'userDelete'])->name('admin.users.delete');

Route::patch('/admin/users/update', [AdminController::class, 'userUpdate'])->name('admin.users.update');
Route::delete('/admin/users/destroy', [AdminController::class, 'userDestroy'])->name('admin.users.destroy');


require __DIR__ . '/auth.php';
