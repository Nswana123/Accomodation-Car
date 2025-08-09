        document.addEventListener('DOMContentLoaded', function() {
            // View management
            const currentView = document.getElementById('currentView');
            const views = currentView.children;
            const mobileNavItems = document.querySelectorAll('.mobile-nav-item');
            const navItems = document.querySelectorAll('.nav-item');
            const filterChips = document.querySelectorAll('.filter-chip');
            const propertyCards = document.querySelectorAll('.property-card');
            const userAvatar = document.getElementById('userAvatar');
            const dropdownMenu = document.getElementById('dropdownMenu');
            
            // Show home view by default
            showView('home');
            
            // Mobile navigation
            mobileNavItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const viewName = this.getAttribute('data-view');
                    showView(viewName);
                    
                    // Update active state
                    mobileNavItems.forEach(navItem => navItem.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Desktop navigation
            navItems.forEach(item => {
                item.addEventListener('click', function() {
                    // This would be expanded for each nav item functionality
                    console.log('Nav item clicked');
                });
            });
            
            // Filter chips
            filterChips.forEach(chip => {
                chip.addEventListener('click', function() {
                    filterChips.forEach(c => c.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            
            // Property cards click
            propertyCards.forEach(card => {
                card.addEventListener('click', function() {
                    showView('property-details');
                });
            });
            
            // User dropdown
            userAvatar.addEventListener('click', function(e) {
                e.stopPropagation();
                dropdownMenu.classList.toggle('show');
            });
            
            // Close dropdown when clicking outside
            document.addEventListener('click', function() {
                dropdownMenu.classList.remove('show');
            });
            
            // Rating stars
            const ratingStars = document.querySelectorAll('.rating-star');
            if (ratingStars.length > 0) {
                ratingStars.forEach(star => {
                    star.addEventListener('click', function() {
                        const rating = parseInt(this.getAttribute('data-rating'));
                        
                        // Update all stars up to the clicked one
                        ratingStars.forEach(s => {
                            const sRating = parseInt(s.getAttribute('data-rating'));
                            if (sRating <= rating) {
                                s.classList.add('active');
                            } else {
                                s.classList.remove('active');
                            }
                        });
                    });
                });
            }
            
            // Category rating stars
            const categoryStars = document.querySelectorAll('.category-star');
            if (categoryStars.length > 0) {
                categoryStars.forEach(star => {
                    star.addEventListener('click', function() {
                        const category = this.getAttribute('data-category');
                        const rating = parseInt(this.getAttribute('data-rating'));
                        
                        // Get all stars for this category
                        const categoryStars = document.querySelectorAll(`.category-star[data-category="${category}"]`);
                        
                        // Update all stars up to the clicked one
                        categoryStars.forEach(s => {
                            const sRating = parseInt(s.getAttribute('data-rating'));
                            if (sRating <= rating) {
                                s.classList.add('active');
                            } else {
                                s.classList.remove('active');
                            }
                        });
                    });
                });
            }
            
            // Payment method selection
            const paymentMethods = document.querySelectorAll('.payment-method');
            if (paymentMethods.length > 0) {
                paymentMethods.forEach(method => {
                    method.addEventListener('click', function() {
                        paymentMethods.forEach(m => m.classList.remove('active'));
                        this.classList.add('active');
                    });
                });
            }
            
            // Function to show a specific view
            function showView(viewName) {
                // Hide all views
                for (let i = 0; i < views.length; i++) {
                    views[i].classList.add('hidden');
                }
                
                // Show the selected view
                const viewClass = viewName === 'home' ? 'home-view' : viewName + '-view';
                const viewToShow = document.querySelector('.' + viewClass);
                
                if (viewToShow) {
                    viewToShow.classList.remove('hidden');
                    viewToShow.classList.add('fade-in');
                }
            }
            
            // Initialize date pickers with min dates
            const today = new Date().toISOString().split('T')[0];
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            const tomorrowStr = tomorrow.toISOString().split('T')[0];
            
            const checkinInput = document.getElementById('checkin');
            const checkoutInput = document.getElementById('checkout');
            
            if (checkinInput && checkoutInput) {
                checkinInput.min = today;
                checkinInput.value = today;
                checkoutInput.min = tomorrowStr;
                checkoutInput.value = tomorrowStr;
                
                checkinInput.addEventListener('change', function() {
                    const checkinDate = new Date(this.value);
                    const nextDay = new Date(checkinDate);
                    nextDay.setDate(nextDay.getDate() + 1);
                    checkoutInput.min = nextDay.toISOString().split('T')[0];
                    
                    if (new Date(checkoutInput.value) < nextDay) {
                        checkoutInput.value = nextDay.toISOString().split('T')[0];
                    }
                });
            }
        });
  // Add interactive effects
        document.querySelectorAll('.category-card').forEach(card => {
            // Keyboard navigation
            card.addEventListener('focus', function() {
                this.style.transform = 'translateY(-8px)';
                this.style.boxShadow = '0 10px 25px rgba(0,0,0,0.15)';
                this.querySelector('.category-content').style.transform = 'translateY(0)';
                this.querySelector('.category-content').style.opacity = '1';
            });
            
            card.addEventListener('blur', function() {
                this.style.transform = '';
                this.style.boxShadow = '';
                this.querySelector('.category-content').style.transform = 'translateY(20px)';
                this.querySelector('.category-content').style.opacity = '0.95';
            });

            // Click handler for view buttons
            const button = card.querySelector('.view-button');
            button.addEventListener('click', function(e) {
                e.stopPropagation();
                alert(`Viewing ${card.querySelector('.category-badge').textContent}`);
                // In a real app, this would navigate to the category page
            });
        });
        document.addEventListener('DOMContentLoaded', function() {
    // Mobile menu toggle
    const mobileMenuToggle = document.querySelector('.mobile-menu-toggle');
    const primaryNav = document.querySelector('.primary-nav');
    
    if (mobileMenuToggle && primaryNav) {
        mobileMenuToggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            primaryNav.classList.toggle('active');
            
            // Toggle hamburger icon
            this.querySelector('.hamburger').classList.toggle('active');
        });
    }
    
    // Search toggle for mobile
    const searchToggle = document.querySelector('.search-toggle');
    const searchContainer = document.querySelector('.search-container');
    
    if (searchToggle && searchContainer) {
        searchToggle.addEventListener('click', function() {
            searchContainer.classList.toggle('active');
        });
    }
    
    // Dropdown toggles
    const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
    
    dropdownToggles.forEach(toggle => {
        toggle.addEventListener('click', function() {
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
        });
    });
    
    // User dropdown
    const userAvatarBtn = document.querySelector('.user-avatar-btn');
    const userDropdown = document.querySelector('.user-dropdown .dropdown-menu');
    
    if (userAvatarBtn && userDropdown) {
        userAvatarBtn.addEventListener('click', function(e) {
            e.stopPropagation();
            const isExpanded = this.getAttribute('aria-expanded') === 'true';
            this.setAttribute('aria-expanded', !isExpanded);
            userDropdown.classList.toggle('active');
        });
    }
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        dropdownToggles.forEach(toggle => {
            toggle.setAttribute('aria-expanded', 'false');
        });
        
        if (userDropdown) {
            userDropdown.classList.remove('active');
            userAvatarBtn.setAttribute('aria-expanded', 'false');
        }
    });
});