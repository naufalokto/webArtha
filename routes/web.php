<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthViewController;
use App\Http\Controllers\ProductController;
// Tambahkan controller berikut jika belum ada
use App\Http\Controllers\SalesDashboardController;
use App\Http\Controllers\ManagerDashboardController;

// Welcome page (default route)
Route::get('/', function () {
    return view('welcome');
});

// Test route to verify routing is working
Route::get('/test', function () {
    return 'Test route is working!';
});

// Combined login/register page - try with a different name
Route::get('/login-register', function () {
    return view('auth.login-register');
})->name('login-register');

// Authentication routes
Route::get('/login', [AuthViewController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// You can keep or remove register routes as needed
Route::get('/register', function () {
    return view('auth.login-register');
})->name('register');
Route::post('/register', function () {
    return redirect('/');
});

// Home and Admin Dashboard routes (protected)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
});

// Sales page route
Route::get('/sales', [HomeController::class, 'sales'])->name('sales.dashboard');

// Manager dashboard route
Route::get('/manager/dashboard', [HomeController::class, 'manager'])->name('manager.dashboard');

// Sales Dashboard and Manager Dashboard (custom dashboards)
Route::get('/sales-dashboard', [SalesDashboardController::class, 'index'])->name('sales.dashboard.page');
Route::get('/manager-dashboard', [ManagerDashboardController::class, 'index'])->name('manager.dashboard.page');

// Products route (only one, no duplicate)
Route::get('/products', [ProductController::class, 'index'])->name('products');

Route::view('/about', 'about')->name('about');