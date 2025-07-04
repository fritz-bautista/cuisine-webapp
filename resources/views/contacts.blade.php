@extends('main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/submit-style.css') }}">
@endsection

@section('title')
    <title>Submit an Entry</title>
@endsection

@section('content')

    <body>
        <div class="web-container">
            <div class="submit-container">
                <h1>Submit Your Article</h1>
                <p>Share your insights, stories, or research with the community.</p>

                <form class="submit-form" method="POST" action="" enctype="multipart/form-data">
                    @csrf

                    <!-- Title -->
                    <label for="title">Article Title</label>
                    <input type="text" id="title" name="title" placeholder="Enter article title" required>

                    <!-- Category -->
                    <label for="category">Category</label>
                    <select id="category" name="category" required>
                        <option value="">-- Select Category --</option>
                        <option value="Culinary Research & Innovation">Culinary Research & Innovation</option>
                        <option value="Chef Stories & Interviews">Chef Stories & Interviews</option>
                        <option value="Culture & Cuisine">Culture & Cuisine</option>
                        <option value="Sustainability & Food Ethics">Sustainability & Food Ethics</option>
                        <option value="Food Business & Startups">Food Business & Startups</option>
                        <option value="Tips, Recipes & Techniques">Tips, Recipes & Techniques</option>
                        <option value="Reviews & Features">Reviews & Features</option>
                        <option value="Student Research & Contributions">Student Research & Contributions</option>
                    </select>

                    <!-- Author -->
                    <label for="author">Author Name</label>
                    <input type="text" id="author" name="author" placeholder="Your full name" required>

                    <!-- Image Upload -->
                    <label for="image">Featured Image</label>
                    <input type="file" id="image" name="image" accept="image/*">

                    <!-- Mockup File Upload -->
                    <label for="mockup">Attach Mockup / Supplementary File</label>
                    <input type="file" id="mockup" name="mockup" accept=".pdf,.doc,.docx,.ppt,.pptx,.zip">
                    <small style="color: #777; font-size: 1.5vh;">Accepted formats: PDF, Word, PowerPoint, ZIP (max
                        10MB)</small>

                    <!-- Content -->
                    <label for="content">Article Content</label>
                    <textarea id="content" name="content" rows="10" placeholder="Write your article here..."
                        required></textarea>

                    <!-- Submit -->
                    <button type="submit">Submit Article</button>
                </form>

            </div>
        </div>
    </body>

@endsection

@section('footer')
    @include('footer')
@endsection