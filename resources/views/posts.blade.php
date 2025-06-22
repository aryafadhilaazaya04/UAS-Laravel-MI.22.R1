@extends('layouts.main')
@section('content')

<h1 class="mb-4">Halaman Blog Posts</h1>
@foreach ($posts as $post)
<article class="mb-3 border-bottom pb-3">
    <h2>
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
    </h2>
    <p>By: {{ $post->author }} in <a href="/categories/{{ $post->category->slug }}" class="text-decoration-none">{{ $post->category->name }}</a></p>
    <p>{{ $post->excerpt }}</p>
    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more...</a>
</article>
@endforeach

@endsection