<!-- Trust Section Component -->
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

<style>
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

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .brand-logos {
            gap: 30px;
        }
    }
</style>