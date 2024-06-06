@extends("layouts.layout")
@section("content")
@php
$groupedCategories = $categories->groupBy('type');
@endphp
<header class="shadow p-2 d-flex justify-content-between">
    <div>logo</div>
    <nav class=" d-flex align-items-center">
        
        @foreach ($groupedCategories as $type => $group)
        <div class="custom-select-container me-2">
            <select name="{{ $type }}" id="{{ $type }}" class="form-select ">
                <option value="" selected disabled>{{ ucfirst($type) }}</option>
                @foreach ($group as $cat)
                <option value="{{ $cat->name }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        @endforeach

    </nav>
    <div class="d-flex">
    <form action="" class="d-flex align-items-center">
        <input type="search" class="form-control" placeholder="search...">
        <button class="btn btn-dark rounded-pill ms-2" type="submit"><i class="bi bi-search"></i></button>
        
    </form>
    @if (Route::has('login'))
            @auth
            <a href="{{ url('/dashboard') }}" class="text-decoration-none text-dark m-2">
                Dashboard
            </a>
            @else
            <a href="{{ route('login') }}" class="text-decoration-none text-dark m-2">
                Log in
            </a>

            @if (Route::has('register'))
            <a href="{{ route('register') }}" class="text-decoration-none text-dark m-2">
                Register
            </a>
            @endif
            @endauth
        @endif
    </div>
</header>
<div>
    <img src="/image.png" alt="">
</div>

<div style="flex-wrap: wrap;" class="d-flex justify-content-center">

@foreach ($groupedCategories as $type => $group)
    <div style="border-radius: 25px;cursor:pointer" class="shadow  bg-light m-4 col-10 col-md-5 ">
      <a href="/{{ $type }}" style="text-decoration: none;color:black" class="d-flex align-items-center justify-content-between">
      @if(isset($group->first()->image)) 
        <h1>{{ $type }}</h1>
        <img style="height: 200px;" src="{{ asset('storage/' . $group->first()->image) }}" alt="{{ $type }}" srcset="">
    @endif
      </a>
    </div>

    @endforeach
    </div>
  
@endsection