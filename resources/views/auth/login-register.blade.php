@extends('layouts.app')

@section('title', 'Sign In / Register')

@section('styles')
<style>
    :root {
        --primary-color: #0f172a;
        --accent-color: #3b82f6;
        --text-color: #334155;
        --light-text: #64748b;
        --border-color: #e2e8f0;
        --bg-color: #f8fafc;
        --card-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    }
    
    body {
        background-color: var(--bg-color);
        color: var(--text-color);
        font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
    }
    
    .auth-container {
        max-width: 800px;
        margin: 40px auto;
        border-radius: 16px;
        overflow: hidden;
        box-shadow: var(--card-shadow);
        display: flex;
        transform-style: preserve-3d;
        transition: all 0.3s ease;
        background-color: white;
    }
    
    .auth-sidebar {
        background-color: var(--primary-color);
        color: white;
        padding: 40px 30px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        width: 35%;
        position: relative;
        overflow: hidden;
    }
    
    .auth-sidebar::before {
        content: '';
        position: absolute;
        top: -50%;
        left: -50%;
        width: 200%;
        height: 200%;
        background: radial-gradient(circle, rgba(59, 130, 246, 0.3) 0%, rgba(15, 23, 42, 0) 70%);
        z-index: 0;
    }
    
    .auth-content {
        background-color: white;
        padding: 40px 30px;
        width: 65%;
    }
    
    .auth-logo {
        margin-bottom: 20px;
        position: relative;
        z-index: 1;
        transform-style: preserve-3d;
        transition: transform 0.5s ease;
    }
    
    .auth-logo:hover {
        transform: rotateY(45deg) rotateX(10deg);
    }
    
    .auth-logo svg {
        width: 60px;
        height: 60px;
    }
    
    .auth-welcome {
        font-size: 24px;
        font-weight: 700;
        margin-bottom: 10px;
        position: relative;
        z-index: 1;
    }
    
    .auth-description {
        color: rgba(255, 255, 255, 0.7);
        font-size: 14px;
        line-height: 1.6;
        position: relative;
        z-index: 1;
    }
    
    .auth-title {
        font-size: 20px;
        font-weight: 700;
        margin-bottom: 5px;
        color: var(--primary-color);
    }
    
    .auth-subtitle {
        color: var(--light-text);
        margin-bottom: 25px;
        font-size: 14px;
    }
    
    .auth-tabs {
        display: flex;
        margin-bottom: 25px;
        border-bottom: 1px solid var(--border-color);
    }
    
    .auth-tab {
        padding: 8px 0;
        margin-right: 20px;
        font-weight: 600;
        color: var(--light-text);
        cursor: pointer;
        position: relative;
        transition: all 0.3s ease;
        font-size: 14px;
    }
    
    .auth-tab.active {
        color: var(--primary-color);
    }
    
    .auth-tab.active:after {
        content: '';
        position: absolute;
        bottom: -1px;
        left: 0;
        width: 100%;
        height: 2px;
        background-color: var(--accent-color);
    }
    
    .auth-tab:hover {
        color: var(--primary-color);
        transform: translateY(-2px);
    }
    
    .form-group {
        margin-bottom: 16px;
    }
    
    .form-label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: var(--text-color);
        font-size: 14px;
    }
    
    .form-control {
        width: 100%;
        padding: 10px 14px;
        font-size: 14px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        transition: all 0.3s ease;
        background-color: var(--bg-color);
    }
    
    .form-control:focus {
        border-color: var(--accent-color);
        box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
        outline: none;
        background-color: white;
    }
    
    .form-control:hover {
        transform: translateY(-2px);
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
    }
    
    .form-check {
        display: flex;
        align-items: center;
    }
    
    .form-check-input {
        margin-right: 8px;
        accent-color: var(--accent-color);
    }
    
    .form-check-label {
        font-size: 14px;
    }
    
    .forgot-password {
        color: var(--accent-color);
        text-decoration: none;
        font-weight: 500;
        transition: all 0.3s ease;
        font-size: 14px;
    }
    
    .forgot-password:hover {
        color: var(--primary-color);
        text-decoration: underline;
        transform: translateY(-2px);
    }
    
    .auth-btn {
        display: block;
        width: 100%;
        padding: 10px;
        background-color: var(--primary-color);
        color: white;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s ease;
        transform-style: preserve-3d;
    }
    
    .auth-btn:hover {
        background-color: var(--accent-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(59, 130, 246, 0.2);
    }
    
    .auth-btn:active {
        transform: translateY(-1px);
    }
    
    .auth-divider {
        text-align: center;
        margin: 16px 0;
        color: var(--light-text);
        position: relative;
        font-size: 14px;
    }
    
    .auth-divider:before, .auth-divider:after {
        content: '';
        position: absolute;
        top: 50%;
        width: 45%;
        height: 1px;
        background-color: var(--border-color);
    }
    
    .auth-divider:before {
        left: 0;
    }
    
    .auth-divider:after {
        right: 0;
    }
    
    .social-buttons {
        display: flex;
        gap: 10px;
    }
    
    .social-btn {
        flex: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px;
        border: 1px solid var(--border-color);
        border-radius: 8px;
        background-color: white;
        color: var(--text-color);
        font-weight: 500;
        cursor: pointer;
        transition: all 0.3s ease;
        transform-style: preserve-3d;
        font-size: 14px;
    }
    
    .social-btn:hover {
        background-color: var(--bg-color);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
    }
    
    .social-btn i {
        margin-right: 8px;
    }
    
    .tab-content {
        display: none;
    }
    
    .tab-content.active {
        display: block;
    }
    
    /* Modern elements */
    .floating-label {
        position: relative;
    }
    
    .floating-label .form-control {
        padding: 16px 14px 8px;
    }
    
    .floating-label .form-label {
        position: absolute;
        top: 10px;
        left: 14px;
        font-size: 14px;
        transition: all 0.2s ease;
        pointer-events: none;
        color: var(--light-text);
    }
    
    .floating-label .form-control:focus ~ .form-label,
    .floating-label .form-control:not(:placeholder-shown) ~ .form-label {
        top: 4px;
        left: 14px;
        font-size: 10px;
        color: var(--accent-color);
    }
    
    .input-icon {
        position: relative;
    }
    
    .input-icon i {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        left: 14px;
        color: var(--light-text);
    }
    
    .input-icon .form-control {
        padding-left: 40px;
    }
    
    .password-toggle {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        right: 14px;
        color: var(--light-text);
        cursor: pointer;
    }
    
    .animated-bg {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 0;
        overflow: hidden;
    }
    
    .animated-bg span {
        position: absolute;
        display: block;
        width: 20px;
        height: 20px;
        background: rgba(255, 255, 255, 0.05);
        animation: animate 25s linear infinite;
        bottom: -150px;
        border-radius: 50%;
    }
    
    .animated-bg span:nth-child(1) {
        left: 25%;
        width: 80px;
        height: 80px;
        animation-delay: 0s;
    }
    
    .animated-bg span:nth-child(2) {
        left: 10%;
        width: 20px;
        height: 20px;
        animation-delay: 2s;
        animation-duration: 12s;
    }
    
    .animated-bg span:nth-child(3) {
        left: 70%;
        width: 20px;
        height: 20px;
        animation-delay: 4s;
    }
    
    .animated-bg span:nth-child(4) {
        left: 40%;
        width: 60px;
        height: 60px;
        animation-delay: 0s;
        animation-duration: 18s;
    }
    
    .animated-bg span:nth-child(5) {
        left: 65%;
        width: 20px;
        height: 20px;
        animation-delay: 0s;
    }
    
    .animated-bg span:nth-child(6) {
        left: 75%;
        width: 110px;
        height: 110px;
        animation-delay: 3s;
    }
    
    .animated-bg span:nth-child(7) {
        left: 35%;
        width: 150px;
        height: 150px;
        animation-delay: 7s;
    }
    
    .animated-bg span:nth-child(8) {
        left: 50%;
        width: 25px;
        height: 25px;
        animation-delay: 15s;
        animation-duration: 45s;
    }
    
    .animated-bg span:nth-child(9) {
        left: 20%;
        width: 15px;
        height: 15px;
        animation-delay: 2s;
        animation-duration: 35s;
    }
    
    .animated-bg span:nth-child(10) {
        left: 85%;
        width: 150px;
        height: 150px;
        animation-delay: 0s;
        animation-duration: 11s;
    }
    
    @keyframes animate {
        0% {
            transform: translateY(0) rotate(0deg);
            opacity: 1;
            border-radius: 0;
        }
        100% {
            transform: translateY(-1000px) rotate(720deg);
            opacity: 0;
            border-radius: 50%;
        }
    }
    
    @media (max-width: 768px) {
        .auth-container {
            flex-direction: column;
            max-width: 90%;
        }
        
        .auth-sidebar, .auth-content {
            width: 100%;
        }
        
        .auth-sidebar {
            padding: 30px 20px;
        }
        
        .auth-content {
            padding: 30px 20px;
        }
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="auth-container">
        <div class="auth-sidebar">
            <div class="animated-bg">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <div class="auth-logo">
                <svg viewBox="0 0 24 24" fill="white" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12 2L2 7L12 12L22 7L12 2Z" fill="white" stroke="white" stroke-width="1" stroke-linejoin="round"/>
                    <path d="M2 17L12 22L22 17" stroke="white" stroke-width="1" stroke-linejoin="round"/>
                    <path d="M2 12L12 17L22 12" stroke="white" stroke-width="1" stroke-linejoin="round"/>
                </svg>
            </div>
            <h2 class="auth-welcome">Welcome Back</h2>
            <p class="auth-description">Experience the next generation of digital authentication</p>
        </div>
        <div class="auth-content">
            <h1 class="auth-title">Sign In / Register</h1>
            <p class="auth-subtitle">Please enter your details</p>
            
            <div class="auth-tabs">
                <div class="auth-tab active" data-tab="login">Login</div>
                <div class="auth-tab" data-tab="register">Register</div>
            </div>
            
            <div class="tab-content active" id="login-tab">
    <form method="POST" action="{{ route('login.submit') }}">
        @csrf
        <div class="form-group input-icon">
            <i class="fas fa-envelope"></i>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group input-icon">
            <i class="fas fa-lock"></i>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Enter your password" required>
            <span class="password-toggle" onclick="togglePassword('password')">
                <i class="fas fa-eye"></i>
            </span>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input type="checkbox" class="form-check-input" id="remember" name="remember">
                <label class="form-check-label" for="remember">Remember me</label>
            </div>
            <a href="#" class="forgot-password">Forgot password?</a>
        </div>
        
        <button type="submit" class="auth-btn">Sign In</button>
    </form>
    
    <div class="auth-divider">Or continue with</div>
    
    <div class="social-buttons">
        <button type="button" class="social-btn">
            <i class="fab fa-google"></i> Google
        </button>
        <button type="button" class="social-btn">
            <i class="fab fa-github"></i> GitHub
        </button>
    </div>
</div>

            
<div class="tab-content" id="register-tab">
    <form method="POST" action="{{ route('register.submit') }}">
        @csrf
        <div class="form-group input-icon">
            <i class="fas fa-user"></i>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter your full name" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group input-icon">
            <i class="fas fa-envelope"></i>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter your email" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group input-icon">
            <i class="fas fa-lock"></i>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="reg-password" placeholder="Create a password" required>
            <span class="password-toggle" onclick="togglePassword('reg-password')">
                <i class="fas fa-eye"></i>
            </span>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="form-group input-icon">
            <i class="fas fa-lock"></i>
            <input type="password" class="form-control" name="password_confirmation" id="confirm-password" placeholder="Confirm your password" required>
            <span class="password-toggle" onclick="togglePassword('confirm-password')">
                <i class="fas fa-eye"></i>
            </span>
        </div>
        
        <button type="submit" class="auth-btn">Sign Up</button>
    </form>
    
    <div class="auth-divider">Or continue with</div>
    
    <div class="social-buttons">
        <button type="button" class="social-btn">
            <i class="fab fa-google"></i> Google
        </button>
        <button type="button" class="social-btn">
            <i class="fab fa-github"></i> GitHub
        </button>
    </div>
</div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('.auth-tab');
        const tabContents = document.querySelectorAll('.tab-content');
        
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                const tabId = this.getAttribute('data-tab');
                
                // Remove active class from all tabs and contents
                tabs.forEach(t => t.classList.remove('active'));
                tabContents.forEach(c => c.classList.remove('active'));
                
                // Add active class to current tab and content
                this.classList.add('active');
                document.getElementById(tabId + '-tab').classList.add('active');
            });
        });
    });
    
    function togglePassword(id) {
        const passwordInput = document.getElementById(id);
        const icon = passwordInput.nextElementSibling.querySelector('i');
        
        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }
</script>
@endsection