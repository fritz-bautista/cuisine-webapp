@extends('main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/arti-view.css') }}">
@endsection

@section('content')

    <div class="home-main-header">
        <img class="img-header" src="{{ asset('img/header/article-header.png') }}" alt="Banner Image">
    </div>

    <div class="link-preview">
        <p>Main > Article & Blogs > {{ $article->title }}</p>
    </div>

    <div class="Article-Container">
        <div class="article-header">
            <h1>{{ $article->title }}</h1>

            <div class="author-container">
                <p><strong>By:</strong> {{ $article->author }}</p>
                <p><strong>Published:</strong> {{ $article->published_at?->format('F d, Y') }}</p>
            </div>

            @if ($article->sections->count())
                <div class="table-of-contents">
                    <h3>Table of Contents</h3>
                    <ul>
                        @foreach ($article->sections->sortBy('order') as $index => $section)
                            <li>
                                <a href="#section-{{ $index }}">
                                    {{ $index + 1 }}. {{ $section->heading }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>

        <hr class="line-divider">

        <div class="content-container">
            @foreach ($article->sections->sortBy('order') as $index => $section)
                <section id="section-{{ $index }}">
                    <h2>{{ $section->heading }}</h2>

                    @if ($section->image_url)
                        <img src="{{ $section->image_url }}" alt="{{ $section->heading }}" style="width: 100%; margin: 2vh 0;">
                    @endif

                    <p>{{ $section->content }}</p>
                </section>
            @endforeach
        </div>
    </div>

@endsection

@section('footer')
    @include('footer')
@endsection