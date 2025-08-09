<!DOCTYPE html>
<html lang="en">
  @include('userdashboard.layout')
  <style>
.hotel-header {
    height: 500px;
    position: relative;
    overflow: hidden;
    border-radius: 10px;
}

.carousel-background {
    height: 100%;
    background-size: cover;
    background-position: center;
    position: relative;
}

.overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.55);
    z-index: 1;
}

.hotel-header-content {
    position: relative;
    z-index: 2;
}
 .hotel-gallery {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .gallery-main {
        width: 100%;
        max-width: 800px;
        overflow: hidden;
        border-radius: 10px;
    }

    .main-img {
        width: 100%;
        height: auto;
        object-fit: cover;
    }

    .gallery-thumbnails {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 10px;
    }

    .gallery-thumb {
        width: 120px;
        height: 80px;
        overflow: hidden;
        cursor: pointer;
        border: 2px solid transparent;
        border-radius: 5px;
    }

    .gallery-thumb:hover,
    .gallery-thumb.active {
        border-color: #007bff;
    }

    .thumb-img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .thumb-img:hover {
        transform: scale(1.05);
    }
    .amenities-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: flex-start;
}

.amenity-card {
    flex: 0 0 12.5%; /* 8 cards per row */
    box-sizing: border-box;
    background: #f8f9fa; /* light background */
    border-radius: 8px;
    padding: 15px 10px;
    text-align: center;
    cursor: default;
    transition: background-color 0.3s ease;
}

.amenity-card:hover {
    background-color: #e2e6ea;
}

.amenity-icon {
    font-size: 2.2rem;
    color: #007bff; /* bootstrap primary color */
    margin-bottom: 8px;
}

.amenity-name {
    font-size: 0.875rem;
    font-weight: 600;
    color: #212529; /* dark text */
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
}
/* Room Card Styling */
.section {
    padding: 40px 0;
    max-width: 1200px;
    margin: 0 auto;
}

.section-title {
    font-size: 28px;
    margin-bottom: 30px;
    color: #333;
    text-align: center;
}

.room-types {
    display: flex;
    flex-direction: column;
    gap: 30px;
}

.room-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.room-summary {
    display: flex;
    padding: 20px;
    gap: 20px;
}

.room-image-container {
    width: 300px;
    height: 200px;
    flex-shrink: 0;
    border-radius: 6px;
    overflow: hidden;
}

.room-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.room-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.room-header {
    margin-bottom: 10px;
}

.room-name {
    font-size: 22px;
    margin: 0 0 5px 0;
    color: #222;
}

.room-availability {
    display: flex;
    align-items: center;
    gap: 8px;
    color: #555;
    font-size: 14px;
}

.room-availability i {
    color: #666;
}

.room-price-container {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.room-price {
    font-size: 20px;
    font-weight: 600;
    color: #222;
    margin: 0;
}

.price-subtext {
    font-size: 14px;
    font-weight: normal;
    color: #666;
}

.toggle-details {
    background: none;
    border: none;
    color: #0066cc;
    cursor: pointer;
    font-size: 14px;
    padding: 5px 10px;
    border-radius: 4px;
}

.toggle-details:hover {
    background: #f0f7ff;
}

.room-details {
    padding: 0 20px 20px 20px;
    border-top: 1px solid #eee;
    margin-top: 10px;
}

.room-description {
    color: #555;
    line-height: 1.6;
    margin-bottom: 20px;
}

.room-amenities {
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 25px;
}

.room-amenity {
    background: #f5f5f5;
    padding: 6px 12px;
    border-radius: 20px;
    font-size: 13px;
    color: #444;
}

/* Booking Form Styling */
.booking-form {
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
}

.form-title {
    margin-top: 0;
    margin-bottom: 20px;
    font-size: 18px;
    color: #333;
}

.form-row {
    display: flex;
    gap: 20px;
    margin-bottom: 15px;
}

.form-group {
    flex: 1;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    font-size: 14px;
    color: #555;
    font-weight: 500;
}

.form-control {
    width: 100%;
    padding: 10px 12px;
    border: 1px solid #ddd;
    border-radius: 4px;
    font-size: 14px;
    background: white;
}

.date-input {
    position: relative;
}

.date-placeholder {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 14px;
    pointer-events: none;
}

.form-control[type="date"] {
    position: relative;
    color: transparent; /* Hide the default text */
}

.form-control[type="date"]:focus {
    color: inherit; /* Show text when focused */
}

.booking-form-container {
    margin-top: 20px;
    background: #f9f9f9;
    padding: 20px;
    border-radius: 8px;
}

.booking-form-layout {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
}

.form-fields-column {
    flex: 1;
    min-width: 300px;
}

.room-selection-column {
    flex: 1;
    min-width: 300px;
}

.form-submit-column {
    flex-basis: 100%;
}

.unit-selection-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
    gap: 15px;
    margin-top: 15px;
}

.unit-card {
    background: white;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
}

.unit-select-label {
    display: block;
    cursor: pointer;
    padding: 15px;
}

.unit-radio {
    display: none;
}

.unit-radio:checked + .unit-card-content {
    border: 2px solid #0066cc;
    background-color: #f0f7ff;
}

.unit-card-content {
    padding: 10px;
    border-radius: 6px;
    border: 2px solid transparent;
}

.unit-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 10px;
}

.unit-header h6 {
    margin: 0;
    font-size: 16px;
    color: #333;
}

.unit-price {
    font-weight: bold;
    color: #0066cc;
}

.unit-details {
    font-size: 14px;
    color: #555;
}

.unit-feature {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 5px;
}

.unit-feature i {
    color: #666;
    width: 16px;
    text-align: center;
}

.date-input {
    position: relative;
}

.date-placeholder {
    position: absolute;
    left: 12px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 14px;
    pointer-events: none;
}

.form-control[type="date"] {
    position: relative;
    color: transparent;
}

.form-control[type="date"]:focus {
    color: inherit;
}

.book-now-btn {
    background: #0066cc;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 4px;
    font-size: 16px;
    font-weight: 500;
    cursor: pointer;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background 0.2s;
    margin-top: 20px;
}

.book-now-btn:hover {
    background: #0052a3;
}

.book-now-btn i {
    font-size: 14px;
}
.select-with-badges option {
    padding: 8px 12px;
    border-bottom: 1px solid #eee;
}

.option-main {
    display: block;
    font-weight: 500;
    margin-bottom: 3px;
}

.price-badge {
    float: right;
    background: #f0f7ff;
    color: #0066cc;
    padding: 2px 6px;
    border-radius: 4px;
    font-size: 0.9em;
}

.option-details {
    display: block;
    font-size: 0.85em;
    color: #666;
}
</style>
<body>
    
  @include('userdashboard.header')

    <!-- Main Content -->
  <main class="main-content" role="main">
<div id="hotelHeaderCarousel" class="carousel slide hotel-header" data-bs-ride="carousel">
    <div class="carousel-inner">
        @foreach($provider->images as $key => $image)
            <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                <div class="carousel-background" style="background-image: url('{{ asset('storage/' . $image->image) }}');">
                    <div class="overlay"></div>

                    <!-- Hotel Header Content Overlay -->
                    <div class="hotel-header-content text-white d-flex flex-column justify-content-center h-100 p-5">
                        <h1 class="hotel-title">{{ $provider->name }}</h1>

                        <div class="hotel-location-rating my-2">
                            <div class="hotel-location mb-1">
                                <i class="fas fa-map-marker-alt"></i>
                                <span>{{ $provider->location }}</span>
                            </div>
                            <div class="hotel-rating">
                                <div class="stars text-warning">
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i><i class="fas fa-star"></i>
                                    <i class="fas fa-star-half-alt"></i>
                                </div>
                                <span class="text-light">4.6 (342 reviews)</span>
                            </div>
                        </div>

                        @php
                            $iconMap = [
                                'luxury' => 'fas fa-crown',
                                'free wifi' => 'fas fa-wifi',
                                'swimming pool' => 'fas fa-swimming-pool',
                                'spa' => 'fas fa-spa',
                                'restaurant' => 'fas fa-utensils',
                                'gym' => 'fas fa-dumbbell',
                                'bar' => 'fas fa-glass-martini-alt',
                                'parking' => 'fas fa-parking',
                                'air conditioning' => 'fas fa-fan',
                                'laundry' => 'fas fa-soap',
                                'tv' => 'fas fa-tv',
                                'pet friendly' => 'fas fa-dog',
                            ];
                        @endphp

                        <div class="hotel-badges mt-3 d-flex flex-wrap">
                            @foreach($provider->amenities as $amenity)
                                @php
                                    $name = is_object($amenity) ? strtolower($amenity->name) : strtolower($amenity);
                                    $icon = $iconMap[$name] ?? 'fas fa-check-circle';
                                @endphp
                                <div class="badge bg-light text-dark me-2 mb-2 px-3 py-1 rounded-pill d-flex align-items-center gap-2">
                                    <i class="{{ $icon }}"></i>
                                    <span>{{ ucwords($name) }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#hotelHeaderCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#hotelHeaderCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
    </button>
</div>
<section class="section">
    <h2 class="section-title">Gallery</h2>
    <div class="hotel-gallery">
        @if($provider->images->count() > 0)
            <div class="gallery-main">
                <img id="mainGalleryImg" src="{{ asset('storage/' . $provider->images[0]->image) }}"
                     alt="{{ $provider->name }} Image"
                     class="gallery-img main-img">
            </div>
            <div class="gallery-thumbnails d-flex flex-wrap gap-2 mt-3">
                @foreach($provider->images as $image)
                    <div class="gallery-thumb">
                        <img src="{{ asset('storage/' . $image->image) }}"
                             alt="{{ $provider->name }} Thumbnail"
                             class="gallery-img thumb-img"
                             onclick="updateMainImage(this)">
                    </div>
                @endforeach
            </div>
        @else
            <p>No images available for this provider.</p>
        @endif
    </div>
</section>
<!-- Description -->
<section class="section">
    <h2 class="section-title">About {{ $provider->name }}</h2>
    <p>{{ $provider->description ?? 'No description available at the moment.' }}</p>
</section>
<!-- Amenities -->
<section class="section">
    <h2 class="section-title mb-4">Amenities</h2>

    @php
        $iconMap = [
              'luxury' => 'fas fa-crown',
                                'free wifi' => 'fas fa-wifi',
                                'swimming pool' => 'fas fa-swimming-pool',
                                'spa' => 'fas fa-spa',
                                'restaurant' => 'fas fa-utensils',
                                'gym' => 'fas fa-dumbbell',
                                'bar' => 'fas fa-glass-martini-alt',
                                'parking' => 'fas fa-parking',
                                'air conditioning' => 'fas fa-fan',
                                'laundry' => 'fas fa-soap',
                                'tv' => 'fas fa-tv',
                                'pet friendly' => 'fas fa-dog',
        ];
    @endphp

    <div class="amenities-grid">
        @foreach($provider->amenities as $amenity)
            @php
                $nameLower = strtolower($amenity->name);
                $iconClass = $iconMap[$nameLower] ?? 'fas fa-check-circle';
            @endphp
            <div class="amenity-card">
                <i class="{{ $iconClass }} amenity-icon"></i>
                <div class="amenity-name">{{ $amenity->name }}</div>
            </div>
        @endforeach
    </div>
</section>

<!-- Room Types -->
<section class="section">
    <h2 class="section-title">Room Categories</h2>
    <div class="room-types">
        @foreach($provider->unitType as $unitType)
            @if($unitType->units->count() > 0)
                <div class="room-card">
                    <div class="room-summary">
                        <div class="room-image-container">
                            @if($unitType->images->first())
                                <img src="{{ asset($unitType->images->first()->image) }}" alt="{{ $unitType->name }}" class="room-image">
                            @else
                                <img src="https://via.placeholder.com/300x200?text=No+Image" alt="No image available" class="room-image">
                            @endif
                        </div>
                        <div class="room-info">
                            <div class="room-header">
                                <h3 class="room-name">{{ $unitType->name }}</h3>
                                <div class="room-availability">
                                    <i class="fas fa-bed"></i>
                                    <span>{{ $unitType->units->count() }} rooms available</span>
                                </div>
                            </div>
                            <div class="room-price-container">
                                <p class="room-price">ZMW {{ number_format($unitType->price, 2) }} <span class="price-subtext">/ night</span></p>
                                <button class="toggle-details">Hide Details</button>
                            </div>
                        </div>
                    </div>
                    <div class="room-details" style="display: block;">
                        <p class="room-description">{{ $unitType->description }}</p>
                        <div class="room-amenities">
                            @foreach($unitType->amenities as $amenity)
                                <span class="room-amenity">{{ $amenity->name }}</span>
                            @endforeach
                        </div>
                        
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
                               <h4 class="form-title">Book This Room</h4>
    <form action="{{ route('bookings.store') }}" method="POST" class="booking-form-layout" id="bookingForm">
    @csrf
    <input type="hidden" name="unit_type_id" value="{{ $unitType->id }}">
    
    <!-- Left Column - Form Fields -->
    <div class="form-fields-column">
        <div class="form-group">
            <label for="check-in-{{ $unitType->id }}">Check-in Date</label>
            <div class="date-input">
                <input type="date" id="check-in-{{ $unitType->id }}" name="check_in" class="form-control" required>
                <span class="date-placeholder">dd / mm / yyyy</span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="check-out-{{ $unitType->id }}">Check-out Date</label>
            <div class="date-input">
                <input type="date" id="check-out-{{ $unitType->id }}" name="check_out" class="form-control" required>
                <span class="date-placeholder">dd / mm / yyyy</span>
            </div>
        </div>
        
        <div class="form-group">
            <label for="guests-{{ $unitType->id }}">Guests</label>
            <select id="guests-{{ $unitType->id }}" name="guests" class="form-control" required>
                @php
                    $maxCapacity = $unitType->units->max('capacity') ?? $unitType->capacity;
                @endphp
                @for($i = 1; $i <= $maxCapacity; $i++)
                    <option value="{{ $i }}" {{ $i == 1 ? 'selected' : '' }}>
                        {{ $i }} {{ Str::plural('Adult', $i) }}
                    </option>
                @endfor
            </select>
        </div>
    </div>
    
    <!-- Right Column - Room Selection -->
    <div class="room-selection-column">
        <h5>Available Rooms</h5>
        <div class="unit-selection-grid">
            @foreach($unitType->units as $unit)
            <div class="unit-card">
                <label class="unit-select-label">
                    <input type="radio" name="unit_id" value="{{ $unit->id }}" required 
                           class="unit-radio" data-daily-price="{{ $unit->price_per_day ?? $unitType->price }}" 
                           {{ $loop->first ? 'checked' : '' }}>
                    <div class="unit-card-content">
                        <div class="unit-header">
                            <h6>{{ $unit->name }}</h6>
                            <span class="unit-price">ZMW {{ number_format($unit->price_per_day ?? $unitType->price, 2) }}</span>
                        </div>
                        <div class="unit-details">
                            <div class="unit-feature">
                                <i class="fas fa-users"></i>
                                <span>Capacity: {{ $unit->capacity }}</span>
                            </div>
                        </div>
                    </div>
                </label>
            </div>
            @endforeach
        </div>
    </div>
    
    <!-- Hidden payment fields -->
    <input type="hidden" name="method" id="hiddenMethod">
    <input type="hidden" name="amount" id="hiddenAmount">
    <input type="hidden" name="payment_number" id="hiddenPaymentNumber">
    <input type="hidden" name="reference" id="hiddenReference">
    <input type="hidden" name="cardNumber" id="hiddenCardNumber">
    <input type="hidden" name="cardExpiry" id="hiddenCardExpiry">
    <input type="hidden" name="cardCVC" id="hiddenCardCVC">
    <input type="hidden" name="bankName" id="hiddenBankName">
    <input type="hidden" name="accountNumber" id="hiddenAccountNumber">
    
    <!-- Submit Button -->
    <div class="form-submit-column">
        <button type="button" class="book-now-btn" data-bs-toggle="modal" data-bs-target="#payBookModal">
            <i class="fas fa-calendar-check"></i> Book {{ $unitType->name }}
        </button>
    </div>
</form>

    <!-- Pay & Book Modal -->
<div class="modal fade" id="payBookModal" tabindex="-1" aria-labelledby="payBookModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payBookModalLabel">Complete Your Booking & Payment</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
 <div class="mb-4">
                    <h6>Booking Summary</h6>
                    <div id="bookingSummary">
                        <!-- Will be populated by JavaScript -->
                    </div>
                </div>
                <!-- Payment Form -->
                <div class="mb-4">
                    <label for="paymentMode" class="form-label">Payment Mode</label>
                    <select class="form-select" id="paymentMode" name="method" required>
                        <option value="" selected disabled>Select Payment Mode</option>
                         <option value="Cash">Cash</option>
                        <option value="mobile_money_payment">Mobile Money Payment</option>
                        <option value="card">Credit/Debit Card</option>
                        <option value="bank_transfer">Bank Transfer</option>
                    </select>
                    <div class="invalid-feedback">Please select a payment mode.</div>
                </div>

                <!-- Payment Amount -->
               <div class="mb-4">
    <label for="paymentAmount" class="form-label">Amount (ZMK)</label>
    <input type="number" 
           class="form-control" 
           id="paymentAmount" 
           name="amount" 
           min="0" 
           step="0.01" 
           required 
           value="{{ $unitType->units->first()->price_per_day ?? $unitType->price }}">
</div>

                <!-- Mobile Money -->
                <div id="mobileMoneyDetails" style="display:none;">
                    <div class="mb-3">
                        <label for="paymentNumber" class="form-label">Mobile Money Number</label>
                        <input type="text" class="form-control" id="paymentNumber" name="payment_number">
                    </div>
                    <div class="mb-3">
                        <label for="paymentReference" class="form-label">Transaction Reference</label>
                        <input type="text" class="form-control" id="paymentReference" name="reference">
                    </div>
                </div>

                <!-- Card Payment -->
                <div id="cardDetails" style="display:none;">
                    <div class="mb-3">
                        <label for="cardNumber" class="form-label">Card Number</label>
                        <input type="text" class="form-control" id="cardNumber" name="cardNumber" maxlength="19">
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cardExpiry" class="form-label">Expiry Date (MM/YY)</label>
                            <input type="text" class="form-control" id="cardExpiry" name="cardExpiry" maxlength="5">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cardCVC" class="form-label">CVC</label>
                            <input type="text" class="form-control" id="cardCVC" name="cardCVC" maxlength="4">
                        </div>
                    </div>
                </div>

                <!-- Bank Transfer -->
                <div id="bankTransferDetails" style="display:none;">
                    <div class="mb-3">
                        <label for="bankName" class="form-label">Bank Name</label>
                        <input type="text" class="form-control" id="bankName" name="bankName">
                    </div>
                    <div class="mb-3">
                        <label for="accountNumber" class="form-label">Account Number</label>
                        <input type="text" class="form-control" id="accountNumber" name="accountNumber">
                    </div>
                    <div class="mb-3">
                        <label for="transactionReference" class="form-label">Transaction Reference</label>
                        <input type="text" class="form-control" id="transactionReference" name="reference">
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" id="initiatePaymentBtn" class="btn btn-info">
                    <i class="bi bi-credit-card me-2"></i> Process Payment
                </button>
            </div>
        </div>
    </div>
</div>

                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</section>
    <!-- Mobile Bottom Nav -->
   
      @include('userdashboard.nav')
    </main>
            @include('userdashboard.footer') 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
   <script>
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

document.addEventListener('DOMContentLoaded', function() {
    // When a specific room is selected, update guest capacity
    document.querySelectorAll('select[name="unit_id"]').forEach(roomSelect => {
        roomSelect.addEventListener('change', function() {
            const unitId = this.value;
            const guestSelect = this.closest('.room-card').querySelector('.guests-select');
            
            if (unitId) {
                // Get capacity from data attribute of selected option
                const selectedOption = this.options[this.selectedIndex];
                const capacity = selectedOption.dataset.capacity;
                
                // Update guest options
                updateGuestOptions(guestSelect, capacity);
            } else {
                // Reset to default capacity
                const defaultCapacity = guestSelect.dataset.defaultCapacity;
                updateGuestOptions(guestSelect, defaultCapacity);
            }
        });
    });
    
    function updateGuestOptions(selectElement, capacity) {
        // Clear existing options
        selectElement.innerHTML = '';
        
        // Add new options up to the capacity
        for (let i = 1; i <= capacity; i++) {
            const option = document.createElement('option');
            option.value = i;
            option.textContent = i + ' ' + (i === 1 ? 'Adult' : 'Adults');
            if (i === 1) option.selected = true;
            selectElement.appendChild(option);
        }
    }
});

/// payment model
document.addEventListener('DOMContentLoaded', function() {
    const bookingForm = document.getElementById('bookingForm');
    const checkInInput = document.querySelector('input[name="check_in"]');
    const checkOutInput = document.querySelector('input[name="check_out"]');
    const unitRadios = document.querySelectorAll('.unit-radio');
    const paymentAmountInput = document.getElementById('paymentAmount');
    const bookingSummary = document.getElementById('bookingSummary');
    
    // Payment method toggle
    const paymentMode = document.getElementById('paymentMode');
    const mobileMoneyDetails = document.getElementById('mobileMoneyDetails');
    const cardDetails = document.getElementById('cardDetails');
    const bankTransferDetails = document.getElementById('bankTransferDetails');
    
    paymentMode.addEventListener('change', function() {
        mobileMoneyDetails.style.display = 'none';
        cardDetails.style.display = 'none';
        bankTransferDetails.style.display = 'none';
        
        switch(this.value) {
            case 'mobile_money_payment':
                mobileMoneyDetails.style.display = 'block';
                break;
            case 'card':
                cardDetails.style.display = 'block';
                break;
            case 'bank_transfer':
                bankTransferDetails.style.display = 'block';
                break;
        }
    });
    
    // Calculate and update booking summary
    function updateBookingSummary() {
        const checkIn = new Date(checkInInput.value);
        const checkOut = new Date(checkOutInput.value);
        const selectedUnit = document.querySelector('.unit-radio:checked');
        
        if (!checkInInput.value || !checkOutInput.value || !selectedUnit) {
            return;
        }
        
        // Calculate days
        const timeDiff = checkOut.getTime() - checkIn.getTime();
        const days = Math.ceil(timeDiff / (1000 * 3600 * 24));
        
        // Get unit price
        const dailyPrice = parseFloat(selectedUnit.dataset.dailyPrice);
        const totalAmount = dailyPrice * days;
        
        // Update summary
        bookingSummary.innerHTML = `
            <p>Unit: ${selectedUnit.closest('.unit-card').querySelector('h6').textContent}</p>
            <p>Check-in: ${checkIn.toDateString()}</p>
            <p>Check-out: ${checkOut.toDateString()}</p>
            <p>Duration: ${days} night(s)</p>
            <p>Price per night: ZMW ${dailyPrice.toFixed(2)}</p>
            <p><strong>Total: ZMW ${totalAmount.toFixed(2)}</strong></p>
        `;
        
        // Update payment amount
        paymentAmountInput.value = totalAmount.toFixed(2);
    }
    
    // Add event listeners for calculation
    checkInInput.addEventListener('change', updateBookingSummary);
    checkOutInput.addEventListener('change', updateBookingSummary);
    unitRadios.forEach(radio => {
        radio.addEventListener('change', updateBookingSummary);
    });
    
    // Initial calculation if values exist
    updateBookingSummary();
    
    // Handle payment submission
    document.getElementById('initiatePaymentBtn').addEventListener('click', function() {
        const method = paymentMode.value;
        const amount = paymentAmountInput.value;
        
        if (!method) {
            alert('Please select a payment method');
            return;
        }
        
        if (!amount || parseFloat(amount) <= 0) {
            alert('Invalid amount calculation. Please check your dates.');
            return;
        }
        
        // Set hidden form values
        document.getElementById('hiddenMethod').value = method;
        document.getElementById('hiddenAmount').value = amount;
        
        // Set payment method specific fields
        if (method === 'mobile_money_payment') {
            document.getElementById('hiddenPaymentNumber').value = document.getElementById('paymentNumber').value;
            document.getElementById('hiddenReference').value = document.getElementById('paymentReference').value;
        } else if (method === 'card') {
            document.getElementById('hiddenCardNumber').value = document.getElementById('cardNumber').value;
            document.getElementById('hiddenCardExpiry').value = document.getElementById('cardExpiry').value;
            document.getElementById('hiddenCardCVC').value = document.getElementById('cardCVC').value;
        } else if (method === 'bank_transfer') {
            document.getElementById('hiddenBankName').value = document.getElementById('bankName').value;
            document.getElementById('hiddenAccountNumber').value = document.getElementById('accountNumber').value;
            document.getElementById('hiddenReference').value = document.getElementById('transactionReference').value;
        }
        
        // Submit the form
        bookingForm.submit();
    });
});
</script>
</body>
</html>