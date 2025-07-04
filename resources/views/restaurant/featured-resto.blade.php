@extends('main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/featured-resto-style.css') }}">
@endsection

@section('title')
    <title>Restaurants</title>
@endsection

@section('content')

    <body>
        <div class="home-main-header">
            <img class="img-header" src="{{ asset('img/header/resto-header.png') }}" alt="Banner Image">
        </div>

        <div class="link-preview">
            <p>Main > Featured Restaurants</p>
        </div>
        <div class="explore-container">
            <div class="explore-description-container">
                <h1>Featured Restaurants</h1>
                <button class="view-more-button">View More</button>
            </div>
            <div class="resto-slider">
                @foreach (range(1, 5) as $i)
                    <a href="{{ route('restaurant.view', ['id' => $i]) }}" class="resto-card-link">
                        <div class="resto-card">
                            <div class="resto-card-body">
                                <!-- Image -->
                                <img src="https://picsum.photos/400/250?random={{ $i }}" alt="Restaurant Image"
                                    class="resto-image">

                                <!-- Title -->
                                <h2 class="resto-title">Restaurant {{ $i }}</h2>
                                <h1 class="resto-city">City {{ $i }}</h1>

                                <!-- Star Rating -->
                                <div class="resto-stars">
                                    @for ($s = 0; $s < 5; $s++)
                                        <span style="color: gold;">★</span>
                                    @endfor
                                </div>

                                <!-- Short Description -->
                                <p class="resto-description">
                                    A short summary of the restaurant. Describe its cuisine, ambiance, or unique dish.
                                </p>
                            </div>
                        </div>
                    </a>

                @endforeach
            </div>
        </div>

        <div class="explore-container">
            <div class="explore-description-container">
                <h1>Top Visited Restaurants</h1>
                <button class="view-more-button">View More</button>
            </div>
            <div class="resto-slider">
                @foreach (range(1, 5) as $i)
                    <a href="{{ route('restaurant.view', ['id' => $i]) }}" class="resto-card-link">
                        <div class="resto-card">
                            <div class="resto-card-body">
                                <!-- Image -->
                                <img src="https://picsum.photos/400/250?random={{ $i }}" alt="Restaurant Image"
                                    class="resto-image">

                                <!-- Title -->
                                <h2 class="resto-title">Restaurant {{ $i }}</h2>
                                <h1 class="resto-city">City {{ $i }}</h1>

                                <!-- Star Rating -->
                                <div class="resto-stars">
                                    @for ($s = 0; $s < 5; $s++)
                                        <span style="color: gold;">★</span>
                                    @endfor
                                </div>

                                <!-- Short Description -->
                                <p class="resto-description">
                                    A short summary of the restaurant. Describe its cuisine, ambiance, or unique dish.
                                </p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </body>

@endsection

@section('footer')
    @include('footer')
@endsection