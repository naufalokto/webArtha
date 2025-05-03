@extends('layouts.manager-app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<style>
    body {
        background: #f4f6fb;
    }
    .manager-sidebar {
        width: 220px;
        background: #fff;
        border-right: 1px solid #e5e7eb;
        min-height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 100;
        padding-top: 60px;
        box-shadow: 2px 0 16px 0 rgba(33,37,41,0.04);
    }
    .manager-sidebar .nav-link {
        color: #222;
        font-weight: 500;
        padding: 16px 32px;
        border-radius: 8px 0 0 8px;
        margin-bottom: 4px;
        transition: background 0.2s, color 0.2s;
        display: flex;
        align-items: center;
        gap: 12px;
    }
    .manager-sidebar .nav-link.active, .manager-sidebar .nav-link:hover {
        background: #f4f6fb;
        color: #4f46e5;
    }
    .manager-sidebar .sidebar-logo {
        position: absolute;
        top: 16px;
        left: 0;
        width: 100%;
        text-align: center;
        font-weight: bold;
        font-size: 1.3rem;
        letter-spacing: 1px;
        color: #4f46e5;
    }
    .manager-topbar {
        height: 60px;
        background: #fff;
        border-bottom: 1px solid #e5e7eb;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 32px 0 240px;
        position: sticky;
        top: 0;
        z-index: 101;
    }
    .manager-topbar .profile-icon {
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: #f4f6fb;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }
    .manager-topbar .logout-form {
        margin-left: 24px;
    }
    .manager-main {
        margin-left: 220px;
        padding: 32px 32px 32px 32px;
        background: #f4f6fb;
        min-height: 100vh;
    }
    .manager-card {
        background: #fff;
        border-radius: 18px;
        box-shadow: 0 4px 24px rgba(33,37,41,0.07), 0 1.5px 4px rgba(33,37,41,0.04);
        padding: 28px 24px;
        margin-bottom: 24px;
        transition: transform 0.25s cubic-bezier(.4,2,.6,1), box-shadow 0.25s;
        will-change: transform, box-shadow;
    }
    .manager-card:hover, .manager-card:focus-within {
        transform: translateY(-8px) scale(1.03) perspective(600px) rotateX(1deg);
        box-shadow: 0 8px 32px rgba(33,37,41,0.18), 0 2px 8px rgba(33,37,41,0.08);
        z-index: 2;
    }
    .manager-metric {
        font-size: 2rem;
        font-weight: bold;
        color: #22223b;
    }
    .manager-metric-label {
        font-size: 1.1rem;
        color: #6c757d;
        font-weight: 500;
    }
    .manager-metric-change {
        font-size: 0.95rem;
        color: #16a34a;
        font-weight: 500;
    }
    .manager-metric-change.negative {
        color: #dc2626;
    }
    .manager-table th, .manager-table td {
        vertical-align: middle !important;
        background: #fff;
    }
    .manager-table th {
        color: #6c757d;
        font-size: 0.95rem;
        font-weight: 600;
        border-top: none;
    }
    .manager-table td {
        font-size: 1rem;
        font-weight: 500;
    }
    .badge-status {
        border-radius: 12px;
        padding: 4px 14px;
        font-size: 0.95rem;
        font-weight: 500;
        color: #fff;
        background: #6366f1;
    }
    .badge-status.Pending { background: #f59e42; }
    .badge-status.Completed { background: #16a34a; }
    .badge-status.Processing { background: #4f46e5; }
    @media (max-width: 991px) {
        .manager-sidebar { width: 100px; padding-top: 60px; }
        .manager-main { margin-left: 100px; padding: 24px 8px 24px 8px; }
        .manager-topbar { padding-left: 110px; }
        .manager-sidebar .nav-link { padding: 16px 10px; font-size: 0.95rem; }
        .manager-sidebar .sidebar-logo { font-size: 1rem; }
    }
    @media (max-width: 767px) {
        .manager-sidebar { display: none; }
        .manager-main { margin-left: 0; padding: 16px 2vw; }
        .manager-topbar { padding-left: 16px; }
    }
</style>
<div class="manager-sidebar">
    <div class="sidebar-logo">DashFlow</div>
    <nav class="nav flex-column mt-4">
        <a class="nav-link active" href="#"><i class="bi bi-grid"></i> Dashboard</a>
        <a class="nav-link" href="#"><i class="bi bi-receipt"></i> Transactions</a>
        <a class="nav-link" href="#"><i class="bi bi-bar-chart"></i> Analytics</a>
        <a class="nav-link" href="#"><i class="bi bi-gear"></i> Settings</a>
    </nav>
</div>
<div class="manager-topbar">
    <div>
        <span style="font-weight:600;font-size:1.2rem;">Dashboard</span>
        <span class="ms-4 text-muted" style="font-size:1rem;">Analytics</span>
        <span class="ms-4 text-muted" style="font-size:1rem;">Transactions</span>
    </div>
    <div class="d-flex align-items-center">
        <div class="profile-icon me-2">
            <i class="bi bi-person-circle"></i>
        </div>
        <form method="POST" action="{{ route('logout') }}" class="logout-form">
            @csrf
            <button class="btn btn-outline-danger btn-sm" type="submit">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>
</div>
<div class="manager-main">
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="manager-card">
                <div class="manager-metric-label mb-1">Total Revenue <i class="bi bi-currency-dollar"></i></div>
                <div class="manager-metric">$124,563</div>
                <div class="manager-metric-change">+12.5% from last month</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="manager-card">
                <div class="manager-metric-label mb-1">Total Orders <i class="bi bi-cart"></i></div>
                <div class="manager-metric">1,463</div>
                <div class="manager-metric-change">+8.2% from last month</div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="manager-card">
                <div class="manager-metric-label mb-1">Avg. Order Value <i class="bi bi-clipboard-data"></i></div>
                <div class="manager-metric">$85.20</div>
                <div class="manager-metric-change">+3.1% from last month</div>
            </div>
        </div>
    </div>
    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="manager-card" style="height:220px;">
                <div class="fw-bold mb-2">Sales Analytics</div>
                <div class="d-flex align-items-center justify-content-center h-100 text-muted" style="height:150px;">
                    [Sales Chart Visualization]
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="manager-card" style="height:220px;">
                <div class="fw-bold mb-2">Revenue Distribution</div>
                <div class="d-flex align-items-center justify-content-center h-100 text-muted" style="height:150px;">
                    [Revenue Distribution Chart]
                </div>
            </div>
        </div>
    </div>
    <div class="manager-card">
        <div class="fw-bold mb-3">Recent Transactions</div>
        <div class="table-responsive">
            <table class="table manager-table mb-0">
                <thead>
                    <tr>
                        <th>ORDER ID</th>
                        <th>PRODUCT</th>
                        <th>CUSTOMER</th>
                        <th>AMOUNT</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#ORD-2025-001</td>
                        <td>--nama produk---</td>
                        <td>---nama customer---</td>
                        <td>Rp.2.000.000.00</td>
                        <td><span class="badge-status Completed">Completed</span></td>
                    </tr>
                    <tr>
                        <td>#ORD-2025-002</td>
                        <td>--nama produk---</td>
                        <td>--nama customers---</td>
                        <td>Rp.1.000.000.00</td>
                        <td><span class="badge-status Pending">Pending</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection