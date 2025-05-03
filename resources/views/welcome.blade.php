@extends('layouts.app')

@section('title', 'Modern Solutions for Your Business')

@section('styles')
<style>
    .hero-section {
        position: relative;
        padding: 100px 0;
        overflow: hidden;
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
    }
    .hero-content {
        position: relative;
        z-index: 2;
    }
    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 1rem;
    }
    .company-tooltip-container {
        display: inline-block;
        position: relative;
        cursor: pointer;
    }
    .company-tooltip-content {
        display: none;
        position: absolute;
        top: 120%;
        left: 0;
        z-index: 10;
        background: #22325a;
        color: #fff;
        padding: 18px 22px;
        border-radius: 10px;
        width: 340px;
        box-shadow: 0 8px 24px rgba(0,0,0,0.15);
        font-size: 0.98rem;
        line-height: 1.5;
    }
    .company-tooltip-container:hover .company-tooltip-content {
        display: block;
    }
    @media (max-width: 600px) {
        .company-tooltip-content {
            width: 90vw;
            left: 50%;
            transform: translateX(-50%);
        }
    }
    .hero-subtitle {
        font-size: 1.1rem;
        color: #6c757d;
        margin-bottom: 2rem;
    }
    .hero-buttons {
        display: flex;
        gap: 1rem;
    }
    .btn-dark {
        background-color: #0f172a;
        border-color: #0f172a;
        color: white;
        padding: 0.5rem 1.5rem;
        border-radius: 0.25rem;
        font-weight: 500;
        transition: all 0.3s ease;
        transform-style: preserve-3d;
    }
    .btn-dark:hover {
        background-color: #1e293b;
        border-color: #1e293b;
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .btn-light {
        background-color: white;
        border: 1px solid #dee2e6;
        color: #212529;
        padding: 0.5rem 1.5rem;
        border-radius: 0.25rem;
        font-weight: 500;
        transition: all 0.3s ease;
        transform-style: preserve-3d;
    }
    .btn-light:hover {
        background-color: #f8f9fa;
        border-color: #dee2e6;
        transform: translateY(-3px) scale(1.05);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
    }
    .dashboard-preview {
        background-color: #1e293b;
        border-radius: 0.5rem;
        padding: 1.5rem;
        box-shadow: 
            0 10px 15px -3px rgba(0, 0, 0, 0.1),
            0 4px 6px -2px rgba(0, 0, 0, 0.05),
            0 20px 25px -5px rgba(0, 0, 0, 0.1);
        transform: perspective(1000px) rotateY(-10deg) rotateX(5deg);
        transition: all 0.3s ease;
        transform-style: preserve-3d;
    }
    .dashboard-preview:hover {
        transform: perspective(1000px) rotateY(-5deg) rotateX(2deg) translateZ(20px);
        box-shadow: 
            0 20px 25px -5px rgba(0, 0, 0, 0.2),
            0 10px 10px -5px rgba(0, 0, 0, 0.1);
    }
    .dashboard-line {
        height: 12px;
        background-color: #4b5563;
        border-radius: 6px;
        margin-bottom: 1rem;
        opacity: 0.7;
        transition: all 0.3s ease;
        transform: translateZ(0);
    }
    .dashboard-preview:hover .dashboard-line {
        transform: translateZ(10px);
        background-color: #6366f1;
    }
    .dashboard-dot {
        display: inline-block;
        width: 8px;
        height: 8px;
        background-color: #6b7280;
        border-radius: 50%;
        margin-right: 5px;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
        transform: translateZ(0);
    }
    .dashboard-preview:hover .dashboard-dot {
        transform: translateZ(5px);
    }
    .dashboard-preview:hover .dashboard-dot:nth-child(1) {
        background-color: #ef4444;
    }
    .dashboard-preview:hover .dashboard-dot:nth-child(2) {
        background-color: #f59e0b;
    }
    .dashboard-preview:hover .dashboard-dot:nth-child(3) {
        background-color: #10b981;
    }
    .features-section {
        padding: 80px 0;
        text-align: center;
    }
    .features-title {
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 0.5rem;
    }
    .features-subtitle {
        font-size: 1rem;
        color: #6c757d;
        margin-bottom: 3rem;
    }
    .feature-card {
        background-color: white;
        border-radius: 0.5rem;
        padding: 2rem;
        height: 100%;
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: all 0.3s ease;
        transform-style: preserve-3d;
        transform: translateZ(0);
    }
    .feature-card:hover {
        transform: translateY(-10px) rotateX(5deg) scale(1.02);
        box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
    }
    .feature-icon {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 60px;
        height: 60px;
        border-radius: 50%;
        background-color: #f3f4f6;
        margin-bottom: 1.5rem;
        transition: all 0.3s ease;
        transform: translateZ(0);
    }
    .feature-card:hover .feature-icon {
        transform: translateZ(30px) scale(1.1);
        background-color: #e0e7ff;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
    }
    .feature-title {
        font-size: 1.25rem;
        font-weight: 600;
        margin-bottom: 0.75rem;
        transition: all 0.3s ease;
        transform: translateZ(0);
    }
    .feature-card:hover .feature-title {
        transform: translateZ(20px);
        color: #4f46e5;
    }
    .feature-description {
        color: #6c757d;
        font-size: 0.95rem;
        transition: all 0.3s ease;
        transform: translateZ(0);
    }
    .feature-card:hover .feature-description {
        transform: translateZ(15px);
    }
</style>
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 hero-content">
                    <h1 class="hero-title">
                        <span class="company-tooltip-container">
                            CV. ARTHA MAKMUR
                            <div class="company-tooltip-content">
                                <strong>TENTANG ARTHA MAKMUR</strong><br>
                                CV. <b>Artha Makmur</b> merupakan sebuah perusahaan yang didirikan sejak th 2002 Produsen yang bergerak dalam bidang produksi berbagai jenis Cat Besi, Kayu, dan Tembok, yang menunjang berbagai keperluan industry menengah kebawah maupun menengah keatas.<br>
                                <br>
                                <b>Type Cat yang kami produksi yaitu:</b>
                                <ul style="padding-left:18px;">
                                    <li>
                                        <b>Cat Besi</b> antara lain: Cat NC primer / Top coating, Cat Sintetik Top Coating, Cat Epoxy, Cat Zinchromate, Cat PU, Cat Acr Poliyol, Cat Stopving &amp; Cat Antifouling.
                                    </li>
                                    <li>
                                        <b>Cat Kayu:</b> Melamin Sending Seller / High Gloss, NC Seller / High Gloss, Vernis, Cat Brown Mas dan Polytur.
                                    </li>
                                    <li>
                                        <b>Cat SOL / Kulit:</b> Cat PVC.
                                    </li>
                                </ul>
                            </div>
                        </span>
                        <br>
                        Modern Solutions for Your Business
                    </h1>
                    <p class="hero-subtitle">Transform your business with our cutting-edge solutions and innovative approaches.</p>
                    <div class="hero-buttons">
                        <a href="{{ url('/register') }}" class="btn btn-dark">Get Started</a>
                        <a href="#features" class="btn btn-light">Learn More</a>
                    </div>
                </div>
                <div class="col-lg-6 mt-5 mt-lg-0">

                    </div>
                </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <h2 class="features-title">Our Features</h2>
            <p class="features-subtitle">Discover what makes us different</p>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-rocket"></i>
                        </div>
                        <h3 class="feature-title">Fast Performance</h3>
                        <p class="feature-description">Lightning-fast solutions for your business needs</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-shield-alt"></i>
                        </div>
                        <h3 class="feature-title">Secure Platform</h3>
                        <p class="feature-description">Advanced security measures to protect your data</p>
                    </div>
                </div>
                <div class="col-md-4 mb-4">
                    <div class="feature-card">
                        <div class="feature-icon">
                            <i class="fas fa-cogs"></i>
                        </div>
                        <h3 class="feature-title">Easy Integration</h3>
                        <p class="feature-description">Seamless integration with your existing systems</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection