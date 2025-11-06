@extends('layouts.layout')

@php
$groupedCategories = $categories->groupBy('type');
@endphp

@section('title', 'Products')
@section('content')

<div class="container my-4">
    <div class="row">
        <!-- Sidebar with categories -->
        <div class="col-12 col-md-3">
            <div class="list-group">
                @foreach ($groupedCategories as $type => $group)
                    <a href="{{ route('products.index', ['type' => $type]) }}" class="list-group-item list-group-item-action">
                        <strong>{{ ucfirst($type) }}</strong>
                    </a>
                    @foreach ($group as $cat)
                    <a href="{{ route('products.index', ['category' => $cat->name]) }}" class="list-group-item list-group-item-action ms-3">
                        {{ $cat->name }}
                    </a>
                    @endforeach
                @endforeach
            </div>
        </div>

        <!-- Product listing -->
        <div class="col-12 col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Products</h2>
                <div>
                    <select class="form-select d-inline-block w-auto">
                        <option selected>Sort by</option>
                        <option value="prix">Price</option>
                        <option value="name">Name</option>
                    </select>
                </div>
            </div>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($products as $product)
                    <div class="col">
                        <div class="card h-100">
                            <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->name }}</h5>
                                <p class="card-text">{{ $product->prix }} درهم</p>
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-4">
                {{ $products->links() }} <!-- Pagination links -->
            </div>
        </div>
    </div>
</div>


@endsection
