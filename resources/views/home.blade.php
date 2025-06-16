@extends('main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
<body>
    <div class="home-main-header">
        <img class="img-header" src="{{ asset('img/header/home_header.png') }}" alt="Banner Image">
        <h1>A Platform for Culinary Exploration 
            and Industry Insight.</h1>
        <input type="text" class="home-email-text-holder">
    </div>

    <div class="home-featured-container">
        <div class="featured-description-container">
            <h1>Featured Stories</h2>
            <p>Check out these awesome stories about their culinary innovations from different people around the world.</p>
            <button class="view-more-button">View More</button>
        </div>
        <div class="article-slider">
            @foreach (range(1, 5) as $i)
                <div class="article-card">
                    <div class="article-card-body">
                        <!-- Tag -->
                        <span class="article-tag">Technology</span>

                        <!-- Title -->
                        <h2 class="article-title">Article Title {{ $i }}</h2>

                        <!-- Short Description -->
                        <p class="article-description">
                            This is a short preview of the article content. You can replace this with a real excerpt or summary.
                        </p>
                    </div>

                    <!-- Author Section -->
                    <div class="article-author">
                        <img src="https://i.pravatar.cc/40?img={{ $i }}" alt="Author" class="author-image">
                        <div class="author-info">
                            <p class="author-name">Author {{ $i }}</p>
                            <p class="publish-date">June {{ 10 + $i }}, 2025</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="trending-restaurants-container">
        <div class="trending-description-container">
            <h1>Trending Restaurants</h1>
            <p>Check out these awesome stories about their culinary innovations from different people around the world.</p>
            <button>View More</button>
        </div>
        <div class="restaurant-showcase">
            <div class="restaurant-grid">
                <div class="restaurant-card">
                    <img src="https://picsum.photos/400/300?random=1" alt="Restaurant 1">
                </div>
                <div class="restaurant-card">
                    <img src="https://picsum.photos/400/300?random=2" alt="Restaurant 2">
                </div>
                <div class="restaurant-card">
                    <img src="https://picsum.photos/400/300?random=3" alt="Restaurant 3">
                </div>
                <div class="restaurant-card">
                    <img src="https://picsum.photos/400/300?random=4" alt="Restaurant 4">
                </div>
            </div>
        </div>
    </div>

    <div class="trending-cuisines-container">
        <div class="trending-cuisines-slider">
            <h1>Trending Cuisines</h1>
            <div class="slider-wrapper">
                @for ($i = 1; $i <= 8; $i++)
                    <div class="cuisine-card">
                        <img src="https://picsum.photos/200/150?random={{ $i }}" alt="Cuisine {{ $i }}">
                        <p class="cuisine-title">Cuisine {{ $i }}</p>
                    </div>
                @endfor
            </div>
=        </div>
    </div>

    <div class="reviews-container">
        <div class="review-description-container">
            <h1>Create Reviews</h1>
            <p>Check out these awesome stories about their culinary innovations from different people around the world.</p>
        </div>
        <div class="review-slider">
            <h2>Recent Reviews</h2>
            <div class="slider-wrapper">
                @for ($i = 1; $i <= 6; $i++)
                    <div class="review-card">
                        <div class="review-header">
                            <strong>Restaurant {{ $i }}</strong>
                            <span class="location">📍 City {{ $i }}</span>
                        </div>

                        <div class="rating">
                            ⭐⭐⭐⭐⭐
                        </div>

                        <div class="review-comment">
                            “Great food and amazing ambiance. Would definitely visit again!”
                        </div>

                        <div class="reviewer">
                            👤 user_{{ $i }}
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="home-about-container">
        <div class="about-cards">
        </div>
    </div>
</body>
@endsection