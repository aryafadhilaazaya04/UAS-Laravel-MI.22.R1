@extends('layouts.main')
@section('content')

<h1 class="mb-4">Post Category: {{ $category }}</h1>
@foreach ($posts as $post)
<article class="mb-3 border-bottom pb-3">
    <h2>
        <a href="/posts/{{ $post->slug }}" class="text-decoration-none">{{ $post->title }}</a>
    </h2>
    <h5>By: {{ $post->author }}</h5>
    <p>{{ $post->excerpt }}</p>
    <a href="/posts/{{ $post->slug }}" class="text-decoration-none">Read more...</a>
</article>
@endforeach

@endsection