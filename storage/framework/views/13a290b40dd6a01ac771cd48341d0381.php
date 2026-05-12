<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />

<style>
    @import url('https://fonts.googleapis.com/css2?family=Manrope:wght@400;700;800&display=swap');

    :root {
        --primary-blue: #00aeef;
        --text-dark: #1a1a1a;
        --bg-white: #ffffff;
    }

    .testimonial-section {
        background-color: var(--bg-white);
        padding: 60px 0;
        font-family: "Manrope", sans-serif;
        overflow: hidden;
    }

    .testimonial-container {
        max-width: 100%;
        margin: 0 auto;
        display: flex;
        flex-direction: column; /* Stack title on top for better flow with many cards */
        align-items: center;
        gap: 20px;
    }

    .testimonial-title-side {
        text-align: center;
        margin-bottom: 20px;
    }

    .testimonial-title-side h2 {
        font-size: 36px;
        font-weight: 800;
        color: #0585b5;
        line-height: 1.2;
        margin: 0;
    }

    /* Slider Area */
    .testimonial-slider-wrap {
        width: 100%;
        cursor: default;
    }

    .swiper-slide {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 240px; /* Slide width includes rotation clearance */
        padding: 30px 0; 
    }

    /* Card Stack Pattern - Optimized Small Size */
    .card-stack {
        position: relative;
        width: 190px; /* Smaller card size */
        height: 190px; /* Perfect square */
        display: flex;
        align-items: center;
        justify-content: center;
    }

    /* The Blue Rotated Square */
    .card-stack::before {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background-color: var(--primary-blue);
        transform: rotate(-10deg); /* Subtle offset like Sophia Bach image */
        border-radius: 35px; /* Soft rounded corners */
        z-index: 1;
    }

    /* The Top White Card */
    .testimonial-card {
        background: #fff;
        width: 96%;
        height: 96%;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 15px;
        position: relative;
        z-index: 2;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.06); 
        border-radius: 35px;
        text-align: center;
        border: 1px solid #f5f5f5;
    }

    .testimonial-card h4 {
        margin: 0;
        font-weight: 800;
        font-size: 15px;
        color: var(--text-dark);
    }

    .service-tag {
        font-size: 11px;
        color: #999;
        margin-bottom: 8px;
        display: block;
    }

    .testimonial-card p {
        font-size: 12px;
        line-height: 1.4;
        color: #555;
        margin-bottom: 10px;
        /* Prevent text overflow in small cards */
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .stars {
        color: #FFB800;
        font-size: 10px;
        display: flex;
        gap: 2px;
    }

    /* SMOOTH CONSTANT MOTION */
    .smoothSwiper .swiper-wrapper {
        transition-timing-function: linear !important;
    }

    @media (min-width: 1024px) {
        .testimonial-container {
            flex-direction: row;
            padding: 0 50px;
        }
        .testimonial-title-side {
            text-align: left;
            flex: 0 0 300px;
        }
    }
</style>

<section class="testimonial-section">
    <div class="testimonial-container">
        
        <div class="testimonial-title-side">
            <h2>&ldquo;What our<br>customers<br>are saying&rdquo;</h2>
        </div>

        <div class="testimonial-slider-wrap">
            <div class="swiper smoothSwiper">
                <div class="swiper-wrapper">
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>James W.</h4><span class="service-tag">Screen Repair</span><p>&ldquo;Fastest repair in the city. Screen looks brand new!&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>Sarah A.</h4><span class="service-tag">Battery Swap</span><p>&ldquo;Phone lasts all day now. Highly recommend!&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>Mike T.</h4><span class="service-tag">Water Damage</span><p>&ldquo;They saved my data when I thought it was gone.&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>Emma L.</h4><span class="service-tag">iPhone Repair</span><p>&ldquo;Professional service and very honest staff.&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>David R.</h4><span class="service-tag">Port Fix</span><p>&ldquo;Fixed my charging issue in 20 minutes!&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>Sophia B.</h4><span class="service-tag">Camera Fix</span><p>&ldquo;Crystal clear photos again. Amazing work.&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>Chris M.</h4><span class="service-tag">Speaker Repair</span><p>&ldquo;Sound is perfect. No more crackling noises.&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>Linda K.</h4><span class="service-tag">Data Recovery</span><p>&ldquo;Recovered all my wedding photos. Thank you!&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>John D.</h4><span class="service-tag">Screen Repair</span><p>&ldquo;Great prices and even better service.&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>Anna S.</h4><span class="service-tag">Battery Fix</span><p>&ldquo;Quick turnaround time. Very satisfied.&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>Robert H.</h4><span class="service-tag">Button Fix</span><p>&ldquo;Volume buttons work perfectly now. Thanks!&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>Maria G.</h4><span class="service-tag">Software</span><p>&ldquo;Fixed my boot loop issue in no time.&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>
                    
                    <div class="swiper-slide"><div class="card-stack"><div class="testimonial-card"><h4>Kevin P.</h4><span class="service-tag">Back Glass</span><p>&ldquo;The back glass looks factory fresh.&rdquo;</p><div class="stars"><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i><i class="fa-solid fa-star"></i></div></div></div></div>

                </div>
            </div>
        </div>

    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<script>
    var swiper = new Swiper(".smoothSwiper", {
        slidesPerView: "auto", 
        centeredSlides: false,
        spaceBetween: 10,
        loop: true,
        speed: 6000, /* Adjust speed for the infinite crawl */
        allowTouchMove: false,
        autoplay: {
            delay: 0,
            disableOnInteraction: false,
        },
    });
</script><?php /**PATH /home/phonelabs/public_html/resources/views/frontend/Home_page_sections/testinomials.blade.php ENDPATH**/ ?>