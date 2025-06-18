@extends('main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/arti-blogs-style.css') }}">
@endsection

@section('content')
    <script>
        function loadMoreArticles() {
            const hiddenCards = document.querySelectorAll('.article-card.hidden');
            hiddenCards.forEach(card => card.classList.remove('hidden'));
            document.querySelector('.load-more-btn').style.display = 'none';
        }
    </script>

    <body>
        <div class="home-main-header">
            <img class="img-header" src="{{ asset('img/header/arti-blog-header.png') }}" alt="Banner Image">

            <div class="home-header-content">
                <h1>A Platform for Culinary Exploration and Industry Insight.</h1>
            </div>
        </div>

        <div class="link-preview">
            <p>Main > Publish > Article and Blogs</p>
        </div>

        <div class="article-container">
            <div class="search-container">
                <h1>Articles & Blogs</h1>
                <input type="text" placeholder="Title, Author, ">
            </div>
            <div class="filter-container">
                <a>Culinary Research & Innovation</a>
                <a>Chef Stories & Interviews</a>
                <a>Culture & Cuisine</a>
                <a>Sustainability & Food Ethics</a>
                <a>Food Business & Startups</a>
                <a>Tips, Recipes & Techniques</a>
                <a>Reviews & Features</a>
                <a>Student Research & Contributions</a>
            </div>
            <hr class="line-divider">
            <div class="sub-topic-picker">
                <a>Food Technology</a>
                <a>Ingredient Innovation</a>
                <a>Culinary Science</a>
                <a>Nutrition & Health Research</a>
            </div>
            <hr class="line-divider">
            <div class="article-section">
                <div class="article-card-container">
                    @foreach (range(1, 12) as $i)
                        <div class="article-card">
                            <span class="article-category">Culinary Research</span>
                            <img src="https://picsum.photos/400/200?random={{ $i }}" alt="Article Image">
                            <h2 class="article-title">Innovative Approaches to Local Cuisine {{ $i }}</h2>
                            <p class="article-description">Discover new methods and approaches being used in modern kitchens
                                across the globe...</p>
                            <div class="article-footer">
                                <span class="author">John Doe</span>
                                <span class="date">June 2025</span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="load-more-container">
                    <button class="load-more-btn">Load More</button>
                </div>
            </div>
        </div>
        </div>
    </body>
@endsection