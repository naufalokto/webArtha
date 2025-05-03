@extends('layouts.admin-app')

@section('content')
<div class="container-fluid">
    <div class="row">

        <!-- Sidebar -->
        <div class="col-md-2 bg-light vh-100">
            <h4 class="mt-4">Paint Admin</h4>
            <ul class="nav flex-column mt-4">
                <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Accounts</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/sales-dashboard') }}">Sales Dashboard</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/manager-dashboard') }}">Manager Dashboard</a></li>
            </ul>
        </div>
        <!-- Main Content -->
        <div class="col-md-10">
            <div class="d-flex justify-content-between align-items-center mt-4">
                <div>
                    <h2>Admin Dashboard</h2>
                    <p>Manage your team and accounts</p>
                </div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-dark" type="submit">Logout</button>
                </form>
            </div>
            <div class="card mt-4">
                <div class="card-header d-flex justify-content-between">
                    <span>Registered Accounts</span>
                    <div>
                        <button class="btn btn-outline-secondary btn-sm">Filter</button>
                        <button class="btn btn-outline-secondary btn-sm">Search</button>
                        <button class="btn btn-primary btn-sm">Create Account</button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Role</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->role }}</td>
                                <td><span class="badge bg-success">Active</span></td>
                                <td>...</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection