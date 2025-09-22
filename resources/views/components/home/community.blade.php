<!-- Community Sections Component -->
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

<style>
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

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .community-content {
            grid-template-columns: 1fr;
            gap: 40px;
        }

        .community-text h2 {
            font-size: 28px;
        }
    }
</style>