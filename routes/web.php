<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\MarkingController;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\CheckUser;
use App\Models\Notice;

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

// Paths for categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::middleware([CheckAdmin::class])->group(function () {
    Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/categories/{category}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

// Paths for notices
Route::get('/notices', [NoticeController::class, 'index'])->name('notices.index');
Route::get('/notices/{notice}', [NoticeController::class, 'show'])->name('notices.show');
Route::middleware([CheckUser::class])->group(function () {
    Route::get('/notices/{notice}/edit', [NoticeController::class, 'edit'])->name('notices.edit');
    Route::patch('/notices/{notice}', [NoticeController::class, 'update'])->name('notices.update');
    Route::delete('/notices/{notice}', [NoticeController::class, 'destroy'])->name('notices.destroy');
    Route::get('/notices/create', [NoticeController::class, 'create'])->name('notices.create');
    Route::post('/notices', [NoticeController::class, 'store'])->name('notices.store');
    Route::get('/notices/create', [NoticeController::class, 'create'])->name('notices.create');
    Route::post('/notices', [NoticeController::class, 'store'])->name('notices.store');
    Route::post('/notices/{notice}/marking_update', [NoticeController::class, 'marking_update'])->name('notices.marking_update');
});


// Paths for comments
Route::middleware([CheckUser::class])->group(function () {
    Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
    Route::patch('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// Marking paths
Route::get('/markings', [MarkingController::class, 'index'])->name('markings.index');
Route::middleware([CheckAdmin::class])->group(function () {
    Route::get('/markings/create', [MarkingController::class, 'create'])->name('markings.create');
    Route::post('/markings', [MarkingController::class, 'store'])->name('markings.store');
    Route::get('/markings/{marking}/edit', [MarkingController::class, 'edit'])->name('markings.edit');
    Route::patch('/markings/{marking}', [MarkingController::class, 'update'])->name('markings.update');
    Route::delete('/markings/{marking}', [MarkingController::class, 'destroy'])->name('markings.destroy');
});

// Admin paths
Route::middleware([CheckAdmin::class])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/admin/users/create', [AdminController::class, 'userCreate'])->name('admin.users.create');
    Route::get('/admin/users/{id}/edit', [AdminController::class, 'userEdit'])->name('admin.users.edit');
    Route::get('/admin/users/{id}/delete', [AdminController::class, 'userDelete'])->name('admin.users.delete');

    Route::post('/admin/users/store', [AdminController::class, 'userStore'])->name('admin.users.store');
    Route::patch('/admin/users/update', [AdminController::class, 'userUpdate'])->name('admin.users.update');
    Route::delete('/admin/users/destroy', [AdminController::class, 'userDestroy'])->name('admin.users.destroy');
});

require __DIR__ . '/auth.php';
