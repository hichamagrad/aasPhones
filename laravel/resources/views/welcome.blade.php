@extends("layouts.layout")

@section("content")
@php
$groupedCategories = $categories->groupBy('type');
@endphp

<div>
    <img src="/image.png" alt="">
</div>

<div style="flex-wrap: wrap;" class="d-flex justify-content-center">

@foreach ($groupedCategories as $type => $group)
    <div style="border-radius: 25px;cursor:pointer" class="shadow  bg-light m-4 col-10 col-md-5 ">
      <a href="/{{ $type }}" style="text-transform:uppercase; text-decoration: none;color:black" class="d-flex align-items-center justify-content-between">
      @if(isset($group->first()->image)) 
        <h1>{{ $type }}</h1>
        <img style="height: 200px;" src="{{ asset('storage/' . $group->first()->image) }}" alt="{{ $type }}" srcset="">
    @endif
      </a>
    </div>

    @endforeach
    </div>
 
@endsection