<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthViewController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SalesDashboardController;
use App\Http\Controllers\ManagerDashboardController;
use App\Http\Controllers\CartController;

// Welcome page (default route)
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Test route to verify routing is working
Route::get('/test', function () {
    return 'Test route is working!';
});

// Combined login/register page
Route::get('/login-register', function () {
    return view('auth.login-register');
})->name('login-register');

// Authentication routes
Route::get('/login', [AuthViewController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Register routes
Route::get('/register', function () {
    return view('auth.login-register');
})->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Protected routes (only accessible when logged in)
Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/admin/dashboard', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
    Route::get('/admin/sales', [SalesDashboardController::class, 'index'])->name('admin.sales.dashboard');
    Route::get('/admin/manager', [ManagerDashboardController::class, 'index'])->name('admin.manager.dashboard');

    // Cart routes (protected)
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
});

// Sales page route (public or protected as needed)
Route::get('/sales', [HomeController::class, 'sales'])->name('sales.dashboard');

// Manager dashboard route (public or protected as needed)
Route::get('/manager/dashboard', [HomeController::class, 'manager'])->name('manager.dashboard');

// Products route
Route::get('/products', [ProductController::class, 'index'])->name('products');

// About page
Route::view('/about', 'about')->name('about');