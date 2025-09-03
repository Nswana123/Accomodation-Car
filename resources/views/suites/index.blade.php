<!DOCTYPE html>
<html lang="en">
  @include('userdashboard.layout')
  <style>
        :root {
            --primary: #2563eb;
            --primary-dark: #1d4ed8;
            --hotel: #ec4899;
            --lodge: #f59e0b;
            --apartment: #8b5cf6;
            --dark: #1e293b;
            --light-dark: #64748b;
            --light: #f8fafc;
            --white: #ffffff;
            --shadow-sm: 0 1px 3px rgba(0,0,0,0.12);
            --shadow-md: 0 4px 6px rgba(0,0,0,0.1);
            --shadow-lg: 0 10px 25px rgba(0,0,0,0.15);
            --radius: 12px;
            --transition: all 0.3s ease;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
            line-height: 1.6;
        }

        /* Header styles (same as provided) */
        .main-header {
            position: sticky;
            top: 0;
            z-index: 50;
            background-color: var(--white);
            box-shadow: var(--shadow-sm);
            border-bottom: 1px solid #eee;
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

        /* Logo styles */
        .logo {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            text-decoration: none;
            color: var(--dark);
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
            background-color: var(--dark);
            position: relative;
            transition: all 0.3s ease;
        }

        .hamburger::before,
        .hamburger::after {
            content: '';
            position: absolute;
            width: 1.5rem;
            height: 2px;
            background-color: var(--dark);
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
            color: var(--light-dark);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0;
            position: relative;
            transition: color 0.2s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--dark);
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

        /* Dropdown navigation */
        .dropdown {
            position: relative;
        }

        .dropdown-toggle {
            background: none;
            border: none;
            color: var(--light-dark);
            font-weight: 500;
            font-family: inherit;
            font-size: inherit;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.25rem;
            padding: 0.5rem 0;
        }

        .dropdown-icon {
            font-size: 0.75rem;
            transition: transform 0.2s;
        }

        .dropdown-toggle[aria-expanded="true"] .dropdown-icon {
            transform: rotate(180deg);
        }

        .dropdown-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background-color: var(--white);
            border-radius: 6px;
            box-shadow: var(--shadow-md);
            padding: 0.5rem 0;
            min-width: 12rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(0.5rem);
            transition: all 0.2s ease;
            z-index: 10;
        }

        .dropdown:hover .dropdown-menu,
        .dropdown-toggle[aria-expanded="true"] + .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            display: block;
            padding: 0.5rem 1rem;
            color: var(--dark);
            text-decoration: none;
            transition: background-color 0.2s;
        }

        .dropdown-item:hover {
            background-color: #f5f5f5;
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
            color: var(--light-dark);
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
            border: 1px solid #ddd;
            border-radius: 8px;
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
            color: var(--light-dark);
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
            border-radius: 8px;
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
            border: 1px solid #ddd;
            color: var(--dark);
            background-color: transparent;
        }

        .btn-outline:hover {
            background-color: #f5f5f5;
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

        /* User dropdown */
        .user-dropdown {
            position: relative;
            display: none;
        }

        .user-avatar-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
            border: none;
            cursor: pointer;
        }

        .user-avatar {
            width: 2rem;
            height: 2rem;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-name {
            font-weight: 500;
            font-size: 0.875rem;
        }

        .user-dropdown .dropdown-menu {
            right: 0;
            left: auto;
            width: 16rem;
        }

        .dropdown-header {
            display: flex;
            gap: 1rem;
            padding: 1rem;
            border-bottom: 1px solid #eee;
        }

        .dropdown-header img {
            width: 2.5rem;
            height: 2.5rem;
            border-radius: 50%;
            object-fit: cover;
        }

        .user-fullname {
            font-weight: 600;
        }

        .user-email {
            font-size: 0.75rem;
            color: var(--light-dark);
        }

        .dropdown-divider {
            height: 1px;
            background-color: #eee;
            margin: 0.5rem 0;
        }

        /* Main content styles */
        .main-content {
            padding: 2rem;
            max-width: 1400px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 1.75rem;
            font-weight: 600;
            margin: 2rem 0 1.5rem;
            color: var(--dark);
            text-align: center;
        }

        .section-subtitle {
            text-align: center;
            color: var(--light-dark);
            margin-bottom: 3rem;
            max-width: 700px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Combo Offers Section */
        .combo-offers {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(500px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        @media (max-width: 600px) {
            .combo-offers {
                grid-template-columns: 1fr;
            }
        }

        .combo-card {
            background: var(--white);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
        }

        .combo-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-lg);
        }

        .combo-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem 1.5rem 0;
        }

        .combo-title {
            font-size: 1.25rem;
            font-weight: 600;
            color: var(--dark);
        }

        .combo-discount {
            background-color: var(--primary);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .combo-content {
            display: flex;
            padding: 1.5rem;
            gap: 1.5rem;
        }

        @media (max-width: 768px) {
            .combo-content {
                flex-direction: column;
            }
        }

        .combo-details {
            flex: 1;
        }

        .combo-price {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 1.5rem;
        }

        .combo-price .original {
            font-size: 1rem;
            color: var(--light-dark);
            text-decoration: line-through;
            margin-right: 0.5rem;
        }

        .combo-features {
            list-style: none;
            margin-bottom: 1.5rem;
        }

        .combo-features li {
            margin-bottom: 0.75rem;
            display: flex;
            align-items: flex-start;
            gap: 0.5rem;
        }

        .combo-features i {
            color: var(--primary);
            margin-top: 0.2rem;
        }

        .combo-image {
            width: 200px;
            height: 150px;
            border-radius: 8px;
            overflow: hidden;
            flex-shrink: 0;
        }

        @media (max-width: 768px) {
            .combo-image {
                width: 100%;
                height: auto;
                aspect-ratio: 16/9;
            }
        }

        .combo-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }

        .combo-card:hover .combo-image img {
            transform: scale(1.05);
        }

        .combo-footer {
            padding: 0 1.5rem 1.5rem;
        }

        .book-combo-btn {
            width: 100%;
            background-color: var(--primary);
            color: white;
            border: none;
            padding: 0.75rem;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .book-combo-btn:hover {
            background-color: var(--primary-dark);
        }

        .combo-badge {
            display: inline-block;
            background-color: #f0fdf4;
            color: #16a34a;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
            margin-bottom: 1rem;
        }

        /* Popular Destinations */
        .destinations {
            margin-top: 4rem;
        }

        .destination-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .destination-card {
            background: var(--white);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            text-decoration: none;
            color: var(--dark);
        }

        .destination-card:hover {
            transform: translateY(-3px);
            box-shadow: var(--shadow-md);
        }

        .destination-image {
            height: 120px;
            width: 100%;
            object-fit: cover;
        }

        .destination-info {
            padding: 1rem;
        }

        .destination-name {
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .destination-count {
            font-size: 0.8rem;
            color: var(--light-dark);
        }

        /* Why Choose Us Section */
        .benefits {
            margin-top: 4rem;
            background-color: var(--white);
            padding: 3rem;
            border-radius: var(--radius);
            box-shadow: var(--shadow-sm);
        }

        .benefits-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 2rem;
            margin-top: 2rem;
        }

        .benefit-card {
            text-align: center;
            padding: 1.5rem;
        }

        .benefit-icon {
            font-size: 2.5rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }

        .benefit-title {
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .benefit-desc {
            color: var(--light-dark);
            font-size: 0.9rem;
        }

        /* Footer styles (same as provided) */
        footer {
            background-color: #222;
            color: var(--white);
            padding: 3rem 2rem 1.5rem;
            margin-top: 3rem;
        }

        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }

        .footer-column h3 {
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
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
            color: var(--primary);
        }

        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid #444;
            color: #999;
            font-size: 0.9rem;
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
                background-color: var(--white);
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
            
            .nav-link {
                padding: 0.75rem 0;
                display: block;
            }
            
            .dropdown-menu {
                position: static;
                box-shadow: none;
                padding-left: 1rem;
                opacity: 1;
                visibility: visible;
                transform: none;
                display: none;
            }
            
            .dropdown-toggle[aria-expanded="true"] + .dropdown-menu {
                display: block;
            }
            
            .search-container {
                display: none;
                position: absolute;
                top: 4rem;
                left: 0;
                right: 0;
                padding: 1rem;
                background-color: var(--white);
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
            
            .user-dropdown {
                display: block;
            }
        }

        @media (max-width: 480px) {
            .logo-text {
                display: none;
            }
            
            .user-name {
                display: none;
            }
        }

        .currency::before {
            content: "ZMW ";
        }
        </style>
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
        
   <section class="section">              
<div class="row">
                  @if ($errors->any())
    <div class="alert alert-warning fade-in-up">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('error'))
    <div class="alert alert-danger fade-in-up">
        {{ session('error') }}
    </div>
@endif
@if (session('success'))
    <div class="alert alert-success fade-in-up">
        {{ session('success') }}
    </div>
@endif 
    @forelse($suites as $suite)
        @php
            $image = $suite->provider->images->first()->image ?? null;
            $unit = $suite->units->first(); // Get first unit
        @endphp
        <div class="col-md-6 mb-4">
            <div class="card shadow-lg border-0 h-100 rounded-3">
                <!-- Suite Image -->
                <div class="position-relative">
                    @if($image)
                        <img src="{{ asset('storage/' . $image) }}" 
                             class="card-img-top" 
                             style="max-height: 300px; width: 100%; object-fit: contain;" 
                             alt="Suite Image">
                    @else
                        <img src="{{ asset('placeholder.jpg') }}" 
                             class="card-img-top rounded-top" 
                             style="height: 280px; object-fit: cover;" 
                             alt="No Image">
                    @endif

                    @if($suite->discount ?? false)
                        <span class="badge bg-success position-absolute top-0 end-0 m-3 px-3 py-2">
                            Save {{ $suite->discount }}%
                        </span>
                    @endif
                </div>

                <!-- Suite Details -->
                <div class="card-body">
                    <h4 class="card-title fw-bold">{{ $suite->name }}</h4>
                    <p class="text-muted mb-2">
                        <i class="fas fa-map-marker-alt text-danger"></i> {{ $suite->provider->location }}
                    </p>
                    <p class="text-muted">{{ Str::limit($suite->description, 150) }}</p>
                    <h3 class="text-primary fw-bold mb-3">
                        K{{ number_format($suite->total_price_per_day, 2) }}
                        <small class="text-muted fs-6"> / night</small>
                    </h3>

                    <!-- Features -->
                    <div class="row">
                        <div class="col-md-6">
                            <p><i class="fas fa-users text-success me-2"></i> 
                                Capacity: {{ $unit->capacity ?? 'N/A' }} Guests
                            </p>
                            <p><i class="fas fa-bed text-info me-2"></i> {{ $suite->bedrooms ?? 1 }} Bedroom(s)</p>
                        </div>
                        <div class="col-md-6">
                            <p><i class="fas fa-car text-warning me-2"></i> {{ $suite->provider->type }}</p>
                            <p><i class="fas fa-wifi text-danger me-2"></i> Free Wi-Fi</p>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="card-footer bg-white border-0 d-flex justify-content-between align-items-center">
                    <span class="text-muted small">
                        <i class="fas fa-star text-warning"></i> 4.5 (128 reviews)
                    </span>
                    <!-- Button triggers modal -->
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#payBookModal{{ $suite->id }}">
                        <i class="fas fa-calendar-check"></i> Book This Package
                    </a>
                </div>
            </div>
        </div>

        <!-- Pay & Book Modal for each suite -->
        <div class="modal fade" id="payBookModal{{ $suite->id }}" tabindex="-1" aria-labelledby="payBookModalLabel{{ $suite->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="{{ route('bookings.processPayment') }}" method="POST" class="modal-content">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="payBookModalLabel{{ $suite->id }}">Complete Your Booking & Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Booking Details -->
                        <div class="mb-3">
                            <label for="checkIn{{ $suite->id }}" class="form-label">Check-In</label>
                            <input type="date" class="form-control" id="checkIn{{ $suite->id }}" name="check_in" required>
                        </div>
                        <div class="mb-3">
                            <label for="checkOut{{ $suite->id }}" class="form-label">Check-Out</label>
                            <input type="date" class="form-control" id="checkOut{{ $suite->id }}" name="check_out" required>
                        </div>
                        <div class="mb-3">
                            <label for="pickup{{ $suite->id }}" class="form-label">Pickup Location</label>
                            <input type="text" class="form-control" id="pickup{{ $suite->id }}" name="pickup" required>
                        </div>
                        <div class="mb-3">
                            <label for="destination{{ $suite->id }}" class="form-label">Destination</label>
                            <input type="text" class="form-control" id="destination{{ $suite->id }}" name="destination" required>
                        </div>
                        <div class="mb-3">
                            <label for="guests{{ $suite->id }}" class="form-label">Number of Guests</label>
                            <input type="number" class="form-control" id="guests{{ $suite->id }}" name="guests" min="1" value="1" required>
                        </div>

                        <!-- Payment Mode -->
                        <div class="mb-3">
                            <label for="paymentMode{{ $suite->id }}" class="form-label">Payment Mode</label>
                            <select class="form-select" id="paymentMode{{ $suite->id }}" name="method" required>
                                <option value="" disabled selected>Select Payment Mode</option>
                                <option value="Cash">Cash</option>
                                <option value="mobile_money_payment">Mobile Money Payment</option>
                                <option value="card">Credit/Debit Card</option>
                                <option value="bank_transfer">Bank Transfer</option>
                            </select>
                        </div>

                        <!-- Payment Amount -->
                        <div class="mb-3">
                            <label for="paymentAmount{{ $suite->id }}" class="form-label">Amount (ZMK)</label>
                            <input type="number" class="form-control paymentAmount" 
                                   name="amount" min="0" step="0.01" 
                                   value="{{ $suite->total_price_per_day ?? 0 }}" 
                                   data-price="{{ $suite->total_price_per_day ?? 0 }}" 
                                   required>
                        </div>

                        <!-- Conditional Payment Details -->
                        <div id="mobileMoneyDetails{{ $suite->id }}" style="display:none;">
                            <div class="mb-3">
                                <label class="form-label">Mobile Money Number</label>
                                <input type="text" class="form-control" name="payment_number">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Transaction Reference</label>
                                <input type="text" class="form-control" name="reference">
                            </div>
                        </div>

                        <div id="cardDetails{{ $suite->id }}" style="display:none;">
                            <div class="mb-3">
                                <label class="form-label">Card Number</label>
                                <input type="text" class="form-control" name="cardNumber" maxlength="19">
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Expiry Date (MM/YY)</label>
                                    <input type="text" class="form-control" name="cardExpiry" maxlength="5">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">CVC</label>
                                    <input type="text" class="form-control" name="cardCVC" maxlength="4">
                                </div>
                            </div>
                        </div>

                        <div id="bankTransferDetails{{ $suite->id }}" style="display:none;">
                            <div class="mb-3">
                                <label class="form-label">Bank Name</label>
                                <input type="text" class="form-control" name="bankName">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Account Number</label>
                                <input type="text" class="form-control" name="accountNumber">
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Transaction Reference</label>
                                <input type="text" class="form-control" name="reference">
                            </div>
                        </div>

                        <input type="hidden" name="suite_id" value="{{ $suite->id ?? 0 }}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-info">
                            <i class="bi bi-credit-card me-2"></i> Process Payment
                        </button>
                    </div>
                </form>
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
</section>
   <!-- Why Choose Us Section -->
    <section class="benefits">
        <h2 class="section-title">Why Book a Combo Package?</h2>
        <p class="section-subtitle">Enjoy these benefits when you book your accommodation and vehicle together</p>
        
        <div class="benefits-grid">
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-percentage"></i>
                </div>
                <h3 class="benefit-title">Significant Savings</h3>
                <p class="benefit-desc">Save up to 25% compared to booking separately. Our combo packages offer the best value for your money.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-clock"></i>
                </div>
                <h3 class="benefit-title">Time-Saving</h3>
                <p class="benefit-desc">One simple booking for both your stay and transportation. No need to coordinate multiple reservations.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-headset"></i>
                </div>
                <h3 class="benefit-title">Dedicated Support</h3>
                <p class="benefit-desc">Single point of contact for any questions or changes to your accommodation and vehicle booking.</p>
            </div>
            
            <div class="benefit-card">
                <div class="benefit-icon">
                    <i class="fas fa-gem"></i>
                </div>
                <h3 class="benefit-title">Exclusive Perks</h3>
                <p class="benefit-desc">Special benefits only available with combo packages, like free upgrades or additional amenities.</p>
            </div>
        </div>
    </section>



    <!-- Mobile Bottom Nav -->
   
      @include('userdashboard.nav')
    </main>
            @include('userdashboard.footer') 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- JS to show/hide payment details for all suites -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    @foreach($suites as $suite)
    (function() {
        const suiteId = "{{ $suite->id }}";
        const checkIn = document.getElementById('checkIn' + suiteId);
        const checkOut = document.getElementById('checkOut' + suiteId);
        const amountInput = document.querySelector('#payBookModal' + suiteId + ' .paymentAmount');
        const pricePerDay = parseFloat(amountInput.dataset.price);

        function updateAmount() {
            const inDate = new Date(checkIn.value);
            const outDate = new Date(checkOut.value);
            if (inDate && outDate && outDate > inDate) {
                const diffTime = outDate - inDate;
                const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
                amountInput.value = (pricePerDay * diffDays).toFixed(2);
            }
        }

        checkIn.addEventListener('change', updateAmount);
        checkOut.addEventListener('change', updateAmount);

        // Payment Mode toggle
        const paymentMode = document.getElementById('paymentMode' + suiteId);
        const mobileMoney = document.getElementById('mobileMoneyDetails' + suiteId);
        const card = document.getElementById('cardDetails' + suiteId);
        const bank = document.getElementById('bankTransferDetails' + suiteId);

        paymentMode.addEventListener('change', function() {
            mobileMoney.style.display = 'none';
            card.style.display = 'none';
            bank.style.display = 'none';

            if (this.value === 'mobile_money_payment') mobileMoney.style.display = 'block';
            else if (this.value === 'card') card.style.display = 'block';
            else if (this.value === 'bank_transfer') bank.style.display = 'block';
        });

    })();
    @endforeach

});
</script>
</body>
</html>