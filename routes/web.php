<?php

use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\DashboardPostController;

Route::get('/', function () {
    return view('home', [
        "title" => "Home",
        "active" => "home"
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function() {
        return view('dashboard.index', [
            'title' => 'Dashboard',
            'active' => 'dashboard'
        ]);
    });

    Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug']);
    Route::resource('/dashboard/posts', DashboardPostController::class);
});

// Custom admin-only route protection for categories
Route::middleware(['auth'])->group(function () {
    Route::resource('/dashboard/categories', AdminCategoryController::class)
        ->except('show');
});

// Middleware closure for admin only (fix for closure error)
use Illuminate\Support\Facades\Auth;
Route::middleware(['auth'])->group(function () {
    Route::match(['get', 'post', 'put', 'patch', 'delete'], '/dashboard/categories/{any?}', function($any = null) {
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Unauthorized action.');
        }
        return redirect()->route('categories.index');
    })->where('any', '.*');
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "active" => "about",
        "name" => "Arya Fadhila Azaya - MI.22.R1",
        "email" => "aryafadhila@gmail.com",
        "image" => "AvatarAI.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('/categories', function () {
    return view('categories', [
        'title' => 'Post Categories',
        'active' => 'categories',
        'categories' => Category::all()
    ]);
});

// Route::get('/categories/{category:slug}', function (Category $category) {
//     return view('posts', [
//         'title' => 'Post By Category: ' . $category->name,
//         'active' => 'categories',
//         'posts' => $category->posts->load('category', 'user')
//     ]);
// });

// Route::get('/authors/{author:username}', function (User $author) {
//     return view('posts', [
//         'title' => 'Posts By Author: ' . $author->name,
//         'active' => 'posts',
//         'posts' => $author->posts->load('category', 'user')
//     ]);
// });
