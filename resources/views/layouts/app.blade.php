<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Business Website')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        :root {
            --primary-color: #0f172a;
            --secondary-color: #ff6b00;
            --light-bg: #f8f9fa;
        }
        
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
        }
        
        .btn-primary {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-primary:hover {
            background-color: #e05e00;
            border-color: #e05e00;
        }
        
        .btn-outline-primary {
            color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .btn-outline-primary:hover {
            background-color: var(--secondary-color);
            border-color: var(--secondary-color);
        }
        
        .hero-section {
            padding: 80px 0;
            background-color: var(--light-bg);
        }
        
        .features-section {
            padding: 60px 0;
        }
        
        .feature-box {
            padding: 20px;
            text-align: center;
            margin-bottom: 30px;
        }
        
        .feature-icon {
            font-size: 2.5rem;
            margin-bottom: 15px;
            color: var(--secondary-color);
        }
        
        .auth-section {
            padding: 60px 0;
            background-color: var(--light-bg);
        }
        
        .auth-card {
            max-width: 400px;
            margin: 0 auto;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: white;
        }
        
        .footer {
            background-color: var(--primary-color);
            color: white;
            padding: 40px 0 20px;
        }
        
        .footer a {
            color: white;
            text-decoration: none;
        }
        
        .footer a:hover {
            color: var(--secondary-color);
        }
        
        .social-icons a {
            margin-right: 15px;
            font-size: 1.2rem;
        }
    </style>
    @yield('styles')
</head>
<body>
    @include('components.header')
    
    <main>
        @yield('content')
    </main>
    
    @include('components.footer')
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>
</html>



<!-- Footer Section -->
<footer class="bg-dark text-light pt-5 pb-3 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-3 mb-4">
                <h5 class="fw-bold">Artha Makmur jaya</h5>
                <p>Memberikan Solusi digital dan melayani dengan professional.</p>
            </div>
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Quick Links</h6>
                <ul class="list-unstyled">
                    <li><a href="#" class="text-light text-decoration-none">About Us</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Services</a></li>
                    <li><a href="#" class="text-light text-decoration-none">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Contact</h6>
                <ul class="list-unstyled">
                    <li><i class="fas fa-envelope me-2"></i> info@company.com</li>
                    <li><i class="fas fa-phone me-2"></i> +1 234 567 890</li>
                    <li><i class="fas fa-map-marker-alt me-2"></i> 123 Business St, Surabaya</li>
                </ul>
            </div>
            <div class="col-md-3 mb-4">
                <h6 class="fw-bold">Follow Us</h6>
                <div>
                    <a href="#" class="text-light me-3"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="text-light me-3"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="text-light"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
        <hr class="border-secondary">
        <div class="text-center">
            <small>&copy; 2025 Artha Makmur Jaya. All rights reserved.</small>
        </div>
    </div>
</footer>
</body>
</html>