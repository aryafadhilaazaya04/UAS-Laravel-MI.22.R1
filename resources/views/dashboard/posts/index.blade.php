@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">My Posts</h1>
</div>

<div class="table-responsive small">
    <table class="table table-striped table-sm align-middle">
        <thead class="table-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Titles</th>
                <th scope="col">Categories</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td class="text-break">{{ $post->title }}</td>
                <td class="text-break">{{ $post->category->name }}</td>
                <td>
                    <a href="/dashboard/posts/{{ $post->id }}" class="btn btn-info btn-sm mb-1 mb-md-0"><i class="bi bi-eye"></i></a>
                    <a href="#" class="btn btn-warning btn-sm mb-1 mb-md-0"><i class="bi bi-pencil-square"></i></a>
                    <form action="#" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection