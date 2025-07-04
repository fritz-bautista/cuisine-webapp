@extends('main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/arti-blogs-style.css') }}">
@endsection

@section('title')
    <title>Article & Blogs</title>
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

            {{-- Removed sub-topic picker --}}

            <div class="article-section">
                <div class="article-card-container">
                    @forelse ($articles as $article)
                        <a href="{{ route('articles.show', ['id' => $article->id]) }}" class="article-card-link">
                            <div class="article-card">
                                <span class="article-category">{{ $article->category->name ?? 'Uncategorized' }}</span>
                                <img src="{{ $article->sections->first()->image_url ?? 'https://via.placeholder.com/400x200' }}" alt="Article Image">
                                <h2 class="article-title">{{ $article->title }}</h2>
                                <p class="article-description">
                                    {{ Str::limit($article->sections->first()->content ?? 'No preview available.', 100) }}
                                </p>
                                <div class="article-footer">
                                    <span class="author">{{ $article->author }}</span>
                                    <span class="date">{{ \Carbon\Carbon::parse($article->published_at)->format('F Y') }}</span>
                                </div>
                            </div>
                        </a>
                    @empty
                        <p>No articles found.</p>
                    @endforelse
                </div>

                @if ($articles->count() > 6)
                    <div class="load-more-container">
                        <button class="load-more-btn" onclick="loadMoreArticles()">Load More</button>
                    </div>
                @endif
            </div>
        </div>
    </body>
@endsection

@section('footer')
    @include('footer')
@endsection
