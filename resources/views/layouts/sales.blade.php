@extends('layouts.admin-app')

@section('content')
<div class="w-100 d-flex justify-content-end align-items-center p-3" style="background:#fff; border-bottom:1px solid #e5e7eb;">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button class="btn btn-outline-danger btn-sm" type="submit">
            <i class="bi bi-box-arrow-right"></i> Logout
        </button>
    </form>
</div>
<style>
    .sidebar {
        width: 220px;
        background: #151c2c;
        color: #fff;
        min-height: 100vh;
        float: left;
        padding: 30px 0 0 0;
    }
    .sidebar .logo {
        text-align: center;
        margin-bottom: 40px;
    }
    .sidebar .logo img {
        width: 60px;
        border-radius: 50%;
    }
    .sidebar ul {
        list-style: none;
        padding: 0;
    }
    .sidebar ul li {
        padding: 15px 30px;
        font-size: 16px;
        cursor: pointer;
    }
    .sidebar ul li:hover, .sidebar ul li.active {
        background: #232e47;
    }
    .main-content {
        margin-left: 220px;
        padding: 30px;
        background: #f4f5f7;
        min-height: 100vh;
    }
    .card {
        background: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.04);
        padding: 24px;
        margin-bottom: 24px;
    }
    .table th, .table td {
        vertical-align: middle !important;
    }
    .actions i {
        cursor: pointer;
        margin-right: 8px;
    }
</style>
<div class="sidebar">
    <div class="logo">
        <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="Sales Dashboard">
        <div style="margin-top:10px;font-weight:bold;">Sales Dashboard</div>
    </div>
    <ul>
        <li class="active">Products</li>
        <li>Raw Materials</li>
        <li>Reports</li>
    </ul>
</div>
<div class="main-content">
    <h2>Product Management</h2>
    <div class="card">
        <h5>Add/Edit Product</h5>
        <form class="row g-3">
            <div class="col-md-6">
                <label class="form-label">Product Name</label>
                <input type="text" class="form-control" placeholder="Thinner PVC">
            </div>
            <div class="col-md-6">
                <label class="form-label">Product Code</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="col-md-6">
                <label class="form-label">Price</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="col-md-6">
                <label class="form-label">Stock</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="col-12 mt-3">
                <button type="button" class="btn btn-dark">Save Product</button>
            </div>
        </form>
    </div>
    <div class="card">
        <h5>Raw Materials</h5>
        <form class="row g-3 mb-3">
            <div class="col-md-4">
                <label class="form-label">Material Name</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="col-md-4">
                <label class="form-label">Quantity</label>
                <input type="text" class="form-control" placeholder="">
            </div>
            <div class="col-md-4">
                <label class="form-label">Unit</label>
                <select class="form-select">
                    <option selected>Liters</option>
                    <option>Kilograms</option>
                </select>
            </div>
            <div class="col-12 mt-3">
                <button type="button" class="btn btn-dark">Add Material</button>
            </div>
        </form>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Material</th>
                    <th>Quantity</th>
                    <th>Unit</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>SOLVENT 442</td>
                    <td>100</td>
                    <td>Liters</td>
                    <td class="actions">
                        <i class="bi bi-pencil-square"></i>
                        <i class="bi bi-trash"></i>
                    </td>
                </tr>
                <tr>
                    <td>SOLVENT 631</td>
                    <td>150</td>
                    <td>Liters</td>
                    <td class="actions">
                        <i class="bi bi-pencil-square"></i>
                        <i class="bi bi-trash"></i>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection