<!-- Footer Component -->
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

<style>
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
        .footer-content {
            grid-template-columns: 1fr;
        }
    }
</style>