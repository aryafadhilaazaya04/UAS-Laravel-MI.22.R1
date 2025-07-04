@extends('layouts.main')
@section('content')

<div class="container">
    <div class="row justify-content-center mb-5">
        <div class="col-md-8">
            <article class="mb-5">
                <h2>{{ $post->title }}</h2>
                <p>By: <a href="/posts?user={{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/posts?category={{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3" style="width: 100%; height: 200px; object-fit: cover; margin: 0 auto; display: block;">
                @else
                <img src="https://picsum.photos/200/300?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mb-3" style="width: 100%; height: 200px; object-fit: cover; margin: 0 auto; display: block;">
                @endif
                {!! $post->body !!}
            </article>

            <a href="/posts" class="d-block">Back to Posts</a>
        </div>
    </div>
</div>

@endsection