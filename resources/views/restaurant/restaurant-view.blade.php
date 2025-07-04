@extends('main')

@section('styles')
    <link rel="stylesheet" href="{{ asset(path: 'css/resto-view-style.css') }}">
@endsection

@section('title')
    <title>Restaurant Name</title>
@endsection

@section('content')

    <body>
        <div class="restaurant-view-container">
            <div class="container-fill">
                <div class="left-section">
                    <!-- Title & Location -->
                    <div class="title-location-container">
                        <h1>La Cocina de Maria</h1>
                        <p>📍 Cebu City, Philippines</p>
                    </div>

                    <!-- Photo Album -->
                    <div class="album-container">
                        <h2>Photo Gallery</h2>
                        <div class="photo-grid">
                            <img src="https://source.unsplash.com/400x300/?restaurant,1" alt="Restaurant Interior">
                            <img src="https://source.unsplash.com/400x300/?restaurant,2" alt="Dish 1">
                            <img src="https://source.unsplash.com/400x300/?restaurant,3" alt="Dish 2">
                            <img src="https://source.unsplash.com/400x300/?restaurant,4" alt="Outdoor Seating">
                        </div>
                    </div>

                    <!-- Reviews -->
                    <div class="reviews-container">
                        <h2>Customer Reviews</h2>
                        <div class="review-card">
                            <strong>John D.</strong>
                            <p class="rating">⭐⭐⭐⭐⭐</p>
                            <p>"The seafood paella was amazing! Authentic and rich in flavor. Will definitely return."</p>
                        </div>
                        <div class="review-card">
                            <strong>Ana R.</strong>
                            <p class="rating">⭐⭐⭐⭐</p>
                            <p>"Great ambiance and lovely staff. The desserts were the highlight of our visit!"</p>
                        </div>
                        <a href="{{ route('create.review') }}" class="review-button">Make a Review</a>
                    </div>
                </div>

                <div class="right-section">
                    <!-- Link Sharing -->
                    <div class="link-share-container">
                        <h3>Share this place</h3>
                        <button onclick="navigator.clipboard.writeText(window.location.href)">Copy Link</button>
                    </div>

                    <!-- Google Map -->
                    <div class="maps-container">
                        <h3>Find Us</h3>
                        <iframe src="https://maps.google.com/maps?q=Cebu%20City&t=&z=13&ie=UTF8&iwloc=&output=embed"
                            width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy">
                        </iframe>
                    </div>

                    <!-- Description -->
                    <div class="description-container">
                        <h3>Details</h3>
                        <p><strong>Address:</strong> 123 Food Street, Cebu City, PH</p>
                        <p><strong>Schedule:</strong> Mon–Sun: 10AM – 10PM</p>
                        <p><strong>Facebook:</strong> <a href="https://facebook.com/lacocinademaria" target="_blank">La
                                Cocina
                                de
                                Maria</a></p>
                        <p><strong>Instagram:</strong> <a href="https://instagram.com/lacocinademaria"
                                target="_blank">@lacocinademaria</a></p>
                    </div>

                    <!-- Nearby Restaurants -->
                    <div class="nearby-container">
                        <h3>Nearby Restaurants</h3>
                        <ul>
                            <li><a href="#">Casa Manila Grill</a></li>
                            <li><a href="#">The Buko Bar</a></li>
                            <li><a href="#">Nipa Hut Café</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('footer')
    @include('footer')
@endsection