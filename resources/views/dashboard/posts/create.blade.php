@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Post</h1>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/posts">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" id="title" name="title" autofocus>
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" name="slug" disabled readonly>
            <div id="slug-feedback" class="form-text text-danger d-none">Gagal mengambil slug. Cek login atau koneksi.</div>
        </div>
        <button type="submit" class="btn btn-outline-primary">Create Post</button>
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
</script>

@endsection