<!-- Features Section Component -->
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

<style>
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

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .features-grid {
            grid-template-columns: 1fr;
        }
    }
</style>