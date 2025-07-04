@extends('admin.main-admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/article_manager.css') }}">
@endsection

@section('Manage Articles')
    <title>Edit Article</title>
@endsection

@section('admin-title', 'Edit Article')

@section('admin-content')
    <div class="container py-4">
        <h2>Edit Article</h2>

        <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
            </div>

            {{-- Author --}}
            <div class="mb-3">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="{{ $article->author }}" required>
            </div>

            {{-- Category --}}
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $article->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Publish Date --}}
            <div class="mb-3">
                <label>Published At</label>
                <input type="date" name="published_at" class="form-control"
                    value="{{ $article->published_at ? $article->published_at->format('Y-m-d') : '' }}">
            </div>

            {{-- Description --}}
            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $article->description }}</textarea>
            </div>

            {{-- Status --}}
            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="draft" {{ $article->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $article->status === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="scheduled" {{ $article->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                </select>
            </div>

            {{-- Sections --}}
            <h4>Sections</h4>
            <div id="sections-list">
                @foreach ($article->sections as $index => $section)
                    <div class="section-item mb-4" data-index="{{ $index }}">
                        <input type="hidden" name="sections[{{ $index }}][id]" value="{{ $section->id }}">
                        <input type="hidden" name="sections[{{ $index }}][order]" value="{{ $index }}">
                        <input type="text" name="sections[{{ $index }}][heading]" class="form-control mb-2"
                            value="{{ $section->heading }}" placeholder="Heading" required>
                        <textarea name="sections[{{ $index }}][content]" class="form-control mb-2"
                            placeholder="Content" required>{{ $section->content }}</textarea>
                        <input type="text" name="sections[{{ $index }}][image_url]" class="form-control mb-2"
                            value="{{ $section->image_url }}" placeholder="Image URL">
                        <button type="button" class="btn btn-danger btn-sm" onclick="removeSection(this)">Delete</button>
                    </div>
                @endforeach
            </div>

            <button type="button" onclick="addSection()" class="btn btn-sm btn-secondary mb-4">+ Add Section</button>

            <div>
                <button type="submit" class="btn btn-primary">Update Article</button>
            </div>
        </form>
    </div>

    <script>
        let sectionIndex = {{ $article->sections->count() }};

        function addSection() {
            const html = `
                <div class="section-item mb-4" data-index="\${sectionIndex}">
                    <input type="hidden" name="sections[\${sectionIndex}][order]" value="\${sectionIndex}">
                    <input type="text" name="sections[\${sectionIndex}][heading]" class="form-control mb-2" placeholder="Heading" required>
                    <textarea name="sections[\${sectionIndex}][content]" class="form-control mb-2" placeholder="Content" required></textarea>
                    <input type="text" name="sections[\${sectionIndex}][image_url]" class="form-control mb-2" placeholder="Image URL">
                    <button type="button" class="btn btn-danger btn-sm" onclick="removeSection(this)">Delete</button>
                </div>`;
            document.getElementById('sections-list').insertAdjacentHTML('beforeend', html);
            sectionIndex++;
        }

        function removeSection(button) {
            button.closest('.section-item').remove();
            updateOrderInputs();
        }

        function updateOrderInputs() {
            const items = document.querySelectorAll('.section-item');
            items.forEach((item, index) => {
                const inputs = item.querySelectorAll('input, textarea');
                item.setAttribute('data-index', index);
                inputs.forEach(input => {
                    input.name = input.name.replace(/\d+/, index);
                });
                item.querySelector('input[type="hidden"][name$="[order]"]').value = index;
            });
            sectionIndex = items.length;
        }
    </script>
@endsection
