<!DOCTYPE html>
<html lang="en">
  @include('userdashboard.layout')
<body>
    
  @include('userdashboard.header')

    <!-- Main Content -->
  <main class="main-content" role="main">
        <div class="view-container" id="currentView" aria-live="polite">
            
            <!-- Premium Category Section -->
            <section class="home-view view-section" id="homeView" aria-labelledby="homeViewTitle">
                <h1 id="homeViewTitle" class="sr-only">ZambiaStay Accommodation Categories</h1>
                
                <div class="category-grid" role="grid">
                    <!-- Hotel Category -->
                    <article class="category-card hotel" role="gridcell" tabindex="0">
                        <div class="category-badge">Hotels</div>
                        <div class="category-content">
                            <h2 class="category-title">Luxury Hotels</h2>
                            <p class="category-description">
                                Premium accommodations with world-class amenities, perfect for business and leisure travelers.
                            </p>
                             <a href="hotels.html">

                            <button class="view-button">
                                View Hotels <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                          </a>

                    </article>

                    <!-- Lodge Category -->
                    <article class="category-card lodge" role="gridcell" tabindex="0">
                        <div class="category-badge">Lodges</div>
                        <div class="category-content">
                            <h2 class="category-title">Safari Lodges</h2>
                            <p class="category-description">
                                Immerse yourself in nature with authentic African safari experiences near national parks.
                            </p>
                              <a href="#">
                            <button class="view-button">
                                View Lodges <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                        </a>
                    </article>

                    <!-- Motel Category -->
                    <article class="category-card motel" role="gridcell" tabindex="0">
                        <div class="category-badge">Motels</div>
                        <div class="category-content">
                            <h2 class="category-title">Motels & Guesthouses</h2>
                            <p class="category-description">
                                Affordable and comfortable short-stay options with essential amenities.
                            </p>
                            <a href="">
                            <button class="view-button">
                                View Motels <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                        </a>
                    </article>

                    <!-- Apartment Category -->
                    <article class="category-card apartment" role="gridcell" tabindex="0">
                        <div class="category-badge">Apartments</div>
                        <div class="category-content">
                            <h2 class="category-title">Serviced Apartments</h2>
                            <p class="category-description">
                                Spacious, home-like accommodations with full kitchens for extended stays.
                            </p>
                            <a href=""> 
                            <button class="view-button">
                                View Apartments <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                        </a>
                    </article>
                </div>
            </section>
        </div>
<div>
    <br><br><br>
</div>
                
                <!-- Featured Properties -->
                <h2 class="section-title">
                    Featured Accommodation
                    <a href="{{route('accommodation.index')}}" class="view-all">View all</a>
                </h2>
     <div class="row">
    @forelse($providers as $provider)
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
                    <p class="card-text mb-1"><i class="fas fa-map-marker-alt me-1"></i>{{ $provider->location }}</p>
                    <p class="card-text small text-muted">{{ Str::limit($provider->description, 80) }}</p>

                    {{-- Amenities --}}
                    @if($provider->amenities && $provider->amenities->isNotEmpty())
                        <div class="mt-2">
                            <p class="mb-1 fw-bold">Amenities:</p>
                            <ul class="list-unstyled small d-flex flex-wrap gap-2">
                                @foreach($provider->amenities as $amenity)
                                    <li class="d-flex align-items-center gap-1">
                                        @php
                                            // Map amenity names to icons
                                            $icons = [
                                                'Wi-Fi' => 'fa-wifi',
                                                'Parking' => 'fa-parking',
                                                'Pool' => 'fa-swimming-pool',
                                                'Air Conditioning' => 'fa-snowflake',
                                                'Restaurant' => 'fa-utensils',
                                                'Gym' => 'fa-dumbbell',
                                                'Bar' => 'fa-glass-martini-alt',
                                            ];
                                            $icon = $icons[$amenity->name] ?? 'fa-concierge-bell';
                                        @endphp
                                        <i class="fas {{ $icon }}"></i> {{ $amenity->name }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mt-auto">
                        <p class="fw-bold mb-1">From <span class="text-success">K{{ number_format($provider->lowest_nightly_rate, 2) }}</span> / night</p>
                        <p class="card-text mb-2"><strong>{{ $provider->available_units_count }}</strong> unit(s) available</p>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('accommodation.show', $provider->id) }}" class="btn btn-sm btn-outline-primary">View</a>
                            <button class="btn btn-sm btn-light"><i class="far fa-heart"></i></button>
                        </div>

                        <div class="mt-2 text-warning small">
                            <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                            <span class="text-muted">4.5 (128 reviews)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12">
            <div class="alert alert-warning text-center">
                No accommodation found matching your criteria.
            </div>
        </div>
    @endforelse
</div>

                
                
                 <h2 class="section-title">
                    Featured Car Hire
                    <a href="{{route('car_hire.index')}}" class="view-all">View all</a>
                </h2>
                
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
  <h2 class="section-title">
                    Featured Suite Packages
                    <a href="{{route('suites.index')}}" class="view-all">View all</a>
                </h2>
          <div class="row">
    @foreach($suites as $suite)
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
                    <p class="card-text">{{ $suite->description }}</p>
                    <p class="card-text fw-bold">
                        Price: <span class="text-success">K{{ number_format($suite->total_price_per_day, 2) }}</span>
                    </p>

                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <a href="" class="btn btn-sm btn-outline-primary">View</a>
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
    @endforeach
</div>



    <!-- Mobile Bottom Nav -->
   
      @include('userdashboard.nav')
    </main>
            @include('userdashboard.footer') 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>