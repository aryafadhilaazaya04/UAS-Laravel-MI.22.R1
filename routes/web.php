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
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Arya Fadhila Azaya",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.",
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Arya Azaya",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod aspernatur culpa incidunt deleniti reiciendis laboriosam molestias ea libero officiis. Laborum consequuntur porro aliquid voluptatem a quas ab! Consectetur doloremque eaque fugit reprehenderit. Illo dignissimos fugiat, omnis, nulla voluptatum quo assumenda unde ab suscipit vero temporibus hic eius repudiandae veniam molestiae?",
        ]
    ];

    return view('posts', [
        "title" => "Posts",
        "posts" => $blog_posts
    ]);
});

// Halaman untuk single post
Route::get('posts/{slug}', function ($slug) {
    $blog_posts = [
        [
            "title" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Arya Fadhila Azaya",
            "body" => "Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum. Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, voluptatum.",
        ],
        [
            "title" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Arya Azaya",
            "body" => "Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quod aspernatur culpa incidunt deleniti reiciendis laboriosam molestias ea libero officiis. Laborum consequuntur porro aliquid voluptatem a quas ab! Consectetur doloremque eaque fugit reprehenderit. Illo dignissimos fugiat, omnis, nulla voluptatum quo assumenda unde ab suscipit vero temporibus hic eius repudiandae veniam molestiae?",
        ]
    ];

    $new_post = [];
    foreach ($blog_posts as $post) {
        if ($post["slug"] === $slug) {
            $new_post = $post;
        }
    }

    return view('post', [
        "title" => "Single Post",
        "post" => $new_post
    ]);
});