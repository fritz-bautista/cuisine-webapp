@extends('main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/resto-review.css') }}">
@endsection

@section('title')
    <title>Create a Review</title>
@endsection

@section('content')

    <body>
        <div class="web-container">
            <div class="review-container">
                <!-- Title and Description -->
                <div class="description-container">
                    <h1>Write your experience!</h1>
                    <p>We'd love to hear your thoughts. Share your honest review about your visit.</p>
                </div>

                <!-- Review Form -->
                <form action="" method="POST" class="review-form">
                    @csrf

                    <!-- Name -->
                    <div class="form-group">
                        <label for="name">Your Name</label>
                        <input type="text" name="name" id="name" required placeholder="Enter your name">
                    </div>

                    <!-- Email -->
                    <div class="form-group">
                        <label for="email">Your Email</label>
                        <input type="email" name="email" id="email" required placeholder="Enter your email">
                    </div>

                    <!-- Rating -->
                    <div class="form-group">
                        <label for="rating">Rating</label>
                        <select name="rating" id="rating" required>
                            <option value="" disabled selected>Select rating</option>
                            <option value="5">★★★★★ - Excellent</option>
                            <option value="4">★★★★☆ - Good</option>
                            <option value="3">★★★☆☆ - Average</option>
                            <option value="2">★★☆☆☆ - Poor</option>
                            <option value="1">★☆☆☆☆ - Terrible</option>
                        </select>
                    </div>

                    <!-- Message -->
                    <div class="form-group">
                        <label for="message">Review</label>
                        <textarea name="message" id="message" rows="5" placeholder="Share your experience..."
                            required></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div class="form-group">
                        <button type="submit" class="submit-button">Submit Review</button>
                    </div>
                </form>
            </div>
        </div>
    </body>

@endsection

@section('footer')
    @include('footer')
@endsection