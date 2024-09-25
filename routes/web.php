<?php


use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Models\notice;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $latestNotice = Notice::latest()->first();
    return view('dashboard', compact('latestNotice'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Categories
Route::resource('categories', CategoryController::class);

Route::resource('notices', NoticeController::class);

Route::resource('comments', CommentController::class);


require __DIR__ . '/auth.php';
