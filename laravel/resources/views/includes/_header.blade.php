<header class="shadow p-2 d-flex justify-content-between align-items-center">
    <div class="logo"><a href="/" class="text-decoration-none fw-bold text-dark">AAS PHONES</a></div>
    <nav class="d-flex align-items-center">
        @foreach ($groupedCategories as $type => $group)
        <div class="custom-select-container me-2">
            <select name="{{ $type }}" id="{{ $type }}" class="form-select" onchange="location = this.value;">
                <option value="" selected disabled>{{ ucfirst($type) }}</option>
                @foreach ($group as $cat)
                <option value="{{ route('products.index', ['category' => $cat->name]) }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>
        @endforeach
    </nav>
    <div class="d-flex">
        <a href="{{ route('cart.index') }}" class="btn btn-outline-dark me-2">
            <i class="bi bi-cart-fill me-1"></i> Cart
        </a> 
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
