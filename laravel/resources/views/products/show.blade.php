@extends('layouts.layout')

@php
$groupedCategories = $categories->groupBy('type');
@endphp

@section('title', 'Products')

@section('content')



<!-- Product details -->
<div class="col-12 col-md-9">
            <div class="card">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                <div class="card-body">
                    <h1 class="card-title">{{ $product->name }}</h1>
                    <p class="card-text">{{ $product->description }}</p>
                    <h4>{{ $product->price }} USD</h4>
                    <form action="{{ route('cart.store', ['id' => $product->id]) }}" method="POST" class="d-flex">
                        @csrf
                        <input type="number" name="quantity" class="form-control me-2" value="1" min="1">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>


@endsection
