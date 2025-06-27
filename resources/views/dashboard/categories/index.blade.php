@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Post Categories</h1>
</div>

<div class="table-responsive col-lg-8">
    <a href="/dashboard/categories/create" class="btn btn-outline-primary mb-3">Create new category</a>
    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show col-lg-8" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <table class="table table-striped table-sm align-middle">
        <thead class="table-light">
            <tr>
                <th scope="col">No</th>
                <th scope="col">Categories</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr style="white-space: nowrap;">
                <td>{{ $loop->iteration }}</td>
                <td class="text-break">{{ $category->name }}</td>
                <td>
                    <a href="/dashboard/categories/{{ $category->slug }}" class="btn btn-info btn-sm mb-1 mb-md-0"><i class="bi bi-eye"></i></a>
                    <a href="/dashboard/categories/{{ $category->slug }}/edit" class="btn btn-warning btn-sm mb-1 mb-md-0"><i class="bi bi-pencil-square"></i></a>
                    <form action="/dashboard/categories/{{ $category->slug }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this category?')"><i class="bi bi-trash"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection