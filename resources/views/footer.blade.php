@extends('main')

@section('styles2')
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
@endsection

@section('footer')
    <footer class="site-footer">
        <footer class="site-footer">
            <div class="footer-content">
                <!-- Left: Logo or Image -->
                <div class="footer-logo">
                    <img src="{{ asset('img/Logo.png') }}" alt="CUISINE Logo">
                </div>

                <!-- Right: Footer Details -->
                <div class="footer-details">
                    <div class="footer-links">
                        <h4>Quick Links</h4>
                        <ul>
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Articles</a></li>
                            <li><a href="#">Blogs</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>

                    <div class="footer-contact">
                        <h4>Contact Us</h4>
                        <p>Email: info@cuisine.net</p>
                        <p>Phone: +63 912 345 6789</p>
                        <p>Address: Culinary Street, Manila, PH</p>
                    </div>

                    <div class="footer-social">
                        <h4>Follow Us</h4>
                        <div class="social-icons">
                            <a href="#"><img src="{{ asset('img/icons/facebook.png') }}" alt="Facebook"></a>
                            <a href="#"><img src="{{ asset('img/icons/twitter.png') }}" alt="Twitter"></a>
                            <a href="#"><img src="{{ asset('img/icons/instagram.png') }}" alt="Instagram"></a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} CUISINE Network. All rights reserved.</p>
            </div>
        </footer>

    </footer>
@endsection