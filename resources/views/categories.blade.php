@extends('layouts.main')
@section('content')

<h1 class="mb-4">Post Categories</h1>

<div class="container">
    <div class="row">
        @foreach ($categories as $category)
        <div class="col-md-4">
            <a href="/posts?category={{ $category->slug }}" class="text-decoration-none text-white category-hover">
            <style>
            .category-hover .card {
                transition: transform 0.2s cubic-bezier(.4,2,.6,1);
            }
            .category-hover:hover .card {
                transform: translateY(-8px) scale(1.05);
                z-index: 2;
            }
            </style>
                <div class="card text-bg-dark">
                <img src="https://picsum.photos/200/300?{{ $category->name }}" class="card-img" alt="{{ $category->name }}" style="width: 100%; height: 150px; object-fit: cover; margin: 0 auto; display: block;">
                    <div class="card-img-overlay d-flex align-items-center justify-content-center p-0">
                        <h5 class="card-title text-center flex-fill p-4" style="background-color: rgba(0, 0, 0, 0.5);">{{ $category->name }}</h5>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@endsection