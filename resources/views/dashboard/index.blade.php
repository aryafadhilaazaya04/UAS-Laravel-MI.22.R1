@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome Back, {{ auth()->user()->name }}.</h1>
    <h1 class="h2 mx-2">All The Post <i class="bi bi-arrow-down"></i></h1>
</div>

<div class="table-responsive small">
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table table-striped table-sm align-middle">
        <thead class="table-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Titles</th>
                <th scope="col">Authors</th>
                <th scope="col">Categories</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr style="white-space: nowrap;">
                <td>{{ $loop->iteration }}</td>
                <td class="text-break">{{ $post->title }}</td>
                <td class="text-break">{{ $post->author }}</td>
                <td class="text-break">{{ $post->category->name }}</td>
                <td>
                    @if (!auth()->user()->is_admin)
                    <a href="/dashboard/show/{{ $post->slug }}" class="btn btn-info d-block btn-sm mb-1 mb-md-0"><i class="bi bi-eye"></i></a>
                    @endif
                    @can('admin-only')
                    <a href="/dashboard/show/{{ $post->slug }}" class="btn btn-info btn-sm mb-1 mb-md-0"><i class="bi bi-eye"></i></a>
                    <form action="/dashboard/posts/{{ $post->slug }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this post?')"><i class="bi bi-trash"></i></button>
                    </form>
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection