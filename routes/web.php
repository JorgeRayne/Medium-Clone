<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function(){
    Route::get('/', [PostController::class, 'index'])
        ->middleware(['auth', 'verified'])
        ->name('dashboard');

    Route::get('/post/create}', [PostController::class, 'create'])
        ->middleware(['auth', 'verified'])
        ->name('post.create');

    Route::post('/post/create', [PostController::class, 'store'])
        ->middleware(['auth', 'verified'])
        ->name('post.store');

    Route::get('/@{username}/{post:slug}', [PostController::class, 'show'])
        ->name('post.show');
});

Route::get('/dashboard/category/{category}',[CategoryController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.category');
Route::get('/dashboard/post/{post}', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('dashboard.show');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
