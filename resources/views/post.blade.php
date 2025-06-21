@extends('layouts.main')
@section('content')

<article class="mb-5">
    <h2>{{ $post->title }}</h2>
    <p>By: {{ $post->author }} in <a href="/categories/{{ $post->category->slug }}">{{ $post->category->name }}</a></p>
    {!! $post->body !!}
</article>

<a href="/posts">Back to Posts</a>

@endsection