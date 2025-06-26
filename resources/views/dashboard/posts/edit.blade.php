@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Post</h1>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/posts/{{ $post->slug }}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control @error('title')is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title) }}" required autofocus>
            @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label><small class="text-muted"> (auto-generated)</small>
            <input type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" name="slug" readonly>
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <div id="slug-feedback" class="form-text text-danger d-none">Gagal mengambil slug. Cek login atau koneksi.</div>
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select class="form-select" id="category" name="category_id">
                @foreach ($categories as $category)
                @if (old('category_id', $post->category_id) == $category->id)
                <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                @else
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Post Image</label>
            <input class="form-control" type="file" id="image" name="image">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            <input id="body" type="hidden" name="body" value="{{ old('body', $post->body) }}">
            <trix-editor input="body"></trix-editor>
            @error('body')
            <p class="text-danger" style="font-size: 14px;">{{ $message }}</p>
            @enderror
        </div>
        <button type="submit" class="btn btn-outline-primary">Update Post</button>
    </form>
</div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');
    const slugFeedback = document.getElementById('slug-feedback');
    let slugTimeout;

    function updateSlug() {
        if (title.value.trim() === '') {
            slug.value = '';
            slugFeedback.classList.add('d-none');
            return;
        }
        slug.value = '...';
        slugFeedback.classList.add('d-none');
        fetch('/dashboard/posts/checkSlug?title=' + encodeURIComponent(title.value))
            .then(response => {
                if (!response.ok) throw new Error('Network response was not ok');
                return response.json();
            })
            .then(data => {
                slug.value = data.slug;
                slugFeedback.classList.add('d-none');
                console.log('Slug response:', data);
            })
            .catch((err) => {
                slug.value = '';
                slugFeedback.classList.remove('d-none');
                console.error('Slug fetch error:', err);
            });
    }

    title.addEventListener('input', function() {
        clearTimeout(slugTimeout);
        slugTimeout = setTimeout(updateSlug, 300);
    });
    title.addEventListener('blur', updateSlug);

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    });
</script>

@endsection