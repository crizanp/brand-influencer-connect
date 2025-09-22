<!-- Hero Section Component -->
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1>Drive Powerful Creator Marketing</h1>
                <p>Find and engage with the perfect creators to grow your brand. Our platform connects you with authentic influencers who align with your values and audience.</p>
                
                <div class="hero-buttons">
                    <a href="{{ url('/register') }}" class="btn btn-primary btn-large">Get Started</a>
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
                <video class="hero-video" controls autoplay muted loop playsinline preload="metadata" onloadstart="console.log('Video loading started')" oncanplay="console.log('Video can play')" onerror="console.log('Video error'); document.querySelector('.hero-placeholder').style.display = 'flex';">
                    <source src="{{ asset('video/hero.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <script>
                    // Diagnostic helpers: log the resolved video URL and attach events
                    (function(){
                        try {
                            var v = document.querySelector('.hero-video');
                            if (!v) return;
                            var srcEl = v.querySelector('source');
                            var url = srcEl ? srcEl.getAttribute('src') : v.getAttribute('src');
                            console.log('[hero-video] resolved src ->', url);

                            v.addEventListener('error', function(ev){
                                console.error('[hero-video] error event', ev);
                                document.querySelector('.hero-placeholder').style.display = 'flex';
                            });
                            v.addEventListener('stalled', function(){ console.warn('[hero-video] stalled'); });
                            v.addEventListener('loadedmetadata', function(){ console.log('[hero-video] loadedmetadata'); });
                            v.addEventListener('canplay', function(){ console.log('[hero-video] canplay fired'); document.querySelector('.hero-placeholder').style.display = 'none'; });
                        } catch(e) { console.error('[hero-video] diagnostic script failed', e); }
                    })();
                </script>
                <!-- Fallback placeholder (hidden by default, shown on error) -->
                <div class="hero-placeholder" style="display: none;">
                    <div class="placeholder-content">
                        <p>Video placeholder</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
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
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        background: #f8f9fa;
    }

    .hero-video {
        width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 20px;
        display: block;
        background: #000;
    }

    .hero-placeholder {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 400px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 18px;
        font-weight: 600;
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

    .placeholder-content {
        z-index: 1;
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

    /* Mobile Responsive */
    @media (max-width: 768px) {
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

        .hero-video,
        .hero-placeholder {
            height: 250px;
        }
    }

    /* Tablet Responsive */
    @media (max-width: 992px) and (min-width: 769px) {
        .hero-video,
        .hero-placeholder {
            height: 300px;
        }
    }
</style>