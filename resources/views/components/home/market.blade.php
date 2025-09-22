<!-- Market Section Component -->
<section class="market-section">
    <div class="container">
        <h2>Market at your customers</h2>
        <p>Reach your ideal audience through authentic creator partnerships that drive real results and meaningful engagement.</p>
        <a href="{{ url('/register') }}" class="btn btn-primary btn-large">Start Marketing</a>
    </div>
</section>

<style>
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

    /* Mobile Responsive */
    @media (max-width: 768px) {
        .market-section h2 {
            font-size: 32px;
        }
    }
</style>