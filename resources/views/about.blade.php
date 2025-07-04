@extends('main')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/about-style.css') }}">
@endsection

@section('title')
    <title>About</title>
@endsection

@section('content')

    <body>
        <div class="home-main-header">
            <img class="img-header" src="{{ asset(path: 'img/header/about-header.png') }}" alt="Banner Image">
            <div class="home-header-content">
                <h1>Bringing Culinary Knowledge and Culture to the Table.</h1>
            </div>
        </div>
        <div class="introduction-container">
            <img src="{{ asset(path: 'img/Logo-2.png') }}">
            <p>Culinary Innovation Studies & Industries Network is a platform designed to bridge the gap between culinary
                arts, food science, and industry practice. We empower students, professionals, and food lovers to share
                insights, stories, and research that shape the future of food.</p>
        </div>
        <hr class="line-divider">
        <div class="purpose-container">
            <h1>Our Purpose</h1>
            <div class="purpose-grid">
                <div class="purpose-card">
                    <h3>Connect</h3>
                    <p>Bring together culinary students, professionals, and enthusiasts in one platform.</p>
                </div>
                <div class="purpose-card">
                    <h3>Unite</h3>
                    <p>Foster collaboration across culinary institutions, industries, and communities.</p>
                </div>
                <div class="purpose-card">
                    <h3>Innovate</h3>
                    <p>Encourage creativity in food science, technology, and culinary arts.</p>
                </div>
                <div class="purpose-card">
                    <h3>Support</h3>
                    <p>Provide resources, exposure, and opportunities for aspiring culinary talents.</p>
                </div>
                <div class="purpose-card">
                    <h3>Explore</h3>
                    <p>Showcase global culinary cultures, trends, and educational insights.</p>
                </div>
            </div>
        </div>
        <div class="features-container">
            <div class="article-feature">
                <div class="img-container">
                    <button class="prev-btn">&#10094;</button>
                    <div class="slider">
                        <img id="prev-thumb" class="thumb">
                        <img id="main-img" class="main-img">
                        <img id="next-thumb" class="thumb">
                    </div>
                    <button class="next-btn">&#10095;</button>
                </div>
                <div class="description-container">
                    <h1 id="feature-title">Title</h1>
                    <p id="feature-description">Description</p>
                </div>
            </div>
        </div>
        <div class="target-audience-container">
            <h2>Who is CUISINE for?</h2>
            <p>Our platform caters to a diverse audience with a shared passion for culinary growth and cultural exploration:
            </p>
            <div class="audience-grid">
                <div class="audience-card">
                    <img src="{{ asset('img/audience-imgs/chef.png') }}" alt="Chefs">
                    <h3>Chefs & Culinary Experts</h3>
                    <p>Showcase your work, share recipes, and connect with fellow professionals in the culinary world.</p>
                </div>
                <div class="audience-card">
                    <img src="{{ asset('img/audience-imgs/student.png') }}" alt="Students">
                    <h3>Students & Researchers</h3>
                    <p>Publish academic articles, gain feedback, and collaborate on food-related research projects.</p>
                </div>
                <div class="audience-card">
                    <img src="{{ asset('img/audience-imgs/food-entrep.png') }}" alt="Entrepreneurs">
                    <h3>Food Entrepreneurs</h3>
                    <p>Promote your business, learn from industry trends, and connect with potential collaborators.</p>
                </div>
                <div class="audience-card">
                    <img src="{{ asset('img/audience-imgs/food-enthusiast.png') }}" alt="Food Enthusiasts">
                    <h3>Food Enthusiasts</h3>
                    <p>Explore diverse cuisines, read expert blogs, and engage in meaningful food conversations.</p>
                </div>
            </div>
        </div>
        <hr class="line-divider">
        <div class="team-container">
            <h2>Meet the CUISINE Team</h2>
            <div class="team-grid">
                <div class="team-member">
                    <img src="https://i.pravatar.cc/150?img=1" alt="Team Member">
                    <h3>Maria Lopez</h3>
                    <p>Founder & Culinary Researcher</p>
                </div>
                <div class="team-member">
                    <img src="https://i.pravatar.cc/150?img=2" alt="Team Member">
                    <h3>Jason Rivera</h3>
                    <p>Editor-in-Chief</p>
                </div>
                <div class="team-member">
                    <img src="https://i.pravatar.cc/150?img=3" alt="Team Member">
                    <h3>Kim Tan</h3>
                    <p>Tech Lead & Developer</p>
                </div>
                <div class="team-member">
                    <img src="https://i.pravatar.cc/150?img=4" alt="Team Member">
                    <h3>Angela Cruz</h3>
                    <p>Community Manager</p>
                </div>
            </div>
        </div>
        <div class="call-to-action-container">
            <div class="left">
                <h2>Join the CUISINE Movement</h2>
                <p>
                    Whether you’re a chef, student, writer, or enthusiast — your voice matters.
                    Be part of a growing community that values culinary innovation, cultural stories, and
                    responsible food futures.
                </p>
                <form action="') }}" method="GET" class="cta-form">
                    <input type="email" name="email" class="cta-email" placeholder="Enter your email to get started"
                        required>
                    <button type="submit" class="cta-submit">Continue</button>
                </form>
            </div>

            <div class="right">
                <img src="{{ asset('img/About/about-last.png') }}" alt="Join the movement" class="cta-image">
            </div>
        </div>
    <script>
        const features = [
            {
                img: "{{ asset('img/About/Article-Feature.png') }}",
                title: "Culinary Perspectives and Expert Insights",
                desc: "Explore a rich collection of articles and blogs that delve into culinary trends, research, food culture, ethics, and innovation. Our platform brings together chefs, scholars, and enthusiasts to share meaningful stories, discoveries, and ideas that shape the evolving world of food."
            },
            {
                img: "{{ asset('img/About/Restaurant-Feature.png') }}",
                title: "Spotlighting Culinary Excellence Around the Globe",
                desc: "We showcase standout restaurants known for creativity, sustainability, and cultural impact. Each feature offers a behind-the-scenes look into their signature dishes, philosophies, and the passionate teams redefining the dining experience."
            },
            {
                img: "{{ asset('img/About/Review-Feature.png') }}",
                title: "Real Voices. Authentic Experiences.",
                desc: "From chef interviews to customer feedback, our reviews section reflects genuine experiences and perspectives. Learn what makes a dish memorable, a place welcoming, and a food journey unforgettable through heartfelt stories from the community."
            }
        ];

        let currentIndex = 0;

        const mainImg = document.getElementById('main-img');
        const prevThumb = document.getElementById('prev-thumb');
        const nextThumb = document.getElementById('next-thumb');
        const featureTitle = document.getElementById('feature-title');
        const featureDesc = document.getElementById('feature-description');

        function updateSlider() {
            mainImg.src = features[currentIndex].img;
            featureTitle.innerText = features[currentIndex].title;
            featureDesc.innerText = features[currentIndex].desc;

            prevThumb.src = features[(currentIndex - 1 + features.length) % features.length].img;
            nextThumb.src = features[(currentIndex + 1) % features.length].img;
        }

        document.querySelector('.prev-btn').addEventListener('click', () => {
            currentIndex = (currentIndex - 1 + features.length) % features.length;
            updateSlider();
        });

        document.querySelector('.next-btn').addEventListener('click', () => {
            currentIndex = (currentIndex + 1) % features.length;
            updateSlider();
        });

        // Initialize
        updateSlider();
    </script>

@endsection

@section('footer')
    @include('footer')
@endsection