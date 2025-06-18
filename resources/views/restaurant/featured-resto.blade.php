@extends('main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/featured-resto-style.css') }}">
@endsection

@section('content')
<body>
    <div class="home-main-header">
        <img class="img-header" src="{{ asset('img/header/resto-header.png') }}" alt="Banner Image">
    </div>

    <div class="featured-restos-container">

    </div>
</body>

@endsection