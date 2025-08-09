<!DOCTYPE html>
<html lang="en">
  @include('userdashboard.layout')
<body>
    
  @include('userdashboard.header')

    <!-- Main Content -->
  <main class="main-content" role="main">
        <section class="hotels-hero">
            <h1>Explore Zambia's Finest Cars</h1>
            <p>Discover luxury Cars across Zambia's most beautiful destinations</p>
            
            <form action="{{ route('car_hire.index') }}" method="GET" class="hotel-search-box">
    <div class="search-bar">
        <input type="text" name="search" placeholder="Search hotels by location, name or amenities..." value="{{ request('search') }}">
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
    @foreach($carHireProviders as $provider)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow-sm">
                <div class="position-relative">
                    @if($provider->images->isNotEmpty())
                        <img src="{{ asset('storage/' . $provider->images->first()->image) }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="Provider Image">
                    @else
                        <img src="{{ asset('placeholder.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="No Image">
                    @endif
                    <span class="badge bg-primary position-absolute top-0 start-0 m-2">{{ $provider->type }}</span>
                </div>

                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $provider->name }}</h5>
                    <p class="card-text"><i class="fas fa-map-marker-alt me-1"></i> {{ $provider->location }}</p>
                    <p class="card-text small text-muted">{{ Str::limit($provider->description, 80) }}</p>

                    {{-- Amenities --}}
                    @if($provider->amenities && $provider->amenities->isNotEmpty())
                        <div class="mt-2">
                            <p class="mb-1 fw-bold">Features:</p>
                            <ul class="list-unstyled small d-flex flex-wrap gap-2">
                                @foreach($provider->amenities as $amenity)
                                    <li class="d-flex align-items-center gap-1">
                                        @php
                                            $icons = [
                                                'GPS' => 'fa-map',
                                                'Air Conditioning' => 'fa-snowflake',
                                                'Child Seat' => 'fa-baby-carriage',
                                                'Bluetooth' => 'fa-bluetooth',
                                                'Music' => 'fa-music',
                                                'USB Port' => 'fa-usb',
                                                'Wi-Fi' => 'fa-wifi',
                                            ];
                                            $icon = $icons[$amenity->name] ?? 'fa-car';
                                        @endphp
                                        <i class="fas {{ $icon }}"></i> {{ $amenity->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mt-auto">
                        <p class="fw-bold mb-1">
                            As Low As <span class="text-success">K{{ number_format($provider->lowest_nightly_rate, 2) }}</span>
                        </p>
                        <p class="card-text mb-2">
                            <strong>{{ $provider->available_units_count }}</strong> unit(s) available
                        </p>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('car_hire.show', $provider->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                            <button class="btn btn-sm btn-light"><i class="far fa-heart"></i></button>
                        </div>

                        <div class="mt-2 text-warning small">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                            <i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            <span class="text-muted">4.5 (128 reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>



    <!-- Mobile Bottom Nav -->
   
      @include('userdashboard.nav')
    </main>
            @include('userdashboard.footer') 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>