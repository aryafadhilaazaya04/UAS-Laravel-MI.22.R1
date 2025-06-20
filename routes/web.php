<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/blog', function () {
    return view('posts', [
        "title" => "Posts"
    ]);
});
