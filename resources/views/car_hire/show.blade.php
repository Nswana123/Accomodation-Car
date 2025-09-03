<!DOCTYPE html>
<html lang="en">
  @include('userdashboard.layout')
  <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --text: #1f2937;
            --text-light: #6b7280;
            --border: #e5e7eb;
            --bg: #ffffff;
            --bg-light: #f9fafb;
            --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
            --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
            --radius-sm: 0.375rem;
            --radius-md: 0.5rem;
            --radius-lg: 0.75rem;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
            background-color: #f1f5f9;
            color: var(--text);
            line-height: 1.6;
        }

        /* Header Styles */
        .main-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background-color: var(--bg);
            box-shadow: var(--shadow-sm);
            border-bottom: 1px solid var(--border);
        }

        .container {
            width: 100%;
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 4rem;
        }

        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: var(--text);
            font-weight: 600;
            font-size: 1.25rem;
        }

        .logo-icon {
            width: 1.75rem;
            height: 1.75rem;
            fill: var(--primary);
        }

        /* Mobile menu toggle */
        .mobile-menu-toggle {
            display: none;
            background: none;
            border: none;
            padding: 0.5rem;
            cursor: pointer;
        }

        .hamburger {
            display: block;
            width: 1.5rem;
            height: 2px;
            background-color: var(--text);
            position: relative;
            transition: all 0.3s ease;
        }

        .hamburger::before,
        .hamburger::after {
            content: '';
            position: absolute;
            width: 1.5rem;
            height: 2px;
            background-color: var(--text);
            transition: all 0.3s ease;
        }

        .hamburger::before {
            top: -6px;
        }

        .hamburger::after {
            top: 6px;
        }

        /* Navigation */
        .primary-nav {
            display: flex;
        }

        .nav-list {
            display: flex;
            gap: 1.5rem;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .nav-link {
            color: var(--text-light);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0;
            position: relative;
            transition: color 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--text);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background-color: var(--primary);
        }

        /* User actions */
        .user-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--text-light);
            font-size: 1.25rem;
            cursor: pointer;
        }

        .search-container {
            position: relative;
        }

        .search-form {
            display: flex;
            align-items: center;
        }

        .search-input {
            padding: 0.5rem 1rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-md);
            font-size: 0.875rem;
            width: 16rem;
            transition: width 0.2s, box-shadow 0.2s;
        }

        .search-input:focus {
            outline: none;
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
            width: 20rem;
        }

        .search-button {
            position: absolute;
            right: 0.5rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-light);
            cursor: pointer;
        }

        /* Auth buttons */
        .auth-buttons {
            display: flex;
            gap: 0.75rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border-radius: var(--radius-md);
            font-weight: 500;
            font-size: 0.875rem;
            text-decoration: none;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-sm {
            padding: 0.375rem 0.75rem;
            font-size: 0.8125rem;
        }

        .btn-outline {
            border: 1px solid var(--border);
            color: var(--text);
            background-color: transparent;
        }

        .btn-outline:hover {
            background-color: var(--bg-light);
        }

        .btn-primary {
            border: 1px solid var(--primary);
            background-color: var(--primary);
            color: white;
        }

        .btn-primary:hover {
            background-color: var(--primary-dark);
            border-color: var(--primary-dark);
        }

        /* Main content */
        .main-content {
            padding: 2rem 1.5rem;
            max-width: 1600px;
            margin: 0 auto;
        }

        /* Hero section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), 
                        url('https://static.independent.co.uk/2025/02/18/10/40/Kia-EV6.png?quality=75&width=1368&crop=3%3A2%2Csmart&trim=85%2C0%2C85%2C0&auto=webp');
            background-size: cover;
            background-position: center;
            border-radius: var(--radius-lg);
            padding: 4rem 2rem;
            color: white;
            margin-bottom: 3rem;
            text-align: center;
        }

        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto 2rem;
        }

        /* Search filters */
        .search-filters {
            background-color: var(--bg);
            border-radius: var(--radius-lg);
            padding: 1.5rem;
            box-shadow: var(--shadow-md);
            margin-bottom: 2rem;
              max-width: 100%;
    margin: 0 auto;
        }

     
        .filter-group {
            margin-bottom: 1rem;
        }

        .filter-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: var(--text-light);
        }

        .filter-group select,
        .filter-group input {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            font-size: 0.9rem;
        }

        .search-btn {
            grid-column: 1 / -1;
            display: flex;
            justify-content: center;
        }

        .search-filters {
    max-width: 100%;
    margin: 0 auto;
}

.filter-grid {
    display: flex;
    flex-wrap: wrap; /* allows wrapping on small screens */
    gap: 1rem; /* spacing between filters */
    align-items: flex-end;
}

.filter-group {
    display: flex;
    flex-direction: column;
}

.filter-group label {
    margin-bottom: 4px;
    font-weight: bold;
}

.filter-group select {
    padding: 6px;
    min-width: 150px;
}

.search-btn button {
    padding: 10px 20px;
}

        /* Car listings */
        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            margin: 2rem 0 1rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .view-all {
            font-size: 0.9rem;
            color: var(--primary);
            text-decoration: none;
            font-weight: 500;
        }

        .car-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            margin-top: 1rem;
        }

        .car-card {
            background: var(--bg);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: all 0.3s ease;
        }

        .car-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }

        .car-image-container {
            position: relative;
            height: 200px;
            overflow: hidden;
        }

        .car-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .car-card:hover .car-image {
            transform: scale(1.05);
        }

        .car-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background-color: var(--primary);
            color: var(--bg);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 600;
        }

        .car-info {
            padding: 1.5rem;
        }

        .car-title {
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            display: flex;
            justify-content: space-between;
        }

        .car-price {
            color: var(--primary);
            font-weight: 600;
        }

        .car-specs {
            display: flex;
            gap: 1rem;
            margin-bottom: 1rem;
            color: var(--text-light);
            font-size: 0.9rem;
        }

        .car-spec {
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .car-features {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }

        .car-feature {
            background-color: var(--bg-light);
            padding: 0.25rem 0.5rem;
            border-radius: var(--radius-sm);
            font-size: 0.75rem;
            color: var(--text-light);
        }

        .car-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .car-rating {
            display: flex;
            align-items: center;
            gap: 0.25rem;
            color: #f59e0b;
            font-weight: 500;
        }

        /* Footer */
        footer {
            background-color: #222;
            color: white;
            padding: 3rem 1.5rem 1.5rem;
            margin-top: 3rem;
        }

        .footer-container {
            max-width: 1280px;
            margin: 0 auto;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
        }

        .footer-column h3 {
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.5rem;
        }

        .footer-column h3::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: 0;
            width: 40px;
            height: 2px;
            background-color: var(--primary);
        }

        .footer-column ul {
            list-style: none;
        }

        .footer-column li {
            margin-bottom: 0.75rem;
        }

        .footer-column a {
            color: #bbb;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-column a:hover {
            color: white;
        }

        .footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }

        .footer-social a {
            color: white;
            background-color: #333;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .footer-social a:hover {
            background-color: var(--primary);
            transform: translateY(-3px);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid #444;
            color: #999;
            font-size: 0.9rem;
            max-width: 1280px;
            margin: 0 auto;
        }

        /* Mobile Bottom Nav */
        .mobile-nav {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: var(--bg);
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            padding: 0.5rem 0;
            z-index: 1000;
        }

        .mobile-nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: var(--text-light);
            font-size: 0.8rem;
            flex: 1;
        }

        .mobile-nav-item i {
            font-size: 1.2rem;
            margin-bottom: 0.25rem;
        }

        .mobile-nav-item.active {
            color: var(--primary);
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: 10px;
            background-color: #ff4757;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
        }

        /* Responsive styles */
        @media (max-width: 1024px) {
            .container {
                padding: 0 1rem;
            }
            
            .search-input {
                width: 12rem;
            }
            
            .search-input:focus {
                width: 16rem;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: block;
            }
            
            .primary-nav {
                position: fixed;
                top: 4rem;
                left: 0;
                right: 0;
                background-color: var(--bg);
                box-shadow: var(--shadow-md);
                padding: 1rem;
                opacity: 0;
                visibility: hidden;
                transform: translateY(-1rem);
                transition: all 0.3s ease;
            }
            
            .primary-nav.active {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }
            
            .nav-list {
                flex-direction: column;
                gap: 0.5rem;
            }
            
            .search-container {
                display: none;
                position: absolute;
                top: 4rem;
                left: 0;
                right: 0;
                padding: 1rem;
                background-color: var(--bg);
                box-shadow: var(--shadow-sm);
            }
            
            .search-container.active {
                display: block;
            }
            
            .search-input {
                width: 100%;
            }
            
            .search-toggle {
                display: block;
            }
            
            .auth-buttons {
                display: none;
            }
            
            .mobile-nav {
                display: flex;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .hero p {
                font-size: 1rem;
            }
        }

        @media (max-width: 480px) {
            .logo-text {
                display: none;
            }

            .hero {
                padding: 3rem 1rem;
            }

            .filter-grid {
                grid-template-columns: 1fr;
            }

            .car-grid {
                grid-template-columns: 1fr;
            }
        }

        .car-image-container {
    position: relative;
    width: 100%;
    height: 200px; /* fixed height for consistency */
    background: #f8f9fa; /* light background so "contain" images don’t float oddly */
    display: flex;
    justify-content: center;
    align-items: center;
}

.car-image {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain; /* show full image without cropping */
}

.car-badge {
    position: absolute;
    top: 10px;
    left: 10px;
    background: #ff4757;
    color: white;
    padding: 4px 10px;
    font-size: 12px;
    border-radius: 12px;
    font-weight: bold;
}

    </style>
<body>
    
  @include('userdashboard.header')

    <!-- Main Content -->
 <main class="main-content" role="main">
        <!-- Hero Section -->
        <section class="hero">
            <h1>Find Your Perfect Rental Car in Zambia</h1>
            <p>Explore Zambia at your own pace with our wide selection of vehicles at competitive prices</p>
            <a href="#" class="btn btn-primary">Browse Cars</a>
        </section>


    <!-- Featured Cars -->
    <section class="mt-5">
        <h2 class="section-title">
            Featured Vehicles
            <a href="#" class="view-all">View all</a>
        </h2>
 <!-- Booking Form -->
                        <div class="booking-form">
                            @if ($errors->any())
    <div class="alert alert-warning fade-in-up">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success fade-in-up">
        {{ session('success') }}
    </div>
@endif 
   <div class="row">
    @foreach($provider->unitType as $type)
        @foreach($type->units as $unit)
            <div class="col-md-3 mb-4">
                <div class="car-card shadow-sm rounded overflow-hidden h-100">

                    <!-- Car Image -->
                    <div class="car-image-container">
                        @if($unit->images->count())
                            <img src="{{ asset('storage/' . $unit->images->first()->image_path) }}" 
                                 alt="{{ $unit->name }}" 
                                 class="car-image">
                        @else
                            <img src="https://via.placeholder.com/300x200" 
                                 alt="{{ $unit->name }}" 
                                 class="car-image">
                        @endif
                        <div class="car-badge">Popular</div>
                    </div>

                    <!-- Car Info -->
                    <div class="car-info p-3">
                        <!-- Title & Price -->
                        <div class="car-title d-flex justify-content-between align-items-center">
                            <h5 class="mb-0">{{ $unit->name }}</h5>
                            <span class="car-price text-primary fw-bold">
                                ZMW {{ number_format($unit->price_per_day, 2) }}/day
                            </span>
                        </div>

                        <!-- Specs -->
                        <div class="car-specs mt-2 d-flex flex-wrap gap-2 text-muted small">
                            <span><i class="fas fa-car"></i> {{ $unit->car_type ?? 'N/A' }}</span>
                            <span><i class="fas fa-cogs"></i> {{ $unit->transmission ?? 'N/A' }}</span>
                            <span><i class="fas fa-gas-pump"></i> {{ $unit->fuel_type ?? 'N/A' }}</span>
                        </div>

                        <!-- Features -->
                        @if($unit->amenities->count())
                            <div class="car-features mt-2 small">
                                @foreach($unit->amenities as $amenity)
                                    <span class="badge bg-light text-dark border">
                                        <i class="{{ $amenity->icon ?? 'fas fa-check' }}"></i> 
                                        {{ $amenity->name }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <!-- Actions -->
                        <div class="car-actions mt-3 d-flex justify-content-between align-items-center">
                            <div class="car-rating small text-muted">
                                <i class="fas fa-star text-warning"></i>
                                <span>{{ $unit->rating ?? '4.8' }} ({{ $unit->reviews_count ?? '124' }})</span>
                            </div>
                            <button class="btn btn-primary btn-sm" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#bookingModal-{{ $unit->id }}">
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
 

            <!-- Booking Modal -->
           <div class="modal fade" id="bookingModal-{{ $unit->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title">Book {{ $unit->name }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form action="{{ route('car_hire_booking.store') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <!-- Hidden Unit ID -->
                    <input type="hidden" name="unit_id" value="{{ $unit->id }}">
                    
                    <!-- Pickup Location -->
                    <div class="mb-3">
                        <label for="pickupLocation-{{ $unit->id }}" class="form-label">Pickup Location</label>
                        <input type="text" class="form-control" id="pickupLocation-{{ $unit->id }}" 
                               name="pickup" required>
                    </div>

                    <!-- Destination -->
                    <div class="mb-3">
                        <label for="destination-{{ $unit->id }}" class="form-label">Destination</label>
                        <input type="text" class="form-control" id="destination-{{ $unit->id }}" 
                               name="destination" required>
                    </div>

                    <!-- Dates -->
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="pickupDate-{{ $unit->id }}" class="form-label">Pickup Date</label>
                            <input type="date" class="form-control booking-date" 
                                   id="pickupDate-{{ $unit->id }}" 
                                   name="check_in"
                                   data-unit-id="{{ $unit->id }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="returnDate-{{ $unit->id }}" class="form-label">Return Date</label>
                            <input type="date" class="form-control booking-date" 
                                   id="returnDate-{{ $unit->id }}" 
                                   name="check_out"
                                   data-unit-id="{{ $unit->id }}" required>
                        </div>
                    </div>

                    <!-- Guests -->
                    <div class="mb-3">
                        <label for="guests-{{ $unit->id }}" class="form-label">Number of Guests</label>
                        <input type="number" class="form-control" id="guests-{{ $unit->id }}" 
                               name="guests" min="1" value="1" required>
                    </div>

                    <!-- Payment Method -->
                    <div class="mb-3">
                        <label class="form-label">Payment Method</label>
                        <select class="form-select" name="method" required>
                            <option value="Cash">Cash</option>
                            <option value="mobile_money_payment">Mobile Money</option>
                            <option value="card">Card</option>
                            <option value="bank_transfer">Bank Transfer</option>
                        </select>
                    </div>

                    <!-- Total Amount -->
                    <div class="alert alert-info mt-3">
                        <strong>Total:</strong>
                        ZMW <span id="totalAmount-{{ $unit->id }}">0.00</span>
                        ({{ number_format($unit->price_per_day, 2) }} per day)
                    </div>

                    <!-- Hidden field for total -->
                    <input type="hidden" name="amount" id="hiddenTotal-{{ $unit->id }}">

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Confirm Booking</button>
                </div>
            </form>
        </div>
    </div>
</div>
            </div>
        @endforeach
    @endforeach
</div>
    </section>


    <!-- Mobile Bottom Nav -->
   
      @include('userdashboard.nav')
    </main>
            @include('userdashboard.footer') 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script>

document.addEventListener("DOMContentLoaded", function() {
    document.querySelectorAll(".booking-date").forEach(function(input) {
        input.addEventListener("change", function() {
            let unitId = this.dataset.unitId;
            let pickup = document.getElementById("pickupDate-" + unitId).value;
            let ret = document.getElementById("returnDate-" + unitId).value;

            let totalSpan = document.getElementById("totalAmount-" + unitId);

            if (pickup && ret) {
                let start = new Date(pickup);
                let end = new Date(ret);

                // Calculate difference in days
                let diff = Math.ceil((end - start) / (1000 * 60 * 60 * 24));

                // Treat same-day booking as 1 night
                if (diff <= 0) {
                    diff = 1;
                }

                let perDay = parseFloat({{ $unit->price_per_day }});
                let total = perDay * diff;

                totalSpan.innerText = total.toFixed(2);

                // Optional: store in hidden input if you want to submit total
                let hiddenInput = document.getElementById("hiddenTotal-" + unitId);
                if(hiddenInput) hiddenInput.value = total.toFixed(2);
            } else {
                // Clear total if dates are incomplete
                totalSpan.innerText = "0.00";
                let hiddenInput = document.getElementById("hiddenTotal-" + unitId);
                if(hiddenInput) hiddenInput.value = "";
            }
        });
    });
});
      function updateMainImage(thumb) {
        const mainImg = document.getElementById('mainGalleryImg');
        mainImg.src = thumb.src;

        // Optional: Highlight active thumbnail
        document.querySelectorAll('.gallery-thumb').forEach(el => {
            el.classList.remove('active');
        });
        thumb.parentElement.classList.add('active');
    }
    let slides = document.querySelectorAll('.slide-img');
    let currentSlide = 0;

    setInterval(() => {
        slides[currentSlide].classList.remove('active');
        currentSlide = (currentSlide + 1) % slides.length;
        slides[currentSlide].classList.add('active');
    }, 5000); // Change image every 5 seconds

  document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.toggle-details').forEach(button => {
        button.addEventListener('click', function() {
            const details = this.closest('.room-card').querySelector('.room-details');
            const isHidden = details.style.display === 'none';
            
            details.style.display = isHidden ? 'block' : 'none';
            this.textContent = isHidden ? 'Hide Details' : 'View Details';
            
            // Toggle the border when details are shown/hidden
            if (isHidden) {
                details.style.borderTop = '1px solid #eee';
                details.style.marginTop = '10px';
                details.style.paddingTop = '20px';
            } else {
                details.style.borderTop = 'none';
                details.style.marginTop = '0';
                details.style.paddingTop = '0';
            }
        });
    });

    // Handle date input placeholders
    document.querySelectorAll('.form-control[type="date"]').forEach(input => {
        input.addEventListener('change', function() {
            if (this.value) {
                this.style.color = 'inherit';
                this.nextElementSibling.style.display = 'none';
            } else {
                this.style.color = 'transparent';
                this.nextElementSibling.style.display = 'block';
            }
        });
    });
});
</script>
</body>
</html>