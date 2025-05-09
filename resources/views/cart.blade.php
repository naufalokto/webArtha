@extends('layouts.app')

@section('title', 'Your Cart')

@section('content')
<div class="container py-5">
    <h2 class="mb-4 fw-bold">Your Cart</h2>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if($cartItems->isEmpty())
        <div class="alert alert-info">Your cart is empty.</div>
    @else
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Product</th>
                <th width="120">Quantity</th>
                <th width="120">Price</th>
                <th width="120">Subtotal</th>
                <th width="80">Action</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cartItems as $item)
                @php $subtotal = $item->product->price * $item->quantity; $total += $subtotal; @endphp
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>
                        <form action="{{ route('cart.update', $item->id) }}" method="POST" class="d-flex">
                            @csrf
                            <input type="number" name="quantity" value="{{ $item->quantity }}" min="1" class="form-control" style="width:70px;">
                            <button class="btn btn-sm btn-primary ms-2">Update</button>
                        </form>
                    </td>
                    <td>Rp.{{ number_format($item->product->price,0,',','.') }}</td>
                    <td>Rp.{{ number_format($subtotal,0,',','.') }}</td>
                    <td>
                        <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                            @csrf
                            <button class="btn btn-sm btn-danger">Remove</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-end fw-bold">Total</td>
                <td colspan="2" class="fw-bold">Rp.{{ number_format($total,0,',','.') }}</td>
            </tr>
        </tbody>
    </table>
    <a href="{{ route('products') }}" class="btn btn-secondary">Continue Shopping</a>
    <a href="#" class="btn btn-success">Checkout</a>
    @endif
</div>
@endsection