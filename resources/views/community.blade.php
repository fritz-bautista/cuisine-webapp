@extends('main')


@section('styles')
    <link rel="stylesheet" href="{{ asset('css/community.css') }}">
@endsection

@section('title')
    <title>Community</title>
@endsection

@section('content')

    <body>
        <div class="home-main-header">
            <img class="img-header" src="{{ asset(path: 'img/header/community-header.png') }}" alt="Banner Image">
            <div class="home-header-content">
                <h1>Discover What’s Happening in Our Food Community.</h1>
                <input type="text" class="home-email-text-holder" placeholder="Enter your email">
            </div>
        </div>
        <div class="announcement-container">
            <h1>Community Events</h1>
            <div class="events-container">
                <!-- Event Card 1 -->
                <div class="event-card">
                    <img src="https://picsum.photos/400/200?random=10" alt="Event Image">
                    <div class="event-details">
                        <h2 class="event-title">Culinary Innovation Expo</h2>
                        <p class="event-description">Join leading chefs and researchers in a day of food tech, demos, and
                            innovation exhibits.</p>
                        <p class="event-date">📅 July 15, 2025</p>
                    </div>
                </div>

                <!-- Event Card 2 -->
                <div class="event-card">
                    <img src="https://picsum.photos/400/200?random=11" alt="Event Image">
                    <div class="event-details">
                        <h2 class="event-title">Sustainable Food Forum</h2>
                        <p class="event-description">Explore sustainable food practices and ethics with international
                            experts.</p>
                        <p class="event-date">📅 August 5, 2025</p>
                    </div>
                </div>
            </div>
        </div>

    </body>
@endsection

@section('footer')
    @include('footer')
@endsection