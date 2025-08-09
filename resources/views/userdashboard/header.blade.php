<header class="main-header">
    <div class="container">
        <!-- Logo with responsive sizing -->
        <a href="index.html" class="logo" aria-label="ZambiaStay Home">
            <svg class="logo-icon" viewBox="0 0 24 24" aria-hidden="true">
                <path d="M12 2L2 7v10l10 5 10-5V7L12 2zm0 2.8L20 9v6l-8 4-8-4V9l8-4.2zM12 15c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2z"/>
            </svg>
            <span class="logo-text">ZambiaStay</span>
        </a>

        <!-- Mobile menu toggle -->
        <button class="mobile-menu-toggle" aria-expanded="false" aria-label="Toggle navigation">
            <span class="hamburger"></span>
        </button>

        <!-- Main navigation -->
        <nav class="primary-nav" aria-label="Main navigation">
            <ul class="nav-list">
                <li><a href="{{ url('/') }}" class="nav-link active" aria-current="page">Home</a></li>
                <li><a href="{{route('accommodation.index')}}" class="nav-link">Accomodation</a></li>
                <li><a href="{{route('car_hire.index')}}" class="nav-link">Car Hire</a></li>
              
                <li><a href="{{route('suites.index')}}" class="nav-link">Combo Offers</a></li>
            </ul>
        </nav>

        <!-- User actions -->
        <div class="user-actions">
            <!-- Search toggle for mobile -->
            <button class="search-toggle" aria-label="Open search">
                <i class="fas fa-search"></i>
            </button>

            <!-- Search bar -->
            <div class="search-container">
                <form role="search" class="search-form">
                    <input type="search" placeholder="Search hotels..." aria-label="Search hotels" class="search-input">
                    <button type="submit" class="search-button" aria-label="Submit search">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>

            <!-- Auth buttons - visible on desktop -->
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

            <!-- User dropdown - appears when logged in -->
            <div class="user-dropdown">
                <button class="user-avatar-btn" aria-expanded="false" aria-label="User menu">
                    <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="User profile" class="user-avatar">
                    <span class="user-name">John</span>
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