@extends('layouts.admin-app')

@section('content')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
    body {
        background: #f6f7fb;
        min-height: 100vh;
        overflow: hidden;
    }
    .modern-sidebar {
        background: #151c2c;
        min-height: 100vh;
        color: #fff;
        padding: 20px;
    }
    .modern-sidebar .nav-link {
        color: #b0b8c9;
        padding: 12px 16px;
        border-radius: 8px;
        display: flex;
        align-items: center;
        gap: 12px;
        transition: all 0.3s ease;
    }
    .modern-sidebar .nav-link:hover,
    .modern-sidebar .nav-link.active {
        background: #232e47;
        color: #fff;
    }
    .modern-sidebar .nav-link i {
        font-size: 1.2rem;
    }
    .modern-main {
        padding: 24px;
        height: 100vh;
        overflow-y: auto;
    }
    .search-bar {
        background: #fff;
        border: 1px solid #e5e7eb;
        border-radius: 8px;
        padding: 8px 16px;
        width: 300px;
    }
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
        gap: 24px;
        margin-bottom: 24px;
    }
    .stat-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .stat-card h3 {
        color: #6b7280;
        font-size: 0.875rem;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
        gap: 8px;
    }
    .stat-card .value {
        font-size: 1.5rem;
        font-weight: 600;
        color: #111827;
    }
    .stat-card .trend {
        color: #10b981;
        font-size: 0.875rem;
        margin-top: 4px;
    }
    .chart-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 24px;
        margin-bottom: 24px;
    }
    .chart-card {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        min-height: 300px;
    }
    .chart-card h5 {
        margin-bottom: 16px;
        color: #111827;
        font-weight: 600;
    }
    .recent-activity {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
    }
    .activity-item {
        display: flex;
        align-items: center;
        padding: 12px 0;
        border-bottom: 1px solid #e5e7eb;
    }
    .activity-item:last-child {
        border-bottom: none;
    }
    .activity-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #e5e7eb;
        margin-right: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .activity-details {
        flex: 1;
    }
    .activity-time {
        color: #6b7280;
        font-size: 0.875rem;
    }
    .top-bar {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 24px;
    }
</style>

<div class="container-fluid">
    <div class="row g-0">
        <!-- Sidebar -->
        <div class="col-md-2 modern-sidebar">
            <h4 class="mb-4">Admin Dashboard</h4>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link active" href="#"><i class="bi bi-grid"></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/sales') }}"><i class="bi bi-graph-up"></i> Sales Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ url('/admin/manager') }}"><i class="bi bi-person-workspace"></i> Manager Dashboard</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"><i class="bi bi-gear"></i> Settings</a>
                </li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="col-md-10 modern-main">
            <div class="top-bar">
                <input type="text" class="search-bar" placeholder="Search...">
                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-light"><i class="bi bi-bell"></i></button>
                    <!-- Profile Dropdown Start -->
                    <div class="dropdown">
                        <button class="profile-icon me-2 btn btn-link dropdown-toggle d-flex align-items-center" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="border:none;box-shadow:none;background:transparent;">
                            <i class="bi bi-person-circle" style="color:#1976ff;"></i>
                            <!-- Custom arrow to match your screenshot -->
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" style="margin-left:4px;" xmlns="http://www.w3.org/2000/svg">
                              <path d="M8 10L12 14L16 10" stroke="#1976ff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                            <li class="px-3 py-2">
                                <div style="font-weight:600;">{{ Auth::user()->name }}</div>
                                <div style="font-size:0.95rem;color:#6c757d;">{{ Auth::user()->email }}</div>
                            </li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}" class="logout-form m-0">
                                    @csrf
                                    <button class="dropdown-item text-danger" type="submit">
                                        <i class="bi bi-box-arrow-right"></i> Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- Profile Dropdown End -->
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <h3><i class="bi bi-people"></i> Total Users</h3>
                    <div class="value">2,543</div>
                    <div class="trend">+12% from last month</div>
                </div>
                <div class="stat-card">
                    <h3><i class="bi bi-currency-dollar"></i> Revenue</h3>
                    <div class="value">$45,234</div>
                    <div class="trend">+8% from last month</div>
                </div>
                <div class="stat-card">
                    <h3><i class="bi bi-cart"></i> Orders</h3>
                    <div class="value">1,123</div>
                    <div class="trend">+23% from last month</div>
                </div>
                <div class="stat-card">
                    <h3><i class="bi bi-graph-up"></i> Conversion</h3>
                    <div class="value">2.4%</div>
                    <div class="trend">+4% from last month</div>
                </div>
            </div>

            <!-- Charts -->
            <div class="chart-grid">
                <div class="chart-card">
                    <h5>Revenue Overview</h5>
                    <div style="height: 250px; background: #f8fafc;"></div>
                </div>
                <div class="chart-card">
                    <h5>User Activity</h5>
                    <div style="height: 250px; background: #f8fafc;"></div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="recent-activity">
                <h5 class="mb-4">Recent Activity</h5>
                <div class="activity-item">
                    <div class="activity-avatar">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="activity-details">
                        <div class="fw-bold">John Doe</div>
                        <div class="text-muted">Purchased Premium Plan</div>
                    </div>
                    <div class="activity-time">2 hours ago</div>
                </div>
                <div class="activity-item">
                    <div class="activity-avatar">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="activity-details">
                        <div class="fw-bold">Sarah Smith</div>
                        <div class="text-muted">Updated Profile</div>
                    </div>
                    <div class="activity-time">5 hours ago</div>
                </div>
                <div class="activity-item">
                    <div class="activity-avatar">
                        <i class="bi bi-person"></i>
                    </div>
                    <div class="activity-details">
                        <div class="fw-bold">Mike Johnson</div>
                        <div class="text-muted">New Comment</div>
                    </div>
                    <div class="activity-time">1 day ago</div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection