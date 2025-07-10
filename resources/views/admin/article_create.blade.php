@extends('admin.main-admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/article_create.css') }}">
@endsection

@section('Manage Articles')
    <title>Submit an Entry</title>
@endsection

@section('admin-title', 'Create Articles')

@section('admin-content')
    <div class="container">
        <h2>Create New Article</h2>

        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- CSRF token protection --}}

            <div class="title-section">
                <label>Title</label>
                <input type="text" name="title" class="form-control" placeholder="Enter your title" required>
            </div>

            <div class="author-section">
                <label>Author</label>
                <input type="text" name="author" class="form-control" placeholder="Who is the author?" required>
            </div>

            <div class="category-section">
                <label>Category</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="date-section">
                <label>Published At</label>
                <input type="date" name="published_at" class="form-control">
            </div>

            <div class="description-section">
                <label>Description</label>
                <textarea name="description" class="form-control"
                    placeholder="Enter a short description for your article"></textarea>
            </div>

            <div class="status-section">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                    <option value="scheduled">Scheduled</option>
                </select>
            </div>

            <hr class="line-divider">

            <div id="sections-list">
                <div class="section-item" data-index="0">
                    <div class="d-flex justify-content-between align-items-center">
                        <strong>Section <span class="section-number">1</span></strong>
                        <div>
                            <button type="button" class="btn btn-sm btn-outline-secondary move-up">↑</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary move-down">↓</button>
                        </div>
                    </div>
                    <input type="text" name="sections[0][heading]" class="form-control mb-2" placeholder="Heading">
                    <textarea name="sections[0][content]" class="form-control mb-2" placeholder="Content"></textarea>
                    <input type="text" name="sections[0][image_url]" class="form-control mb-2" placeholder="Image URL">
                    <button type="button" class="btn3 btn-danger btn-sm" onclick="removeSection(this)">Delete</button>
                </div>
            </div>

            <button type="button" onclick="addSection()" class="btn2 btn-sm btn-secondary">+ Add Content Section</button>

            <div class="mt-4">
                <button type="submit" class="btn3 btn-primary">Submit</button>
            </div>
        </form>
    </div>

    <script>
        let sectionIndex = 1;

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
                    <input type="text" name="sections[${sectionIndex}][heading]" class="form-control mb-2" placeholder="Heading">
                    <textarea name="sections[${sectionIndex}][content]" class="form-control mb-2" placeholder="Content"></textarea>
                    <input type="text" name="sections[${sectionIndex}][image_url]" class="form-control mb-2" placeholder="Image URL">
                    <button type="button" class="btn3 btn-danger btn-sm" onclick="removeSection(this)">Delete</button>
                </div>`;
            document.getElementById('sections-list').insertAdjacentHTML('beforeend', html);
            sectionIndex++;
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

        document.addEventListener('DOMContentLoaded', () => {
            updateMoveButtons();
        });
    </script>
@endsection