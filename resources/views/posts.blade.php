@extends('layouts.main')
@section('content')

<h1 class="mb-4">{{ $title }}</h1>

@if ($posts->count())
    <div class="card mb-3">
        <img src="https://picsum.photos/seed/1070/720" class="card-img-top" alt="{{ $posts[0]->category->name }}" style="width: 100%; height: 150px; object-fit: cover; margin: 0 auto; display: block;">
        <div class="card-body text-center">
            <h3 class="card-title"><a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none text-dark">{{ $posts[0]->title }}</a></h3>
            <p>
                <small class="text-muted">
                    By: <a href="/authors/{{ $posts[0]->user->username }}" class="text-decoration-none">{{ $posts[0]->user->name }}</a> in <a href="/categories/{{ $posts[0]->category->slug }}" class="text-decoration-none">{{ $posts[0]->category->name }}</a>
                    {{ $posts[0]->created_at->diffForHumans() }}
                </small>
            </p>
            <p class="card-text">{{ $posts[0]->excerpt }}</p>
            <a href="/posts/{{ $posts[0]->slug }}" class="text-decoration-none btn btn-outline-primary">Read more...</a>
        </div>
    </div>
@else
    <p class="text-center fs-4">No post found.</p>
@endif

@foreach ($posts as $post)
<article class="mb-3 border-bottom pb-3">
    <h2>
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
    </h2>
    <p>By: <a href="/authors/{{ $post->user->username }}" class="text-decoration-none">{{ $post->user->name }}</a> in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
    <p>{{ $post->excerpt }}</p>
    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more...</a>
</article>
@endforeach

@endsection