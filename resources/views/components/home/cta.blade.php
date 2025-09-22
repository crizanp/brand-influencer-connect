<!-- CTA Sections Component -->
<!-- Testimonial CTA Section -->
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
        <a href="{{ url('/register') }}" class="btn btn-primary btn-large">Get Started Now</a>
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

<style>
    /* CTA Sections */
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

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .creator-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .cta-section h2,
        .final-cta h2 {
            font-size: 32px;
        }
    }
</style>