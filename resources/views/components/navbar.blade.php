<!-- Header/Navbar Component -->
<header class="header">
    <div class="container">
        <div class="header-content">
            <a href="{{ url('/') }}" class="logo">
                <div class="logo-icon">T</div>
                <span class="logo-text">tribe</span>
            </a>
            
            <nav class="nav-links">
                <a href="#products">Products</a>
                <a href="#features">Features</a>
                <a href="#pricing">Pricing</a>
                <a href="#resources">Resources</a>
                <a href="#company">Company</a>
            </nav>
            
            <div class="auth-buttons">
                <a href="{{ url('/login') }}" class="btn btn-outline">Log in</a>
                <a href="{{ url('/register') }}" class="btn btn-primary">Join now</a>
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
    }

    .header-content {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .logo {
        display: flex;
        align-items: center;
        gap: 8px;
        text-decoration: none;
        color: #1a1a1a;
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

    .nav-links {
        display: flex;
        list-style: none;
        gap: 32px;
        align-items: center;
    }

    .nav-links a {
        text-decoration: none;
        color: #666;
        font-weight: 500;
        font-size: 15px;
        transition: color 0.3s ease;
    }

    .nav-links a:hover {
        color: #1a1a1a;
    }

    .auth-buttons {
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

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .nav-links {
            display: none;
        }
    }
</style>