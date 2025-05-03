<header style="background: #fff; box-shadow: 0 2px 12px rgba(0,0,0,0.04); border-radius: 0 0 18px 18px;">
    <nav class="navbar navbar-expand-lg container py-3">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="{{ url('/') }}" style="font-size: 1.7rem; letter-spacing: 1px; color: #1e293b;">
                <span style="color:#6366f1;">Solusi Digital - Artha Makmur Jaya</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav gap-2 mx-auto">
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 rounded-pill fw-semibold" href="{{ url('/') }}" style="color:#1e293b; transition:background 0.2s;">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 rounded-pill fw-semibold" href="{{ url('/products') }}" style="color:#1e293b; transition:background 0.2s;">Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 rounded-pill fw-semibold" href="{{ url('/about') }}" style="color:#1e293b; transition:background 0.2s;">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link px-3 py-2 rounded-pill fw-semibold" href="{{ url('/contact') }}" style="color:#1e293b; transition:background 0.2s;">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <style>
        .navbar-nav .nav-link:hover, .navbar-nav .nav-link.active {
            background: #f3f4f6;
            color: #6366f1 !important;
        }
        .navbar-brand {
            font-family: 'Segoe UI', 'Roboto', Arial, sans-serif;
        }
    </style>
</header>