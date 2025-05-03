<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sales Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    @yield('head')
</head>
<body style="background: #f4f6fb;">
    <div class="w-100 d-flex justify-content-end align-items-center p-3" style="background:#fff; border-bottom:1px solid #e5e7eb;">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="btn btn-outline-danger btn-sm" type="submit">
                <i class="bi bi-box-arrow-right"></i> Logout
            </button>
        </form>
    </div>
    @yield('content')
    @yield('scripts')
</body>
</html>