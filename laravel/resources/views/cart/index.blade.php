@extends('layouts.layout')

@section('title', 'Your Cart')

@section('content')
<div class="container my-4">
    <h1>Your Cart</h1>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if(!empty(session('cart')))
        <div class="row">
            <div class="col-12">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">Image</th>
                            <th scope="col">Product</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Total</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach(session('cart') as $id => $details)
                            <tr>
                                <td><img src="{{ asset('storage/' . $details['image']) }}" width="50" height="50" class="img-fluid" alt="{{ $details['name'] }}"></td>
                                <td>{{ $details['name'] }}</td>
                                <td>{{ $details['quantity'] }}</td>
                                <td>${{ $details['price'] }}</td> <!-- Corrected 'prix' to 'price' -->
                                <td>${{ $details['price'] * $details['quantity'] }}</td> <!-- Corrected 'prix' to 'price' -->
                                <td>
                                    <form action="{{ route('cart.destroy', $id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm">Remove</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-between align-items-center">
                    <h4>Total: ${{ array_reduce(session('cart'), function($total, $details) { return $total + $details['price'] * $details['quantity']; }, 0) }}</h4>
                    <a href="https://api.whatsapp.com/send?phone=212608244562&text={{ urlencode('I would like to place an order for: ' . implode(', ', array_map(function($details) { return $details['quantity'] . ' x ' . $details['name']; }, session('cart')))) }}" class="btn btn-success">
                        Finalize Order on WhatsApp
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-warning">
            Your cart is empty!
        </div>
    @endif
</div>
@endsection
