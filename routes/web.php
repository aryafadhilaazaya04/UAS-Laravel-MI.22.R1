<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', function () {
    return view('home', [
        "title" => "Home"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Arya Fadhila Azaya - MI.22.R1",
        "email" => "aryafadhila@gmail.com",
        "image" => "AvatarAI.jpg"
    ]);
});

Route::get('/posts', [PostController::class, 'index']);

// Halaman untuk single post
Route::get('posts/{post:slug}', [PostController::class, 'show']);