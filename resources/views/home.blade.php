@extends('layouts.app')

@section('title', 'Dashboard - CompanyName')

@section('content')
<section class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title">Welcome, {{ Auth::user()->name }}!</h2>
                        <p class="card-text">You are now logged into your account. This is your dashboard where you can manage your profile and access our services.</p>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Your Profile</h5>
                        <p class="card-text">Manage your personal information and account settings.</p>
                        <a href="#" class="btn btn-outline-primary">Edit Profile</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Our Services</h5>
                        <p class="card-text">Explore our range of business services and solutions.</p>
                        <a href="#" class="btn btn-outline-primary">View Services</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">Support</h5>
                        <p class="card-text">Need help? Contact our support team for assistance.</p>
                        <a href="#" class="btn btn-outline-primary">Get Support</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection