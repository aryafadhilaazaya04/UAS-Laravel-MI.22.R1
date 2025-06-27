@extends('dashboard.layouts.main')
@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Category</h1>
</div>
<div class="col-lg-8">
    <form method="POST" action="/dashboard/categories" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name of New Category</label>
            <input type="text" class="form-control @error('name')is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required autofocus>
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label><small class="text-muted"> (Auto-Generated - Wait Until the Slug is Generated)</small>
            <input type="text" class="form-control @error('slug')is-invalid @enderror" id="slug" name="slug" readonly>
            @error('slug')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            <div id="slug-feedback" class="form-text text-danger d-none">Gagal mengambil slug. Cek login atau koneksi.</div>
        </div>
        <button type="submit" class="btn btn-outline-primary">Create Category</button>
    </form>
</div>

<script>
    const title = document.querySelector('#name');
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

    function previewImage() {
        const image = document.querySelector('#image');
        const imagePreview = document.querySelector('#image-preview');
        const previewLabel = document.getElementById('preview-label');
        if (image.files && image.files[0]) {
            const file = image.files[0];
            if (!file.type.startsWith('image/')) {
                imagePreview.style.display = 'none';
                previewLabel.style.display = 'none';
                return;
            }
            const oFReader = new FileReader();
            oFReader.readAsDataURL(file);
            oFReader.onload = function(oFREvent) {
                imagePreview.src = oFREvent.target.result;
                imagePreview.style.display = 'block';
                previewLabel.style.display = 'inline';
            };
        } else {
            imagePreview.style.display = 'none';
            previewLabel.style.display = 'none';
        }
    }
</script>

@endsection