<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

// Public Routes
Route::get('/', [BlogController::class, 'index'])->name('home');
Route::get('/blogs/filter', [BlogController::class, 'filter'])->name('blogs.filter');
Route::get('/blogs/{id}', [BlogController::class, 'show'])->name('blogs.show');

// Auth Routes
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Authenticated Routes
Route::middleware(['auth'])->group(function () {
    // Blog interactions
    Route::post('/blogs/{id}/upvote', [BlogController::class, 'upvote'])->name('blogs.upvote');
    Route::post('/blogs/{id}/comment', [CommentController::class, 'store'])->name('comments.store');

    // My posts
    Route::get('/my-posts', [BlogController::class, 'myPosts'])->name('my.posts');
    Route::get('/posts/create', [BlogController::class, 'create'])->name('posts.create');
    Route::post('/posts', [BlogController::class, 'store'])->name('posts.store');
    Route::get('/posts/{id}/edit', [BlogController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [BlogController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [BlogController::class, 'destroy'])->name('posts.destroy');

    // Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/blogs', [AdminController::class, 'blogs'])->name('admin.blogs');
    Route::delete('/blogs/{id}', [AdminController::class, 'destroy'])->name('admin.blogs.destroy');
});