@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Post by {{ $post->author }}</h1>
</div>

<div class="container">
    <div class="row mb-5">
        <div class="col-lg-8">
            <article class="mb-5">
                <h2>{{ $post->title }}</h2>
                <h6 class="opacity-50">{{ $post->created_at->diffForHumans() }}</h6>
                @if ($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}" class="img-fluid mb-3" style="width: 100%; height: 200px; object-fit: cover; margin: 0 auto; display: block;">
                @else
                <img src="https://picsum.photos/200/300?{{ $post->category->name }}" alt="{{ $post->category->name }}" class="img-fluid mb-3" style="width: 100%; height: 200px; object-fit: cover; margin: 0 auto; display: block;">
                @endif
                {!! $post->body !!}
            </article>

            <a href="/dashboard" class="d-block">Back to Posts</a>
        </div>
    </div>
</div>

@endsection