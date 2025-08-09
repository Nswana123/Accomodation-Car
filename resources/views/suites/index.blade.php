<!DOCTYPE html>
<html lang="en">
  @include('userdashboard.layout')
<body>
    
  @include('userdashboard.header')

   <main class="main-content" role="main">
    <section class="hotels-hero">
        <h1>Explore Zambia's Finest Suites</h1>
        <p>Discover luxury suites across Zambia's top destinations</p>

        <form action="{{ route('suites.index') }}" method="GET" class="hotel-search-box">
            <div class="search-bar">
                <input type="text" name="search" placeholder="Search suites by location, name or amenities..." value="{{ request('search') }}">
                <button type="submit"><i class="fas fa-search"></i></button>
            </div>

            <div class="search-filters">
                @php
                    $locations = ['Lusaka', 'Livingstone', 'Ndola', 'Kitwe', 'All Locations'];
                @endphp

                @foreach ($locations as $location)
                    <button type="submit" name="location" value="{{ $location }}" 
                        class="filter-option {{ request('location') == $location ? 'active' : '' }}">
                        <i class="fas fa-map-marker-alt"></i> {{ $location }}
                    </button>
                @endforeach
            </div>
        </form>
    </section>
        
                
      <div class="row">
    <div class="row">
            @forelse($suites as $suite)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm">
                        <div class="position-relative">
                            @php
                                $image = $suite->provider->images->first()->image ?? null;
                            @endphp

                            @if($image)
                                <img src="{{ asset('storage/' . $image) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Suite Image">
                            @else
                                <img src="{{ asset('placeholder.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="No Image">
                            @endif

                            <span class="badge bg-primary position-absolute top-0 start-0 m-2">
                                {{ $suite->provider->type }}
                            </span>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">{{ $suite->name }}</h5>
                            <p class="card-text"><i class="fas fa-map-marker-alt"></i> {{ $suite->provider->location }}</p>
                            <p class="card-text">{{ Str::limit($suite->description, 100) }}</p>
                            <p class="card-text fw-bold">
                                Price: <span class="text-success">K{{ number_format($suite->total_price_per_day, 2) }}</span>
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-2">
                                <a href="#" class="btn btn-sm btn-outline-primary">View</a>
                                <button class="btn btn-sm btn-light"><i class="far fa-heart"></i></button>
                            </div>

                            <div class="mt-2 text-warning small">
                                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                                <span class="text-muted">4.5 (128 reviews)</span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
              
                     <div class="col-12">
            <div class="alert alert-warning text-center">
                 <p>No suites found.</p>
            </div>
        </div>
            @endforelse
        </div>



    <!-- Mobile Bottom Nav -->
   
      @include('userdashboard.nav')
    </main>
            @include('userdashboard.footer') 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>