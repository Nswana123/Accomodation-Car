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
        }

        .filter-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
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

 
        <!-- Featured Cars -->
        <section>
            <h2 class="section-title">
                Featured Vehicles
                <a href="#" class="view-all">View all</a>
            </h2>
        </section>                  
      
   <div class="row">
    @foreach($provider->unitType as $type)
        @foreach($type->units as $unit)
            <div class="col-md-3 mb-4"> <!-- 4 columns per row -->
                <div class="car-card">
                    <div class="car-image-container">
                        @if($unit->images->count())
                            <img src="{{ asset('storage/' . $unit->images->first()->image_path) }}" 
                                 alt="{{ $unit->name }}" class="car-image">
                        @else
                            <img src="https://via.placeholder.com/300x200" alt="{{ $unit->name }}" class="car-image">
                        @endif
                        <div class="car-badge">Popular</div>
                    </div>

                    <div class="car-info">
                        <div class="car-title">
                            <h3>{{ $unit->name }}</h3>
                            <span class="car-price">ZMW {{ number_format($unit->price_per_day, 2) }}/day</span>
                        </div>

                        <div class="car-specs">
                            <span class="car-spec"><i class="fas fa-car"></i> {{ $unit->type ?? 'N/A' }}</span>
                            <span class="car-spec"><i class="fas fa-cogs"></i> {{ $unit->transmission ?? 'N/A' }}</span>
                            <span class="car-spec"><i class="fas fa-gas-pump"></i> {{ $unit->fuel_type ?? 'N/A' }}</span>
                        </div>

                        <div class="car-features">
                            @foreach($unit->amenities as $amenity)
                                <span class="car-feature">
                                    <i class="{{ $amenity->icon ?? 'fas fa-check' }}"></i> {{ $amenity->name }}
                                </span>
                            @endforeach
                        </div>

                        <div class="car-actions">
                            <div class="car-rating">
                                <i class="fas fa-star"></i>
                                <span>{{ $unit->rating ?? '4.8' }} ({{ $unit->reviews_count ?? '124' }})</span>
                            </div>
                            <button class="btn btn-primary btn-sm">Book Now</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach
</div>


</div>

    </div>

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
</script>
</body>
</html>