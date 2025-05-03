@extends('layouts.app')

@section('title', 'Our Products')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold">Our Products</h2>
    <div class="row mb-4 g-4">
        <div class="col-md-4">
            <div class="bg-white rounded-4 shadow-sm p-4 h-100 category-filter position-relative" data-category="thinner" style="cursor:pointer;">
                <button class="btn btn-sm btn-outline-secondary minimize-btn" data-category="thinner" style="position:absolute;top:10px;right:10px;z-index:2;">
                    <i class="bi bi-dash"></i>
                </button>
                <h5 class="fw-bold mb-3">Thinner Series</h5>
                <ul class="list-unstyled mb-0">
                    <li><i class="bi bi-droplet"></i> Thinner PVC</li>
                    <li><i class="bi bi-droplet"></i> Thinner Washing</li>
                    <li><i class="bi bi-droplet"></i> Thinner HG</li>
                    <li><i class="bi bi-droplet"></i> Thinner Melamin</li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-white rounded-4 shadow-sm p-4 h-100 category-filter position-relative" data-category="premium" style="cursor:pointer;">
                <button class="btn btn-sm btn-outline-secondary minimize-btn" data-category="premium" style="position:absolute;top:10px;right:10px;z-index:2;">
                    <i class="bi bi-dash"></i>
                </button>
                <h5 class="fw-bold mb-3">Premium Thinners</h5>
                <ul class="list-unstyled mb-0">
                    <li><i class="bi bi-star-fill"></i> Thinner NC DUCO</li>
                    <li><i class="bi bi-star-fill"></i> Thinner NC Top Coat</li>
                    <li><i class="bi bi-star-fill"></i> Thinner Top Cut</li>
                    <li><i class="bi bi-star-fill"></i> Thinner Glaze</li>
                </ul>
            </div>
        </div>
        <div class="col-md-4">
            <div class="bg-white rounded-4 shadow-sm p-4 h-100 category-filter position-relative" data-category="solvent" style="cursor:pointer;">
                <button class="btn btn-sm btn-outline-secondary minimize-btn" data-category="solvent" style="position:absolute;top:10px;right:10px;z-index:2;">
                    <i class="bi bi-dash"></i>
                </button>
                <h5 class="fw-bold mb-3">Solvents</h5>
                <ul class="list-unstyled mb-0">
                    <li><i class="bi bi-pencil"></i> SOLVENT 442</li>
                    <li><i class="bi bi-pencil"></i> SOLVENT 631</li>
                    <li><i class="bi bi-pencil"></i> SOLVENT 532</li>
                    <li><i class="bi bi-pencil"></i> SOLVENT 811</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="row g-4" id="product-list">
        <!-- Thinner Series -->
        <div class="col-md-3 product-card" data-category="thinner">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">Thinner PVC</h6>
                    <div class="text-muted small mb-2">Industrial grade solvent</div>
                    <div class="fw-bold mb-2">Rp.1.900.000</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 product-card" data-category="thinner">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">Thinner Washing</h6>
                    <div class="text-muted small mb-2">Effective cleaning thinner</div>
                    <div class="fw-bold mb-2">Rp.1.700.000</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 product-card" data-category="thinner">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">Thinner HG</h6>
                    <div class="text-muted small mb-2">High grade thinner</div>
                    <div class="fw-bold mb-2">Rp.2.100.000</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 product-card" data-category="thinner">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">Thinner Melamin</h6>
                    <div class="text-muted small mb-2">Melamine compatible thinner</div>
                    <div class="fw-bold mb-2">----</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
        <!-- Premium Thinners -->
        <div class="col-md-3 product-card" data-category="premium">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">Thinner NC DUCO</h6>
                    <div class="text-muted small mb-2">Premium quality for professional results</div>
                    <div class="fw-bold mb-2">-----</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 product-card" data-category="premium">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">Thinner NC Top Coat</h6>
                    <div class="text-muted small mb-2">Top coat thinner</div>
                    <div class="fw-bold mb-2">-----</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 product-card" data-category="premium">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">Thinner Top Cut</h6>
                    <div class="text-muted small mb-2">Superior finish quality</div>
                    <div class="fw-bold mb-2">-----</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 product-card" data-category="premium">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">Thinner Glaze</h6>
                    <div class="text-muted small mb-2">Glaze thinner</div>
                    <div class="fw-bold mb-2">----</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
        <!-- Solvents -->
        <div class="col-md-3 product-card" data-category="solvent">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">SOLVENT 442</h6>
                    <div class="text-muted small mb-2">High-performance solution</div>
                    <div class="fw-bold mb-2">-----</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 product-card" data-category="solvent">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">SOLVENT 631</h6>
                    <div class="text-muted small mb-2">High-quality solvent</div>
                    <div class="fw-bold mb-2">-----</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 product-card" data-category="solvent">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">SOLVENT 532</h6>
                    <div class="text-muted small mb-2">Reliable solvent</div>
                    <div class="fw-bold mb-2">-----</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
        <div class="col-md-3 product-card" data-category="solvent">
            <div class="product-3d bg-white rounded-4 shadow-sm p-3 h-100 d-flex flex-column">
                <div class="d-flex justify-content-center align-items-center mb-3" style="height:140px;">
                    <i class="bi bi-beaker" style="font-size:3rem; color:#6c757d;"></i>
                </div>
                <div class="flex-grow-1">
                    <h6 class="fw-bold">SOLVENT 811</h6>
                    <div class="text-muted small mb-2">Specialty solvent</div>
                    <div class="fw-bold mb-2">-----</div>
                </div>
                <button class="btn btn-dark w-100 mt-auto">Add to Cart</button>
            </div>
        </div>
    </div>
    <div class="row mt-4">
        <div class="col text-center">
            <button class="btn btn-outline-secondary" id="show-all">Show All</button>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    body {
        background: #f4f6fb;
    }
    .category-filter.active {
        border: 2px solid #212529;
        background: #f8f9fa;
        box-shadow: 0 4px 24px rgba(33,37,41,0.07);
    }
    .category-filter {
        transition: box-shadow 0.3s, border 0.3s, background 0.3s;
        box-shadow: 0 2px 8px rgba(33,37,41,0.04);
    }
    .product-3d {
        transition: transform 0.25s cubic-bezier(.4,2,.6,1), box-shadow 0.25s;
        box-shadow: 0 2px 12px rgba(33,37,41,0.08), 0 1.5px 4px rgba(33,37,41,0.04);
        will-change: transform, box-shadow;
        background: linear-gradient(135deg, #fff 80%, #f4f6fb 100%);
    }
    .product-3d:hover, .product-3d:focus-within {
        transform: translateY(-10px) scale(1.04) perspective(600px) rotateX(2deg);
        box-shadow: 0 8px 32px rgba(33,37,41,0.18), 0 2px 8px rgba(33,37,41,0.08);
        z-index: 2;
    }
    .btn-dark {
        border-radius: 20px;
        font-weight: 500;
        letter-spacing: 0.5px;
    }
    .minimize-btn {
        border-radius: 50%;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }
    .minimize-btn:focus, .minimize-btn:hover {
        background: #e9ecef;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const filters = document.querySelectorAll('.category-filter');
        const cards = document.querySelectorAll('.product-card');
        const showAllBtn = document.getElementById('show-all');
        const minimizeBtns = document.querySelectorAll('.minimize-btn');
        // Track minimized state for each category
        const minimized = {
            thinner: false,
            premium: false,
            solvent: false
        };

        filters.forEach(filter => {
            filter.addEventListener('click', function(e) {
                // Prevent filter if minimize button is clicked
                if (e.target.closest('.minimize-btn')) return;
                filters.forEach(f => f.classList.remove('active'));
                this.classList.add('active');
                const category = this.getAttribute('data-category');
                cards.forEach(card => {
                    if (card.getAttribute('data-category') === category && !minimized[category]) {
                        card.style.display = '';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });

        showAllBtn.addEventListener('click', function() {
            filters.forEach(f => f.classList.remove('active'));
            cards.forEach(card => {
                const category = card.getAttribute('data-category');
                card.style.display = minimized[category] ? 'none' : '';
            });
        });
        minimizeBtns.forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.stopPropagation();
                const category = this.getAttribute('data-category');
                minimized[category] = !minimized[category];
                // Toggle icon
                const icon = this.querySelector('i');
                if (minimized[category]) {
                    icon.classList.remove('bi-dash');
                    icon.classList.add('bi-plus');
                } else {
                    icon.classList.remove('bi-plus');
                    icon.classList.add('bi-dash');
                }
                // Hide/show cards of this category
                cards.forEach(card => {
                    if (card.getAttribute('data-category') === category) {
                        card.style.display = minimized[category] ? 'none' : '';
                    }
                });
            });
        });
    });
</script>
@endsection