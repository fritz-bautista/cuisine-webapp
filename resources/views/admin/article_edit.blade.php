@extends('admin.main-admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/article_create.css') }}">
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

            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" value="{{ $article->title }}" required>
            </div>

            <div class="mb-3">
                <label>Author</label>
                <input type="text" name="author" class="form-control" value="{{ $article->author }}" required>
            </div>

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

            <div class="mb-3">
                <label>Published At</label>
                <input type="date" name="published_at" class="form-control"
                    value="{{ $article->published_at ? $article->published_at->format('Y-m-d') : '' }}">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control">{{ $article->description }}</textarea>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="draft" {{ $article->status === 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="published" {{ $article->status === 'published' ? 'selected' : '' }}>Published</option>
                    <option value="scheduled" {{ $article->status === 'scheduled' ? 'selected' : '' }}>Scheduled</option>
                </select>
            </div>

            <hr class="line-divider">

            <h4>Sections</h4>
            <div id="sections-list">
                @foreach ($article->sections as $index => $section)
                    <div class="section-item mb-4" data-index="{{ $index }}">
                        <div class="d-flex justify-content-between align-items-center">
                            <strong>Section <span class="section-number">{{ $index + 1 }}</span></strong>
                            <div>
                                <button type="button" class="btn btn-sm btn-outline-secondary move-up">↑</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary move-down">↓</button>
                            </div>
                        </div>
                        <input type="hidden" name="sections[{{ $index }}][id]" value="{{ $section->id }}">
                        <input type="hidden" name="sections[{{ $index }}][order]" value="{{ $index }}">
                        <input type="text" name="sections[{{ $index }}][heading]" class="form-control mb-2"
                            value="{{ $section->heading }}" placeholder="Heading" required>
                        <textarea name="sections[{{ $index }}][content]" class="form-control mb-2" placeholder="Content"
                            required>{{ $section->content }}</textarea>
                        <input type="text" name="sections[{{ $index }}][image_url]" class="form-control mb-2"
                            value="{{ $section->image_url }}" placeholder="Image URL">
                        <button type="button" class="btn3 btn-danger btn-sm" onclick="removeSection(this)">Delete</button>
                    </div>
                @endforeach
            </div>

            <button type="button" onclick="addSection()" class="btn2 btn-sm btn-secondary mb-4">+ Add Section</button>

            <hr class="line-divider">

            <div>
                <button type="submit" class="btn3 btn-primary">Update Article</button>
            </div>
        </form>
        <div>
            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline"
                onsubmit="return confirm('Are you sure you want to delete this article?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn4 btn-danger ms-2">Delete Article</button>
            </form>
        </div>
    </div>

    <script>
        let sectionIndex = {{ $article->sections->count() }};

        function addSection() {
            const html = `
                        <div class="section-item mb-4" data-index="${sectionIndex}">
                            <div class="d-flex justify-content-between align-items-center">
                                <strong>Section <span class="section-number">${sectionIndex + 1}</span></strong>
                                <div>
                                    <button type="button" class="btn btn-sm btn-outline-secondary move-up">↑</button>
                                    <button type="button" class="btn btn-sm btn-outline-secondary move-down">↓</button>
                                </div>
                            </div>
                            <input type="hidden" name="sections[${sectionIndex}][order]" value="${sectionIndex}">
                            <input type="text" name="sections[${sectionIndex}][heading]" class="form-control mb-2" placeholder="Heading" required>
                            <textarea name="sections[${sectionIndex}][content]" class="form-control mb-2" placeholder="Content" required></textarea>
                            <input type="text" name="sections[${sectionIndex}][image_url]" class="form-control mb-2" placeholder="Image URL">
                            <button type="button" class="btn3 btn-danger btn-sm" onclick="removeSection(this)">Delete</button>
                        </div>`;
            document.getElementById('sections-list').insertAdjacentHTML('beforeend', html);
            sectionIndex++;
            updateSectionOrder();
            updateMoveButtons();
        }

        function removeSection(button) {
            button.closest('.section-item').remove();
            updateSectionOrder();
            updateMoveButtons();
        }

        function updateSectionOrder() {
            const items = document.querySelectorAll('.section-item');
            items.forEach((item, index) => {
                item.setAttribute('data-index', index);
                item.querySelector('.section-number').textContent = index + 1;
                // Update all input/textarea names and order values
                item.querySelectorAll('input, textarea').forEach(input => {
                    input.name = input.name.replace(/sections\[\d+\]/, `sections[${index}]`);
                });
                const orderInput = item.querySelector('input[type="hidden"][name$="[order]"]');
                if (orderInput) orderInput.value = index;
            });
            sectionIndex = items.length;
        }

        function updateMoveButtons() {
            const items = document.querySelectorAll('.section-item');
            items.forEach((item, index) => {
                const upBtn = item.querySelector('.move-up');
                const downBtn = item.querySelector('.move-down');
                upBtn.disabled = index === 0;
                downBtn.disabled = index === items.length - 1;

                upBtn.onclick = () => {
                    if (index > 0) {
                        item.parentNode.insertBefore(item, items[index - 1]);
                        updateSectionOrder();
                        updateMoveButtons();
                    }
                };

                downBtn.onclick = () => {
                    if (index < items.length - 1) {
                        item.parentNode.insertBefore(items[index + 1], item);
                        updateSectionOrder();
                        updateMoveButtons();
                    }
                };
            });
        }

        document.addEventListener('DOMContentLoaded', updateMoveButtons);
    </script>
@endsection