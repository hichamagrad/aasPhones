@extends('layouts.layout')

@php
$groupedCategories = $categories->groupBy('type');
@endphp

@section('title', 'Products')

@section('content')



<!-- Product details -->
<div class="col-12 col-md-12">
            <div class="d-flex flex-row w-75 align-items-center">
                <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top w-75" alt="{{ $product->name }}">
                <div class="card-body m-25">
                    <h1 class="card-title">{{ $product->name }}</h1>
                    <p class="card-text">{{ $product->discription }}</p>
                    <h4>{{ $product->prix }} DH</h4>
                    <form action="{{ route('cart.store', ['id' => $product->id]) }}" method="POST" class="d-flex">
                        @csrf
                        <input type="number" name="quantity" class="form-control w-25 me-2" value="1" min="1">
                        <button type="submit" class="btn btn-primary">Add to Cart</button>
                    </form>
                </div>
            </div>
        </div>


@endsection
