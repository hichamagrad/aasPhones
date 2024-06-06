@extends('layouts.layout')

@php
$groupedCategories = $categories->groupBy('type');
@endphp

@section('title', 'Products')

@section('content')



<div class="container my-4">
    <div class="row">
        <div class="col-12 col-md-6">
            <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
        </div>
        <div class="col-12 col-md-6">
            <h1>{{ $product->name }}</h1>
            <p>{{ $product->prix }} درهم</p>
            <p>{{ $product->discription }}</p>
            <a href="#" class="btn btn-primary">Add to Cart</a>
        </div>
    </div>
</div>


@endsection
