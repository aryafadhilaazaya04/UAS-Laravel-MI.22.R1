@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome back, {{ auth()->user()->name }}.</h1><h1 class="h2 mx-2">All The Post <i class="bi bi-arrow-down"></i></h1>
</div>

<div class="table-responsive small">
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
                    <a href="/dashboard/show/{{ $post->slug }}" class="btn btn-info btn-sm d-block mb-1 mb-md-0"><i class="bi bi-eye"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection