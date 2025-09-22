<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tribe - Drive Powerful Creator Marketing</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #1a1a1a;
            background-color: #ffffff;
            overflow-x: hidden;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

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

        /* Hero Section */
        .hero {
            padding: 80px 0;
            background: #ffffff;
        }

        .hero-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center;
        }

        .hero-text h1 {
            font-size: 56px;
            font-weight: 800;
            line-height: 1.1;
            margin-bottom: 24px;
            color: #1a1a1a;
        }

        .hero-text p {
            font-size: 20px;
            color: #666;
            margin-bottom: 40px;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            margin-bottom: 60px;
        }

        .btn-large {
            padding: 16px 32px;
            font-size: 16px;
            border-radius: 30px;
        }

        .hero-stats {
            display: flex;
            gap: 40px;
            align-items: center;
        }

        .stat-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .stat-icon {
            width: 40px;
            height: 40px;
            background: #f8f9fa;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
        }

        .stat-text span {
            display: block;
            font-size: 24px;
            font-weight: 700;
            color: #1a1a1a;
        }

        .stat-text small {
            color: #666;
            font-size: 12px;
        }

        .hero-image {
            position: relative;
        }

        .hero-image img {
            width: 100%;
            height: auto;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        .hero-placeholder {
            width: 100%;
            height: 400px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .hero-placeholder::before {
            content: '';
            position: absolute;
            width: 200px;
            height: 200px;
            background: rgba(255,255,255,0.1);
            border-radius: 50%;
            top: 20%;
            right: 20%;
        }

        .hero-placeholder::after {
            content: '';
            position: absolute;
            width: 150px;
            height: 150px;
            background: rgba(255,255,255,0.15);
            border-radius: 50%;
            bottom: 30%;
            left: 30%;
        }

        /* Trust Section */
        .trust-section {
            padding: 60px 0;
            background: #f8f9fa;
            text-align: center;
        }

        .trust-text {
            font-size: 14px;
            color: #999;
            margin-bottom: 40px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .brand-logos {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 50px;
            flex-wrap: wrap;
        }

        .brand-logo {
            opacity: 0.6;
            transition: opacity 0.3s ease;
            font-weight: 600;
            font-size: 18px;
            color: #666;
        }

        .brand-logo:hover {
            opacity: 1;
        }

        /* Features Section */
        .features {
            padding: 100px 0;
            background: #ffffff;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 40px;
        }

        .feature-card {
            text-align: center;
            padding: 40px 20px;
        }

        .feature-image {
            width: 100%;
            height: 200px;
            background: #f8f9fa;
            border-radius: 15px;
            margin-bottom: 24px;
            position: relative;
            overflow: hidden;
        }

        .feature-image.creator {
            background: linear-gradient(135deg, #ff9a9e 0%, #fecfef 100%);
        }

        .feature-image.restaurant {
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 100%);
        }

        .feature-image.commerce {
            background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
        }

        .feature-card h3 {
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 12px;
            color: #1a1a1a;
        }

        .feature-card p {
            color: #666;
            line-height: 1.6;
            font-size: 14px;
        }

        /* Market Section */
        .market-section {
            padding: 100px 0;
            background: #f8f9fa;
            text-align: center;
        }

        .market-section h2 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 24px;
            color: #1a1a1a;
        }

        .market-section p {
            font-size: 18px;
            color: #666;
            margin-bottom: 40px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        /* Community Sections */
        .community-section {
            padding: 80px 0;
            background: #ffffff;
        }

        .community-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 80px;
            align-items: center;
        }

        .community-text h2 {
            font-size: 40px;
            font-weight: 700;
            margin-bottom: 24px;
            color: #1a1a1a;
            line-height: 1.2;
        }

        .community-text p {
            font-size: 16px;
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .community-image {
            width: 100%;
            height: 300px;
            background: #f8f9fa;
            border-radius: 20px;
            position: relative;
            overflow: hidden;
        }

        .community-image.creators {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }

        .community-image.team {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }

        .community-image.decisions {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }

        .community-image.success {
            background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
        }

        /* CTA Section */
        .cta-section {
            padding: 100px 0;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            text-align: center;
        }

        .cta-section h2 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 24px;
        }

        .cta-section p {
            font-size: 20px;
            margin-bottom: 40px;
            opacity: 0.9;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }

        .btn-white {
            background: white;
            color: #667eea;
            border: 1px solid white;
        }

        .btn-white:hover {
            background: #f8f9fa;
            transform: translateY(-2px);
        }

        /* Final CTA */
        .final-cta {
            padding: 100px 0;
            background: linear-gradient(135deg, #ff4081 0%, #9c27b0 100%);
            color: white;
            text-align: center;
        }

        .final-cta h2 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 24px;
        }

        .final-cta p {
            font-size: 20px;
            margin-bottom: 40px;
            opacity: 0.9;
        }

        .app-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            margin-bottom: 60px;
        }

        .app-btn {
            background: rgba(255,255,255,0.2);
            border: 1px solid rgba(255,255,255,0.3);
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .app-btn:hover {
            background: rgba(255,255,255,0.3);
            transform: translateY(-2px);
        }

        .creator-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
        }

        .creator-avatar {
            width: 80px;
            height: 80px;
            background: rgba(255,255,255,0.2);
            border-radius: 50%;
            margin: 0 auto;
        }

        /* Footer */
        .footer {
            background: #1a1a1a;
            color: white;
            padding: 60px 0 30px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section h4 {
            font-size: 16px;
            font-weight: 600;
            margin-bottom: 20px;
        }

        .footer-section ul {
            list-style: none;
        }

        .footer-section ul li {
            margin-bottom: 8px;
        }

        .footer-section ul li a {
            color: #ccc;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .footer-section ul li a:hover {
            color: white;
        }

        .footer-bottom {
            border-top: 1px solid #333;
            padding-top: 30px;
            text-align: center;
            color: #999;
            font-size: 14px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .nav-links {
                display: none;
            }

            .hero-content {
                grid-template-columns: 1fr;
                gap: 40px;
                text-align: center;
            }

            .hero-text h1 {
                font-size: 36px;
            }

            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }

            .features-grid {
                grid-template-columns: 1fr;
            }

            .community-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }

            .brand-logos {
                gap: 30px;
            }

            .creator-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-content {
                grid-template-columns: 1fr;
            }
        }

        /* Animations */
        .fade-in {
            opacity: 0;
            transform: translateY(30px);
            animation: fadeInUp 0.8s ease forwards;
        }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <div class="header-content">
                <a href="#" class="logo">
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
                    <a href="{{ route('login') }}" class="btn btn-outline">Log in</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Join now</a>
                </div>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1>Drive Powerful Creator Marketing</h1>
                    <p>Find and engage with the perfect creators to grow your brand. Our platform connects you with authentic influencers who align with your values and audience.</p>
                    
                    <div class="hero-buttons">
                        <a href="{{ route('register') }}" class="btn btn-primary btn-large">Get Started</a>
                        <a href="#learn-more" class="btn btn-outline btn-large">Learn more</a>
                    </div>
                    
                    <div class="hero-stats">
                        <div class="stat-item">
                            <div class="stat-icon">👥</div>
                            <div class="stat-text">
                                <span>50K+</span>
                                <small>Active Creators</small>
                            </div>
                        </div>
                        <div class="stat-item">
                            <div class="stat-icon">🎯</div>
                            <div class="stat-text">
                                <span>98%</span>
                                <small>Success Rate</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="hero-image">
                    <div class="hero-placeholder"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust Section -->
    <section class="trust-section">
        <div class="container">
            <p class="trust-text">Trusted by leading brands worldwide</p>
            <div class="brand-logos">
                <div class="brand-logo">META</div>
                <div class="brand-logo">Microsoft</div>
                <div class="brand-logo">Slack</div>
                <div class="brand-logo">YouTube</div>
                <div class="brand-logo">Figma</div>
                <div class="brand-logo">Webflow</div>
                <div class="brand-logo">Intercom</div>
                <div class="brand-logo">Monday</div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features">
        <div class="container">
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-image creator"></div>
                    <h3>Creator Marketing</h3>
                    <p>Connect with authentic creators who align with your brand values and reach your target audience effectively.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-image restaurant"></div>
                    <h3>Restaurant UGC</h3>
                    <p>Drive foot traffic and increase sales with user-generated content from food influencers and local creators.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-image commerce"></div>
                    <h3>Commerce Campaigns</h3>
                    <p>Boost your e-commerce sales with targeted influencer campaigns that convert browsers into buyers.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Market Section -->
    <section class="market-section">
        <div class="container">
            <h2>Market at your customers</h2>
            <p>Reach your ideal audience through authentic creator partnerships that drive real results and meaningful engagement.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-large">Start Marketing</a>
        </div>
    </section>

    <!-- Community Section 1 -->
    <section class="community-section">
        <div class="container">
            <div class="community-content">
                <div class="community-text">
                    <h2>We are a creator community, not a database.</h2>
                    <p>Our platform fosters genuine relationships between brands and creators, ensuring authentic partnerships that resonate with audiences.</p>
                    <p>Join a community where creativity meets commerce, and where every collaboration is built on mutual respect and shared values.</p>
                </div>
                <div class="community-image creators"></div>
            </div>
        </div>
    </section>

    <!-- Community Section 2 -->
    <section class="community-section" style="background: #f8f9fa;">
        <div class="container">
            <div class="community-content">
                <div class="community-image team"></div>
                <div class="community-text">
                    <h2>Our platform & team streamline the tasks you hate.</h2>
                    <p>Automate campaign management, streamline communication, and focus on what matters most - creating amazing content and building relationships.</p>
                    <p>Our dedicated team handles the logistics so you can focus on creativity and results.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Community Section 3 -->
    <section class="community-section">
        <div class="container">
            <div class="community-content">
                <div class="community-text">
                    <h2>We help you make data-led decisions.</h2>
                    <p>Access comprehensive analytics and insights to measure campaign performance, track ROI, and optimize your influencer marketing strategy.</p>
                    <p>Make informed decisions with real-time data and detailed reporting that shows what's working and what's not.</p>
                </div>
                <div class="community-image decisions"></div>
            </div>
        </div>
    </section>

    <!-- Community Section 4 -->
    <section class="community-section" style="background: #f8f9fa;">
        <div class="container">
            <div class="community-content">
                <div class="community-image success"></div>
                <div class="community-text">
                    <h2>🔥 A dedicated Customer Success team to guide.</h2>
                    <p>Our experienced customer success team is here to help you every step of the way, from campaign strategy to execution and optimization.</p>
                    <p>Get personalized support, best practices, and strategic guidance to maximize your influencer marketing ROI.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section">
        <div class="container">
            <h2>"Tribe x game that influencer platform I've ever used!"</h2>
            <div class="brand-logos" style="margin-top: 40px;">
                <div class="brand-logo" style="color: white; opacity: 0.8;">META</div>
                <div class="brand-logo" style="color: white; opacity: 0.8;">YouTube</div>
                <div class="brand-logo" style="color: white; opacity: 0.8;">Slack</div>
                <div class="brand-logo" style="color: white; opacity: 0.8;">Uber</div>
            </div>
        </div>
    </section>

    <!-- Ready to Start Section -->
    <section class="market-section" style="background: #ffe4f1;">
        <div class="container">
            <h2>Ready to start?</h2>
            <p>Join thousands of brands and creators who are already growing together on our platform.</p>
            <a href="{{ route('register') }}" class="btn btn-primary btn-large">Get Started Now</a>
        </div>
    </section>

    <!-- Final CTA -->
    <section class="final-cta">
        <div class="container">
            <h2>Create content, have fun, Get paid.</h2>
            
            <div class="app-buttons">
                <a href="#" class="app-btn">📱 Download iOS</a>
                <a href="#" class="app-btn">🤖 Download Android</a>
            </div>
            
            <div class="creator-grid">
                <div class="creator-avatar"></div>
                <div class="creator-avatar"></div>
                <div class="creator-avatar"></div>
                <div class="creator-avatar"></div>
                <div class="creator-avatar"></div>
                <div class="creator-avatar"></div>
                <div class="creator-avatar"></div>
                <div class="creator-avatar"></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Product</h4>
                    <ul>
                        <li><a href="#">Creator Marketing</a></li>
                        <li><a href="#">Brand Partnerships</a></li>
                        <li><a href="#">Analytics</a></li>
                        <li><a href="#">Campaign Management</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Company</h4>
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">Careers</a></li>
                        <li><a href="#">Press</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Resources</h4>
                    <ul>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Help Center</a></li>
                        <li><a href="#">Creator Guide</a></li>
                        <li><a href="#">Brand Guide</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Privacy Policy</a></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Cookie Policy</a></li>
                        <li><a href="#">GDPR</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2025 Tribe. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
