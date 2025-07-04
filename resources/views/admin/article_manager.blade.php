<!-- resources/views/admin/article_dashboard.blade.php -->
@extends('admin.main-admin')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/admin/article_dashboard.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@endsection

@section('admin-title', 'Article Dashboard')

@section('admin-content')
    <div class="container py-4">
        <h2>Article Dashboard Overview</h2>

        <div class="chart-row">
            <div class="chart-box1">
                <h4>Total Articles</h4>
                <canvas id="totalArticlesChart"></canvas>
            </div>
            <div class="chart-box2">
                <h4>Articles by Category</h4>
                <canvas id="categoryBarChart"></canvas>
            </div>
        </div>

        <div class="section mt-5">
            <h4>Draft Articles</h4>
            <div class="horizontal-slider">
                @if ($drafts->isEmpty())
                    <p>No draft articles available.</p>
                @else
                    @foreach ($drafts as $draft)
                        <a href="{{ route('articles.edit', ['id' => $draft->id]) }}" class="article-card-link">
                            <div class="article-card">
                                <span class="article-category">{{ $draft->category->name }}</span>
                                <h5>{{ $draft->title }}</h5>
                                <p>{{ Str::limit($draft->description, 100) }}</p>
                                <p><strong>By:</strong> {{ $draft->author }}</p>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>

        <div class="section mt-5">
            <h4>Published Articles</h4>
            <div class="vertical-slider">
                @if ($published->isEmpty())
                    <p>No published articles available.</p>
                @else
                    @foreach ($published as $article)
                        <a href="{{ route('articles.edit', ['id' => $article->id]) }}" class="article-card-link">
                            <div class="article-card">
                                <span class="article-category">{{ $article->category->name }}</span>
                                <h5>{{ $article->title }}</h5>
                                <p>{{ Str::limit($article->description, 100) }}</p>
                                <p><strong>By:</strong> {{ $article->author }}</p>
                            </div>
                        </a>
                    @endforeach
                @endif
            </div>
        </div>


        <script>
            const totalArticlesChart = new Chart(document.getElementById('totalArticlesChart'), {
                type: 'doughnut',
                data: {
                    labels: ['Total Articles'],
                    datasets: [{
                        data: [{{ $totalArticles }}],
                        backgroundColor: ['#36a2eb']
                    }]
                }
            });

            const categoryBarChart = new Chart(document.getElementById('categoryBarChart'), {
                type: 'bar',
                data: {
                    labels: {!! json_encode(array_keys($categoryCounts)) !!},
                    datasets: [{
                        label: 'Number of Articles',
                        data: {!! json_encode(array_values($categoryCounts)) !!},
                        backgroundColor: '#4caf50'
                    }]
                }
            });
        </script>
@endsection