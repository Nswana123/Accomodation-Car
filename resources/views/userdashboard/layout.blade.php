<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ZambiaStay | Book Accommodations Across Zambia</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="main.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
        :root {
            --primary-color: #0a6fe3;
            --secondary-color: #0056b3;
            --dark-color: #333;
            --light-dark: #666;
            --light-color: #f8f9fa;
            --white: #fff;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --radius: 8px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
            color: var(--dark-color);
            line-height: 1.6;
        }
        
        /* Header Styles */
        header {
            background-color: var(--white);
            box-shadow: var(--shadow);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .logo {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 1.5rem;
            font-weight: bold;
            color: var(--primary-color);
        }
        
        .logo i {
            font-size: 1.8rem;
        }
        
        .search-container {
            flex: 1;
            max-width: 600px;
            margin: 0 2rem;
        }
        
        .search-bar {
            display: flex;
            border: 1px solid #ddd;
            border-radius: var(--radius);
            overflow: hidden;
        }
        
        .search-bar input {
            flex: 1;
            padding: 0.75rem 1rem;
            border: none;
            outline: none;
        }
        
        .search-bar button {
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 0 1.5rem;
            cursor: pointer;
        }
        
        .filter-chips {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.5rem;
            flex-wrap: wrap;
        }
        
        .filter-chip {
            background-color: #f0f0f0;
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            font-size: 0.8rem;
            cursor: pointer;
        }
        
        .filter-chip.active {
            background-color: var(--primary-color);
            color: var(--white);
        }
        
        .user-nav {
            display: flex;
            align-items: center;
            gap: 1.5rem;
        }
        
        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 0.25rem;
            font-size: 0.9rem;
            cursor: pointer;
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            object-fit: cover;
            cursor: pointer;
        }
        
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
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
        
        .dropdown-menu {
            display: none;
            position: absolute;
            top: 70px;
            right: 2rem;
            background-color: var(--white);
            box-shadow: var(--shadow);
            border-radius: var(--radius);
            width: 300px;
            z-index: 1000;
        }
        
        .dropdown-header {
            padding: 1rem;
            border-bottom: 1px solid #eee;
        }
        
        .dropdown-item {
            padding: 0.75rem 1rem;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }
        
        .dropdown-item:hover {
            background-color: #f5f5f5;
        }
        
        /* Main Content Styles */
        .main-content {
            min-height: calc(100vh - 150px);
            padding-bottom: 2rem;
        }
        
        /* Hotel Page Styles */
        .hotels-hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1566073771259-6a8506099945?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80');
            background-size: cover;
            background-position: center;
            color: white;
            padding: 4rem 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .hotels-hero h1 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }
        
        .hotels-hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }
        
        .hotel-search-box {
            background: white;
            border-radius: var(--radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            max-width: 1000px;
            margin: 0 auto;
        }
        
        .search-filters {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
            flex-wrap: wrap;
            justify-content: center;
        }
        
        .filter-option {
            padding: 0.5rem 1rem;
            border-radius: 20px;
            background: #f5f5f5;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }
        
        .filter-option:hover {
            background: #e0e0e0;
        }
        
        .filter-option.active {
            background: var(--primary-color);
            color: white;
        }
        
        .breadcrumb {
            padding: 1rem 2rem;
            font-size: 0.9rem;
            color: var(--light-dark);
        }
        
        .breadcrumb a {
            color: var(--primary-color);
            text-decoration: none;
        }
        
        .sort-filter-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 2rem;
            background: var(--white);
            margin-bottom: 1rem;
            flex-wrap: wrap;
            gap: 1rem;
        }
        
        .sort-options {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .sort-options select {
            padding: 0.5rem;
            border-radius: var(--radius);
            border: 1px solid #ddd;
        }
        
        .hotel-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
            padding: 0 2rem;
            margin: 2rem 0;
        }
        
        .hotel-card {
            background: var(--white);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
        }
        
        .hotel-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
        }
        
        .hotel-image {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        
        .hotel-badge {
            position: absolute;
            top: 1rem;
            left: 1rem;
            background: var(--primary-color);
            color: white;
            padding: 0.25rem 0.75rem;
            border-radius: 4px;
            font-size: 0.8rem;
            font-weight: bold;
        }
        
        .hotel-info {
            padding: 1.5rem;
        }
        
        .hotel-name {
            font-size: 1.25rem;
            margin-bottom: 0.5rem;
            color: var(--dark-color);
        }
        
        .hotel-location {
            color: var(--light-dark);
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
        }
        
        .hotel-description {
            margin-bottom: 1rem;
            color: #555;
            font-size: 0.9rem;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
        
        .hotel-price {
            font-weight: bold;
            font-size: 1.2rem;
            margin-bottom: 1rem;
            color: var(--primary-color);
        }
        
        .hotel-rating {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-bottom: 1rem;
        }
        
        .hotel-rating .stars {
            color: #FFD700;
        }
        
        .hotel-rating span {
            font-size: 0.9rem;
            color: var(--light-dark);
        }
        
        .hotel-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .view-details {
            background: var(--primary-color);
            color: var(--white);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: var(--radius);
            cursor: pointer;
            transition: background 0.3s;
            text-decoration: none;
            display: inline-block;
            font-size: 0.9rem;
        }
        
        .view-details:hover {
            background: var(--secondary-color);
        }
        
        .favorite-btn {
            background: none;
            border: none;
            font-size: 1.2rem;
            color: #ccc;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .favorite-btn:hover, .favorite-btn.active {
            color: #ff4757;
            transform: scale(1.1);
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin: 2rem 0;
            flex-wrap: wrap;
        }
        
        .page-btn {
            padding: 0.5rem 1rem;
            border: 1px solid #ddd;
            background: var(--white);
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .page-btn:hover {
            background: #f0f0f0;
        }
        
        .page-btn.active {
            background: var(--primary-color);
            color: var(--white);
            border-color: var(--primary-color);
        }
        
        .trust-indicators {
            display: flex;
            justify-content: center;
            gap: 2rem;
            padding: 2rem;
            background: var(--white);
            margin-top: 2rem;
            flex-wrap: wrap;
        }
        
        .trust-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.9rem;
            color: var(--light-dark);
        }
        
        .trust-item i {
            color: var(--primary-color);
            font-size: 1.2rem;
        }
        
        /* Footer Styles */
        footer {
            background-color: #222;
            color: var(--white);
            padding: 3rem 2rem 1.5rem;
        }
        
        .footer-container {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .footer-column h3 {
            color: var(--white);
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
            background-color: var(--primary-color);
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
            color: var(--primary-color);
        }
        
        .footer-social {
            display: flex;
            gap: 1rem;
            margin-top: 1rem;
        }
        
        .footer-social a {
            color: var(--white);
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
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 2rem;
            margin-top: 2rem;
            border-top: 1px solid #444;
            color: #999;
            font-size: 0.9rem;
        }
        
        /* Mobile Bottom Nav */
        .mobile-nav {
            display: none;
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: var(--white);
            box-shadow: 0 -2px 10px rgba(0,0,0,0.1);
            padding: 0.5rem 0;
            z-index: 1000;
        }
        
        .mobile-nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-decoration: none;
            color: var(--light-dark);
            font-size: 0.8rem;
            flex: 1;
        }
        
        .mobile-nav-item i {
            font-size: 1.2rem;
            margin-bottom: 0.25rem;
        }
        
        .mobile-nav-item.active {
            color: var(--primary-color);
        }
        
        /* Responsive adjustments */
        @media (max-width: 992px) {
            .search-container {
                margin: 0 1rem;
            }
            
            .user-nav {
                gap: 1rem;
            }
        }
        
        @media (max-width: 768px) {
            header {
                padding: 1rem;
                flex-wrap: wrap;
            }
            
            .logo {
                order: 1;
            }
            
            .search-container {
                order: 3;
                margin: 1rem 0 0;
                width: 100%;
            }
            
            .user-nav {
                order: 2;
                gap: 0.75rem;
            }
            
            .nav-item span {
                display: none;
            }
            
            .hotels-hero {
                padding: 3rem 1rem;
            }
            
            .hotels-hero h1 {
                font-size: 2rem;
            }
            
            .hotel-grid {
                grid-template-columns: 1fr;
                padding: 0 1rem;
            }
            
            .sort-filter-bar {
                padding: 0.5rem 1rem;
                flex-direction: column;
                align-items: flex-start;
            }
            
            .mobile-nav {
                display: flex;
            }
            
            .main-content {
                padding-bottom: 60px; /* Space for mobile nav */
            }
        }
        
        @media (max-width: 576px) {
            .hotel-search-box {
                padding: 1rem;
            }
            
            .search-filters {
                gap: 0.5rem;
            }
            
            .filter-option {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
            }
            
            .hotel-info {
                padding: 1rem;
            }
            
            .footer-container {
                grid-template-columns: 1fr;
            }
        }
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

/* Logo styles */
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

/* Dropdown navigation */
.dropdown {
    position: relative;
}

.dropdown-toggle {
    background: none;
    border: none;
    color: var(--text-light);
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
    background-color: var(--bg);
    border-radius: var(--radius-sm);
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
    color: var(--text);
    text-decoration: none;
    transition: background-color 0.2s;
}

.dropdown-item:hover {
    background-color: var(--bg-light);
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
    border-bottom: 1px solid var(--border);
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
    color: var(--text-light);
}

.dropdown-divider {
    height: 1px;
    background-color: var(--border);
    margin: 0.5rem 0;
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
.filter-option.active {
    background-color: #007BFF;
    color: white;
    border-radius: 5px;
}
    </style>
</head>