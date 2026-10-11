@extends('main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('title')
    <title>Home</title>
@endsection

@section('content')

    <body>
        <div class="home-main-header inter">
            <img class="img-header" src="{{ asset(path: 'img/header/home_header.png') }}" alt="Banner Image">

            <div class="home-header-content">
                <h1>A Platform for Culinary Exploration and Industry Insight.</h1>
                <input type="text" class="home-email-text-holder" placeholder="Enter your email">
            </div>
        </div>

        <div class="home-featured-container inter">
            <div class="featured-description-container">
                <h1>Featured Articles</h2>
                    <p>Check out these awesome stories about their culinary innovations from different people around the
                        world.</p>
                    <button class="view-more-button flex items-center justify-center cursor-pointer">View More</button>
            </div>
            <div class="article-slider">
                @foreach (range(1, 5) as $i)
                    <div class="article-card hover:scale-105 trasition duration-300 ease-in-out hover:cursor-pointer">
                        <div class="article-card-body">
                            <span class="article-tag">Technology</span>
                            <h2 class="article-title">Article Title {{ $i }}</h2>
                            <p class="article-description">
                                This is a short preview of the article content. You can replace this with a real excerpt or
                                summary.
                            </p>
                        </div>
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

        <div class="trending-restaurants-container inter">
            <div class="flex flex-col text-left gap-10 m-20  justify-center">
                <h1 class="text-5xl text-white font-bold ">Trending Restaurants</h1>
                <p class="text-2xl text-white">Check out these awesome stories about their culinary innovations from different people around the world.
                </p>
                <button>View More</button>
            </div>
            <div class="flex w-full h-full">
                <div class="grid grid-cols-2 flex items-center justify-center w-full">
                    <div class="restaurant-card h-full">
                        <img src="https://picsum.photos/400/300?random=1" alt="Restaurant 1" class="object-cover " />
                    </div>
                    <div class="restaurant-card">
                        <img src="https://picsum.photos/400/300?random=2" alt="Restaurant 2" class="object-cover">
                    </div>
                    <div class="restaurant-card">
                        <img src="https://picsum.photos/400/300?random=3" alt="Restaurant 3" class="object-cover">
                    </div>
                    <div class="restaurant-card">
                        <img src="https://picsum.photos/400/300?random=4" alt="Restaurant 4" class="object-cover">
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
                =
            </div>
        </div>

        <div class="reviews-container">
            <div class="review-description-container">
                <h1>Create Reviews</h1>
                <p>Check out these awesome stories about their culinary innovations from different people around the world.
                </p>
            </div>
            <div class="review-slider">
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
            <div class="cuisine-grid-container">
                <div class="about-card">
                    <h2>CU</h2>
                    <p><strong>Culinary</strong> – Centered on the art, science, and culture of food and cooking.</p>
                </div>
                <div class="about-card">
                    <h2>I</h2>
                    <p><strong>Innovation</strong> – Embracing creativity and technology in culinary practices.</p>
                </div>
                <div class="about-card">
                    <h2>S</h2>
                    <p><strong>Studies</strong> – Fostering academic and practical knowledge in the food domain.</p>
                </div>
                <div class="about-card">
                    <h2>I</h2>
                    <p><strong>Industries</strong> – Connecting with sectors like hospitality, agrifood, and tech.</p>
                </div>
                <div class="about-card">
                    <h2>NE</h2>
                    <p><strong>Network</strong> – Building a collaborative community across the culinary field.</p>
                </div>
            </div>
        </div>
    </body>
@endsection

@section('footer')
    @include('footer')
@endsection
