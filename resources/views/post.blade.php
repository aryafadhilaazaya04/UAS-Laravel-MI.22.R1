@extends('layouts.main')
@section('content')

<article class="mb-5">
    <h2>{{ $post['title'] }}</h2>
    <h5>By: {{ $post['author'] }}</h5>
    <p>{{ $post['body'] }}</p>
</article>

<a href="/posts">Back to Posts</a>

@endsection