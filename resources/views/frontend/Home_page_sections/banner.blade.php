@php
    try {
        $gr = \App\Models\GoogleReviewsSetting::getSingleton();
        $rating      = isset($gr->rating)          ? (float) $gr->rating        : null;
        $reviewCount = isset($gr->reviews_count)   ? (int)   $gr->reviews_count : null;
        $reviewUrl   = !empty($gr->review_url)     ?          $gr->review_url   : null;
    } catch (\Throwable $e) {
        $rating = $reviewCount = $reviewUrl = null;
    }

    if ($rating === null || $reviewCount === null || $reviewUrl === null) {
        $settings    = \App\Models\SiteSetting::getSiteSettings();
        $rating      = $rating      ?? (isset($settings->google_rating) ? (float) $settings->google_rating : 5.0);
        $reviewCount = $reviewCount ?? (isset($settings->google_reviews_count) ? (int)$settings->google_reviews_count : 0);
        $reviewUrl   = $reviewUrl   ?? (!empty($settings->google_review_url) ? $settings->google_review_url : '#');
    }

    $head_branch = \App\Models\Branch::orderBy('created_at', 'ASC')->first();
@endphp

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap');

    .home-banner-sec {
        position: relative;
        height: 90vh; 
        min-height: 700px;
        display: flex;
        align-items: center; /* Vertical Center */
        justify-content: center; /* Horizontal Center */
        overflow: hidden;
        font-family: "Manrope", sans-serif;
        background: #000;
    }

    .banner-video-wrap {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        z-index: 1;
    }

    .banner-video-wrap video {
        width: 100%; height: 100%; object-fit: cover;
    }

    .banner-overlay {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 2;
    }

    /* Renamed to avoid affecting footer */
    .banner-custom-container {
        position: relative;
        z-index: 3;
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 20px;
        width: 100%;
        display: flex;
        justify-content: center;
    }

    .content-box {
        text-align: center;
        max-width: 900px;
        color: #ffffff;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .hero-title {
        font-size: clamp(40px, 6vw, 80px);
        font-weight: 800;
        line-height: 1.05;
        margin-bottom: 25px;
        text-shadow: 0 4px 15px rgba(0,0,0,0.4);
    }

    .hero-title span { color: #00AEEF; }

    .hero-subtitle {
        font-size: clamp(18px, 2.5vw, 24px);
        margin-bottom: 45px;
        max-width: 750px;
        line-height: 1.5;
    }

    .cta-group {
        display: flex;
        flex-direction: row;
        gap: 15px;
        justify-content: center;
        flex-wrap: nowrap;
    }

    .btn-main {
        padding: 18px 35px;
        font-size: 17px;
        font-weight: 700;
        border-radius: 12px;
        text-decoration: none;
        transition: all 0.3s ease;
        border: 2px solid #00AEEF;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        white-space: nowrap;
        min-width: 200px;
    }

    .book-btn { background: #00AEEF; color: #ffffff; }
    .book-btn:hover { background: #008ec3; border-color: #008ec3; transform: translateY(-3px); }

    .quote-btn {
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        border-color: #fff;
        backdrop-filter: blur(10px);
        position: relative;
        overflow: hidden;
        z-index: 1;
    }

    .quote-btn::before {
        content: ""; position: absolute; top: 0; left: -100%; width: 100%; height: 100%;
        background: #fff; transition: all 0.4s ease; z-index: -1;
    }

    .quote-btn:hover::before { left: 0; }
    .quote-btn:hover { color: #049fd9; transform: translateY(-3px); }

    .location-info {
        margin-top: 50px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        font-size: 16px;
        color: #e5e7eb;
    }

    .location-info i { color: #00AEEF; }

    @media (max-width: 768px) {
        .home-banner-sec { height: 80vh; min-height: 550px; }
        .cta-group { gap: 10px; padding: 0 5px; }
        .btn-main { padding: 14px 10px; font-size: 14px; min-width: 140px; }
    }
</style>

<section class="home-banner-sec">
    <div class="banner-video-wrap">
      <video autoplay muted loop playsinline preload="auto">
    <source src="https://ik.imagekit.io/8qyy56iye/WhatsApp%20Video%202026-04-08%20at%209.52.59%20AM.mp4" type="video/mp4">
</video>
    </div>
    <div class="banner-overlay"></div>
    <div class="banner-custom-container">
        <div class="content-box">
            <h1 class="hero-title">Expert <span>Tech Repairs</span><br>Done Right.</h1>
            <p class="hero-subtitle">Premium repair services for smartphones, tablets, and laptops. Fast turnaround and guaranteed quality.</p>
            <div class="cta-group">
                <a href="/categories" class="btn-main book-btn">
                    <i class="fa-solid fa-calendar-check"></i> Book Now
                </a>
                <a href="tel:{{ $head_branch->landline_number ?? '' }}" class="btn-main quote-btn">
                    <i class="fa-solid fa-receipt"></i> Get Quote
                </a>
            </div>
            <div class="location-info">
                <i class="fa-solid fa-location-dot"></i> 
                <span>{{ $head_branch->town_city ?? 'Our Location' }}, {{ $head_branch->post_code ?? '' }}</span>
            </div>
        </div>
    </div>
</section>