<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZambiaStay - Premium Accommodations</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
:root {
    --electric-blue: #ffffffff;
    --violet: #d2d2d2ff;
    --hot-pink: #FF2DA5;
    --cyan: #057cfcff; 
    --lime: #22FF88;
    --gold: #FFD700;
    --dark-1: #efefefff;
    --dark-2: #141414;
    --dark-3: #4f4d4dff;
    --dark-4: #8d8a8aff;
    --light: #FFFFFF;
    --gray: #B0B0B0;
    --glow-blue: 0 0 20px rgba(255, 255, 255, 0.7);
    --glow-pink: 0 0 20px rgba(255, 45, 165, 0.7);
    --transition: all 0.3s ease;
}
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--dark-1);
            color: var(--light);
            line-height: 1.6;
            padding: 20px;
        }

        .main-header {
            background: rgba(161, 161, 161, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(214, 212, 215, 0.2);
            box-shadow: var(--glow);
            padding: 0.75rem 0;
            border-radius: 12px;
            margin-bottom: 2rem;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }

        .logo {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: var(--light);
            font-weight: 700;
            font-size: 1.5rem;
            transition: var(--transition);
            position: relative;
            z-index: 1001;
        }

        .logo:hover {
            color: var(--primary);
            transform: translateY(-1px);
        }

        .logo-icon {
            width: 32px;
            height: 32px;
            margin-right: 0.5rem;
            fill: var(--primary);
            filter: drop-shadow(0 0 5px rgba(138, 43, 226, 0.5));
        }

        .logo-text {
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            font-weight: 800;
        }

        .mobile-menu-toggle {
            display: none;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            width: 40px;
            height: 40px;
            background: var(--dark-3);
            border: 1px solid var(--dark-4);
            border-radius: 8px;
            cursor: pointer;
            position: relative;
            z-index: 1001;
            transition: var(--transition);
        }

        .mobile-menu-toggle:hover {
            background: var(--dark-4);
            border-color: var(--primary);
            box-shadow: var(--glow);
        }

        .hamburger {
            width: 24px;
            height: 2px;
            background: var(--light);
            position: relative;
            transition: var(--transition);
        }

        .hamburger::before,
        .hamburger::after {
            content: '';
            position: absolute;
            width: 24px;
            height: 2px;
            background: var(--light);
            transition: var(--transition);
        }

        .hamburger::before {
            top: -6px;
        }

        .hamburger::after {
            top: 6px;
        }

        .mobile-menu-toggle[aria-expanded="true"] .hamburger {
            background: transparent;
        }

        .mobile-menu-toggle[aria-expanded="true"] .hamburger::before {
            transform: rotate(45deg);
            top: 0;
        }

        .mobile-menu-toggle[aria-expanded="true"] .hamburger::after {
            transform: rotate(-45deg);
            top: 0;
        }

        .primary-nav {
            margin-left: 2rem;
        }

        .nav-list {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }

        .nav-link {
            color: var(--light);
            text-decoration: none;
            font-weight: 500;
            padding: 0.5rem 0.75rem;
            border-radius: 6px;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, var(--primary), var(--secondary));
            transition: var(--transition);
        }

        .nav-link:hover::before,
        .nav-link.active::before {
            width: 100%;
        }

        .nav-link:hover,
        .nav-link.active {
            color: var(--primary);
            background: rgba(138, 43, 226, 0.1);
        }

        .user-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .search-toggle {
            display: none;
            background: none;
            border: none;
            color: var(--light);
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 50%;
            transition: var(--transition);
        }

        .search-toggle:hover {
            color: var(--primary);
            background: rgba(138, 43, 226, 0.1);
        }

        .search-container {
            position: relative;
            margin-right: 1rem;
        }

        .search-form {
            display: flex;
            align-items: center;
            background: var(--dark-3);
            border: 1px solid var(--dark-4);
            border-radius: 50px;
            overflow: hidden;
            transition: var(--transition);
        }

        .search-form:focus-within {
            border-color: var(--primary);
            box-shadow: var(--glow);
            transform: translateY(-1px);
        }

        .search-input {
            background: transparent;
            border: none;
            color: var(--light);
            padding: 0.75rem 1.25rem;
            width: 280px;
            outline: none;
            font-size: 0.95rem;
        }

        .search-input::placeholder {
            color: var(--gray);
        }

        .search-button {
            background: var(--primary);
            border: none;
            color: var(--light);
            padding: 0.75rem;
            cursor: pointer;
            transition: var(--transition);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .search-button:hover {
            background: var(--primary-dark);
        }

        .auth-buttons {
            display: flex;
            gap: 0.75rem;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.25rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 500;
            transition: var(--transition);
            border: 1px solid transparent;
        }

        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }

        .btn-outline {
            background: transparent;
            border-color: var(--primary);
            color: var(--primary);
        }

        .btn-outline:hover {
            background: rgba(138, 43, 226, 0.1);
            box-shadow: var(--glow);
        }

        .btn-primary {
            background: var(--primary);
            color: var(--light);
        }

        .btn-primary:hover {
            background: var(--primary-dark);
            box-shadow: var(--glow);
            transform: translateY(-2px);
        }

        .user-dropdown {
            position: relative;
        }

        .user-avatar-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: var(--dark-3);
            border: 1px solid var(--dark-4);
            border-radius: 50px;
            padding: 0.35rem 0.75rem 0.35rem 0.35rem;
            cursor: pointer;
            transition: var(--transition);
        }

        .user-avatar-btn:hover {
            background: var(--dark-4);
            border-color: var(--primary);
            box-shadow: var(--glow);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary);
        }

        .user-name {
            font-weight: 500;
            color: var(--light);
        }

        .dropdown-menu {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            width: 280px;
            background: var(--dark-3);
            border: 1px solid var(--dark-4);
            border-radius: 12px;
            padding: 1rem 0;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: var(--transition);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            z-index: 1000;
        }

        .user-dropdown:hover .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0 1.25rem 1rem;
            border-bottom: 1px solid var(--dark-4);
            margin-bottom: 0.5rem;
        }

        .dropdown-header img {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid var(--primary);
        }

        .user-fullname {
            font-weight: 600;
            color: var(--light);
        }

        .user-email {
            font-size: 0.875rem;
            color: var(--gray);
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.25rem;
            color: var(--light);
            text-decoration: none;
            transition: var(--transition);
            font-size: 0.95rem;
        }

        .dropdown-item:hover {
            background: rgba(138, 43, 226, 0.1);
            color: var(--primary);
        }

        .dropdown-divider {
            height: 1px;
            background: var(--dark-4);
            margin: 0.5rem 0;
        }

        /* Notification badge */
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: var(--accent);
            color: white;
            font-size: 0.7rem;
            font-weight: 600;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Responsive styles */
        @media (max-width: 992px) {
            .nav-list {
                gap: 1rem;
            }
            
            .search-input {
                width: 220px;
            }
        }

        @media (max-width: 768px) {
            .mobile-menu-toggle {
                display: flex;
            }
            
            .primary-nav {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100vh;
                background: var(--dark-2);
                margin-left: 0;
                padding: 5rem 2rem 2rem;
                transform: translateX(-100%);
                transition: var(--transition);
                z-index: 999;
                visibility: hidden;
                opacity: 0;
            }
            
            .primary-nav.active {
                transform: translateX(0);
                visibility: visible;
                opacity: 1;
            }
            
            .nav-list {
                flex-direction: column;
                gap: 1.5rem;
            }
            
            .nav-link {
                display: block;
                padding: 1rem 1.5rem;
                border-radius: 8px;
                font-size: 1.2rem;
                background: rgba(138, 43, 226, 0.05);
                border: 1px solid rgba(138, 43, 226, 0.1);
            }
            
            .search-container {
                display: none;
                position: absolute;
                top: 100%;
                left: 0;
                width: 100%;
                padding: 1rem;
                background: var(--dark-2);
                border-top: 1px solid var(--dark-4);
                z-index: 998;
            }
            
            .search-container.active {
                display: block;
            }
            
            .search-form {
                width: 100%;
            }
            
            .search-input {
                width: 100%;
            }
            
            .search-toggle {
                display: block;
                z-index: 1001;
            }
            
            .auth-buttons {
                display: none;
            }
            
            .user-dropdown {
                display: none;
            }
            
            /* Mobile auth buttons */
            .mobile-auth {
                display: flex;
                flex-direction: column;
                gap: 1rem;
                margin-top: 2rem;
                padding-top: 2rem;
                border-top: 1px solid var(--dark-4);
            }
            
            .mobile-auth .btn {
                justify-content: center;
                text-align: center;
                padding: 1rem;
            }
            
            /* Show mobile auth buttons in nav */
            .primary-nav .mobile-auth {
                display: flex;
            }
        }

        /* Demo content */
        .demo-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
            background: var(--dark-2);
            border-radius: 12px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }
        
        .demo-content h1 {
            font-size: 2.5rem;
            margin-bottom: 1.5rem;
            background: linear-gradient(45deg, var(--primary), var(--secondary));
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }
        
        .demo-content p {
            margin-bottom: 1rem;
            color: var(--gray);
        }
        
        .demo-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }
        
        .demo-card {
            background: var(--dark-3);
            border-radius: 12px;
            padding: 1.5rem;
            transition: var(--transition);
            border: 1px solid var(--dark-4);
        }
        
        .demo-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--glow);
            border-color: var(--primary);
        }
        
        .demo-card h3 {
            font-size: 1.25rem;
            margin-bottom: 1rem;
            color: var(--light);
        }
        
        /* Mobile auth buttons container */
        .mobile-auth {
            display: none;
        }
    </style>
</head>
<body>
    <header class="main-header">
        <div class="container">
            <a href="index.html" class="logo" aria-label="ZambiaStay Home">
                <svg class="logo-icon" viewBox="0 0 24 24" aria-hidden="true">
                    <path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.8L20 9v6l-8 4-8-4V9l8-4.2zM12 15c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/>
                </svg>
                <span class="logo-text">ZambiaStay</span>
            </a>

            <button class="mobile-menu-toggle" aria-expanded="false" aria-label="Toggle navigation">
                <span class="hamburger"></span>
            </button>

            <nav class="primary-nav" aria-label="Main navigation">
                <ul class="nav-list">
                    <li><a href="{{ url('/') }}" class="nav-link active" aria-current="page">Home</a></li>
                    <li><a href="{{route('accommodation.index')}}" class="nav-link">Accomodation</a></li>
                    <li><a href="{{route('car_hire.index')}}" class="nav-link">Car Hire</a></li>
                    <li><a href="{{route('suites.index')}}" class="nav-link">Combo Offers</a></li>
                </ul>
                
                <div class="mobile-auth">
                    <a href="#" class="btn btn-outline">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Sign In</span>
                    </a>
                    <a href="#" class="btn btn-primary">
                        <i class="fas fa-user-plus"></i>
                        <span>Sign Up</span>
                    </a>
                </div>
            </nav>

            <div class="user-actions">
                <button class="search-toggle" aria-label="Open search">
                    <i class="fas fa-search"></i>
                </button>

                {{-- <div class="search-container">
                    <form role="search" class="search-form">
                        <input type="search" placeholder="Search hotels, cars, offers..." aria-label="Search accommodations" class="search-input">
                        <button type="submit" class="search-button" aria-label="Submit search">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div> --}}

                <div class="auth-buttons">
                    <a href="#" class="btn btn-outline btn-sm">
                        <i class="fas fa-sign-in-alt"></i>
                        <span>Sign In</span>
                    </a>
                    <a href="#" class="btn btn-primary btn-sm">
                        <i class="fas fa-user-plus"></i>
                        <span>Sign Up</span>
                    </a>
                </div>

                <div class="user-dropdown">
                    <button class="user-avatar-btn" aria-expanded="false" aria-label="User menu">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User profile" class="user-avatar">
                        <span class="user-name">John</span>
                        <span class="notification-badge">3</span>
                    </button>
                    <div class="dropdown-menu">
                        <div class="dropdown-header">
                            <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User profile">
                            <div>
                                <div class="user-fullname">John Banda</div>
                                <div class="user-email">john.banda@example.com</div>
                            </div>
                        </div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-user"></i> My Profile
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-calendar-alt"></i> My Bookings
                            <span class="notification-badge">3</span>
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-cog"></i> Settings
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="demo-content">
        <h1>Welcome to ZambiaStay</h1>
        <p>Your premium destination for accommodations, car rentals, and exclusive combo offers in Zambia. Explore our services and find the perfect travel solution for your needs.</p>
        <p>The header above demonstrates the enhanced dark theme UI with advanced elements while maintaining all original functionality.</p>
        
        <div class="demo-grid">
            <div class="demo-card">
                <h3>Luxury Accommodations</h3>
                <p>Discover our premium selection of hotels, lodges, and vacation rentals across Zambia.</p>
            </div>
            <div class="demo-card">
                <h3>Car Hire Services</h3>
                <p>Choose from our fleet of vehicles for your transportation needs during your stay.</p>
            </div>
            <div class="demo-card">
                <h3>Combo Offers</h3>
                <p>Special packages combining accommodations and transportation at discounted rates.</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
            const primaryNav = document.querySelector('.primary-nav');
            const body = document.querySelector('body');
            
            mobileMenuToggle.addEventListener('click', function() {
                const expanded = this.getAttribute('aria-expanded') === 'true' || false;
                this.setAttribute('aria-expanded', !expanded);
                primaryNav.classList.toggle('active');
                
                // Prevent body scrolling when menu is open
                if (!expanded) {
                    body.style.overflow = 'hidden';
                } else {
                    body.style.overflow = 'auto';
                }
            });
            
            // Search toggle for mobile
            const searchToggle = document.querySelector('.search-toggle');
            const searchContainer = document.querySelector('.search-container');
            
            if (searchToggle) {
                searchToggle.addEventListener('click', function() {
                    searchContainer.classList.toggle('active');
                });
            }
                   mobileMenuToggle.addEventListener('click', function() {
    console.log("Toggled mobile menu"); // Debug
    primaryNav.classList.toggle('active');
});   
            // Close search when clicking outside
            document.addEventListener('click', function(event) {
                if (searchContainer && !event.target.closest('.search-container') && !event.target.closest('.search-toggle')) {
                    searchContainer.classList.remove('active');
                }
                
                // Close mobile menu when clicking on a link
                if (primaryNav.classList.contains('active') && event.target.closest('.nav-link')) {
                    primaryNav.classList.remove('active');
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                    body.style.overflow = 'auto';
                }
            });
            
            // Close menu when pressing Escape key
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape' && primaryNav.classList.contains('active')) {
                    primaryNav.classList.remove('active');
                    mobileMenuToggle.setAttribute('aria-expanded', 'false');
                    body.style.overflow = 'auto';
                }
            });
        });

const searchToggle = document.querySelector('.search-toggle');
const searchContainer = document.querySelector('.search-container');

if (searchToggle && searchContainer) {
    searchToggle.addEventListener('click', function() {
        searchContainer.classList.toggle('active');
    });

    // Close search when clicking outside
    document.addEventListener('click', function(event) {
        if (!event.target.closest('.search-container') && 
            !event.target.closest('.search-toggle')) {
            searchContainer.classList.remove('active');
        }
    });
}

    </script>
</body>
</html>