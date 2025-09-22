<!-- Header/Navbar Component -->
<header class="header">
    <div class="container">
        <div class="header-content">
            <a href="{{ url('/') }}" class="logo">
                <span class="logo-text">connectly</span>
            </a>
            
            <!-- Desktop Navigation -->
            <nav class="nav-links desktop-nav">
                <a href="#products">Products</a>
                <a href="#features">Features</a>
                <a href="#pricing">Pricing</a>
                <a href="#resources">Resources</a>
                <a href="#company">Company</a>
            </nav>
            
            <!-- Desktop Auth Buttons -->
            <div class="auth-buttons desktop-auth">
                <a href="{{ url('/login') }}" class="btn btn-outline">Log in</a>
                <a href="{{ url('/register') }}" class="btn btn-primary">Join now</a>
            </div>

            <!-- Mobile Menu Toggle -->
            <button class="mobile-menu-toggle" onclick="toggleMobileMenu()" aria-label="Toggle menu">
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
                <span class="hamburger-line"></span>
            </button>
        </div>

        <!-- Mobile Navigation Menu -->
        <div class="mobile-menu" id="mobileMenu">
            <nav class="mobile-nav-links">
                <a href="#products" onclick="closeMobileMenu()">Products</a>
                <a href="#features" onclick="closeMobileMenu()">Features</a>
                <a href="#pricing" onclick="closeMobileMenu()">Pricing</a>
                <a href="#resources" onclick="closeMobileMenu()">Resources</a>
                <a href="#company" onclick="closeMobileMenu()">Company</a>
            </nav>
            
            <div class="mobile-auth-buttons">
                <a href="{{ url('/login') }}" class="btn btn-outline" onclick="closeMobileMenu()">Log in</a>
                <a href="{{ url('/register') }}" class="btn btn-primary" onclick="closeMobileMenu()">Join now</a>
            </div>
        </div>
    </div>
</header>

<style>
    /* Header */
    .header {
        background: #ffffff;
        padding: 20px 0;
        border-bottom: 1px solid #f0f0f0;
        position: sticky;
        top: 0;
        z-index: 1000;
        box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
        position: relative;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        color: #1a1a1a;
        z-index: 1001;
    }

    .logo-icon {
        width: 32px;
        height: 32px;
        background: linear-gradient(135deg, #ff4081, #9c27b0);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-weight: bold;
        font-size: 18px;
    }

    .logo-text {
        font-size: 24px;
        font-weight: 800;
    }

    /* Desktop Navigation */
    .desktop-nav {
        display: flex;
        list-style: none;
        gap: 32px;
        align-items: center;
    }

    .desktop-nav a {
        text-decoration: none;
        color: #666;
        font-weight: 500;
        font-size: 15px;
        transition: color 0.3s ease;
        padding: 8px 0;
    }

    .desktop-nav a:hover {
        color: #1a1a1a;
    }

    /* Desktop Auth Buttons */
    .desktop-auth {
        display: flex;
        gap: 12px;
        align-items: center;
    }

    .btn {
        padding: 12px 24px;
        border-radius: 25px;
        text-decoration: none;
        font-weight: 600;
        font-size: 14px;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        display: inline-block;
        text-align: center;
        white-space: nowrap;
    }

    .btn-outline {
        border: 1px solid #e0e0e0;
        color: #666;
        background: transparent;
    }

    .btn-outline:hover {
        border-color: #1a1a1a;
        color: #1a1a1a;
    }

    .btn-primary {
        background: #ff4081;
        color: white;
        border: 1px solid #ff4081;
    }

    .btn-primary:hover {
        background: #e91e63;
        transform: translateY(-1px);
    }

    /* Mobile Menu Toggle Button */
    .mobile-menu-toggle {
        display: none;
        flex-direction: column;
        justify-content: space-around;
        width: 30px;
        height: 25px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 0;
        z-index: 1001;
        transition: transform 0.3s ease;
    }

    .mobile-menu-toggle:hover {
        transform: scale(1.1);
    }

    .hamburger-line {
        width: 100%;
        height: 3px;
        background-color: #333;
        border-radius: 2px;
        transition: all 0.3s ease;
        transform-origin: center;
    }

    /* Hamburger Animation */
    .mobile-menu-toggle.active .hamburger-line:nth-child(1) {
        transform: rotate(45deg) translate(6px, 6px);
    }

    .mobile-menu-toggle.active .hamburger-line:nth-child(2) {
        opacity: 0;
    }

    .mobile-menu-toggle.active .hamburger-line:nth-child(3) {
        transform: rotate(-45deg) translate(6px, -6px);
    }

    /* Mobile Menu */
    .mobile-menu {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        right: 0;
        background: #ffffff;
        border-top: 1px solid #f0f0f0;
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        padding: 20px;
        z-index: 1000;
    }

    .mobile-menu.active {
        display: block;
        animation: slideDown 0.3s ease-out;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .mobile-nav-links {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-bottom: 20px;
    }

    .mobile-nav-links a {
        text-decoration: none;
        color: #666;
        font-weight: 500;
        font-size: 16px;
        padding: 12px 0;
        transition: color 0.3s ease;
        border-bottom: 1px solid #f5f5f5;
    }

    .mobile-nav-links a:hover {
        color: #1a1a1a;
    }

    .mobile-nav-links a:last-child {
        border-bottom: none;
    }

    .mobile-auth-buttons {
        display: flex;
        flex-direction: row;
        gap: 12px;
    }

    .mobile-auth-buttons .btn {
        flex: 1;
        text-align: center;
        padding: 14px 16px;
    }

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .desktop-nav,
        .desktop-auth {
            display: none;
        }

        .mobile-menu-toggle {
            display: flex;
        }

        .header-content {
            padding: 0 5px;
        }

        .logo-text {
            font-size: 20px;
        }
    }

    /* Tablet Responsive */
    @media (max-width: 992px) and (min-width: 769px) {
        .desktop-nav {
            gap: 20px;
        }

        .desktop-nav a {
            font-size: 14px;
        }

        .btn {
            padding: 10px 18px;
            font-size: 13px;
        }
    }

    /* Large Mobile Responsive */
    @media (max-width: 480px) {
        .container {
            padding: 0 15px;
        }

        .logo-text {
            font-size: 18px;
        }

        .mobile-menu {
            padding: 15px;
        }

        .mobile-nav-links a {
            font-size: 15px;
            padding: 10px 0;
        }
    }

    /* Prevent body scroll when mobile menu is open */
    body.mobile-menu-open {
        overflow: hidden;
    }
</style>

<script>
    function toggleMobileMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        const menuToggle = document.querySelector('.mobile-menu-toggle');
        const body = document.body;
        
        if (mobileMenu.classList.contains('active')) {
            closeMobileMenu();
        } else {
            mobileMenu.classList.add('active');
            menuToggle.classList.add('active');
            body.classList.add('mobile-menu-open');
        }
    }

    function closeMobileMenu() {
        const mobileMenu = document.getElementById('mobileMenu');
        const menuToggle = document.querySelector('.mobile-menu-toggle');
        const body = document.body;
        
        mobileMenu.classList.remove('active');
        menuToggle.classList.remove('active');
        body.classList.remove('mobile-menu-open');
    }

    // Close mobile menu when clicking outside
    document.addEventListener('click', function(event) {
        const header = document.querySelector('.header');
        const mobileMenu = document.getElementById('mobileMenu');
        
        if (!header.contains(event.target) && mobileMenu.classList.contains('active')) {
            closeMobileMenu();
        }
    });

    // Close mobile menu on window resize to desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            closeMobileMenu();
        }
    });

    // Handle escape key to close mobile menu
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape') {
            closeMobileMenu();
        }
    });
</script>