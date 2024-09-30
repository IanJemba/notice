<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MarkingController;
use App\Http\Middleware\CheckAdmin;
use App\Models\notice;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', function () {
    $latestNotice = Notice::latest()->first();
    return view('dashboard', compact('latestNotice'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('categories', CategoryController::class);
Route::resource('notices', NoticeController::class);
Route::resource('comments', CommentController::class);
Route::resource('markings', MarkingController::class);
Route::post('/notices/{notice}/comments', [CommentController::class, 'store'])->name('comments.store');


// Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
// Route::get('/admin/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');
// Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
// Route::get('/admin/users/create', [AdminController::class, 'userCreate'])->name('admin.users.create');
// Route::get('/admin/users/{id}/edit', [AdminController::class, 'userEdit'])->name('admin.users.edit');
// Route::get('/admin/users/{id}/delete', [AdminController::class, 'userDelete'])->name('admin.users.delete');


// Route::post('/admin/users/store', [AdminController::class, 'userStore'])->name('admin.users.store');
// Route::patch('/admin/users/update', [AdminController::class, 'userUpdate'])->name('admin.users.update');
// Route::delete('/admin/users/destroy', [AdminController::class, 'userDestroy'])->name('admin.users.destroy');

Route::middleware([CheckAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/statistics', [AdminController::class, 'statistics'])->name('admin.statistics');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/create', [AdminController::class, 'userCreate'])->name('admin.users.create');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'userEdit'])->name('admin.users.edit');
    Route::get('/admin/users/{id}/delete', [AdminController::class, 'userDelete'])->name('admin.users.delete');

    Route::post('/admin/users/store', [AdminController::class, 'userStore'])->name('admin.users.store');
    Route::patch('/admin/users/update', [AdminController::class, 'userUpdate'])->name('admin.users.update');
    Route::delete('/admin/users/destroy', [AdminController::class, 'userDestroy'])->name('admin.users.destroy');
});

require __DIR__ . '/auth.php';
