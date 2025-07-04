@extends('admin.main-admin')

{{-- Link to custom CSS file --}}
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/article_manager.css') }}">
@endsection

{{-- Set the page title --}}
@section('Manage Articles')
    <title>Submit an Entry</title>
@endsection

{{-- Displayed title in admin panel --}}
@section('admin-title', 'Create Articles')

{{-- Main content section --}}
@section('admin-content')
    <div class="container py-4">
        <h2>Create New Article</h2>

        {{-- Article form --}}
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf {{-- CSRF token protection --}}

            {{-- Title input --}}
            <div class="mb-3">
                <label>Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            {{-- Author input --}}
            <div class="mb-3">
                <label>Author</label>
                <input type="text" name="author" class="form-control" required>
            </div>

            {{-- Category selector --}}
            <div class="mb-3">
                <label>Category</label>
                <select name="category_id" class="form-control" required>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Optional publish date --}}
            <div class="mb-3">
                <label>Published At</label>
                <input type="date" name="published_at" class="form-control">
            </div>

            <div class="mb-3">
                <label>Description</label>
                <textarea name="description" class="form-control"></textarea>
            </div>

            <div class="mb-3">
                <label>Status</label>
                <select name="status" class="form-control">
                    <option value="draft">Draft</option>
                    <option value="published">Published</option>
                    <option value="scheduled">Scheduled</option>
                </select>
            </div>

            {{-- Article Sections --}}
            <h4>Sections</h4>
            <div id="sections-list">
                {{-- First default section --}}
                <div class="section-item mb-4">
                    <input type="text" name="sections[0][heading]" class="form-control mb-2" placeholder="Heading">
                    <textarea name="sections[0][content]" class="form-control mb-2" placeholder="Content"></textarea>
                    <input type="text" name="sections[0][image_url]" class="form-control mb-2" placeholder="Image URL">
                </div>
            </div>

            {{-- Button to add more sections dynamically --}}
            <button type="button" onclick="addSection()" class="btn btn-sm btn-secondary">+ Add Content Section</button>

            {{-- Submit button --}}
            <div class="mt-4">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>

    {{-- JavaScript for dynamically adding section fields --}}
    <script>
        let sectionIndex = 1;

        function addSection() {
            const html = `
                    <div class="section-item mb-4">
                        <input type="text" name="sections[${sectionIndex}][heading]" class="form-control mb-2" placeholder="Heading">
                        <textarea name="sections[${sectionIndex}][content]" class="form-control mb-2" placeholder="Content"></textarea>
                        <input type="text" name="sections[${sectionIndex}][image_url]" class="form-control mb-2" placeholder="Image URL">
                    </div>`;
            document.getElementById('sections-list').insertAdjacentHTML('beforeend', html);
            sectionIndex++;
        }
    </script>
@endsection