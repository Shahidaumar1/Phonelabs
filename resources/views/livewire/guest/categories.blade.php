<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Device Repair | Select Category</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Manrope', sans-serif;
            background: linear-gradient(165deg, #ffffff 0%, #f2f4f5 50%, #e1eff2 100%);
            min-height: 100vh;
        }

        a { text-decoration: none; }

        .cust-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Top Spacing & Breadcrumb */
        .device-type-head {
            padding-top: 15px; 
        }

        .breadcrumb {
            background: transparent;
            padding: 0.5rem 0;
            margin-bottom: 0;
            font-size: 0.85rem;
        }

        .breadcrumb-item a { color: #2c6280; font-weight: 500; }

        .progress {
            height: 6px !important;
            border-radius: 40px;
            background: #c5d5e8;
            margin: 10px 0;
        }

        .progress-bar-custom {
            background: linear-gradient(90deg, #00AEEF, #5ec8f0) !important;
            border-radius: 40px;
            width: 35%;
            position: relative;
        }

        .progress-end-dot {
            width: 12px;
            height: 12px;
            background: #00AEEF;
            border-radius: 50%;
            position: absolute;
            right: -6px;
            top: -3px;
            box-shadow: 0 0 0 3px rgba(0, 174, 239, 0.25);
        }

        /* Main Section */
        .custom-deviceType-page {
            padding: 10px 0 20px;
        }

        .device-type-section h3 {
            font-size: clamp(1.2rem, 4vw, 1.5rem);
            font-weight: 800;
            text-align: center;
            color: #1a3a5c;
            margin-bottom: 25px;
        }

        /* Flex Layout Logic */
        .device-type-items {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 950px;
            margin: 0 auto;
        }

        /* Crystal Card Design */
        .deviceType-box {
            flex: 0 1 calc(33.333% - 20px); /* Desktop: 3 per row */
            min-width: 200px;
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(12px) saturate(180%);
            -webkit-backdrop-filter: blur(12px) saturate(180%);
            border-radius: 18px;
            transition: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
            cursor: pointer;
            padding: 20px 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.05);
            position: relative;
            overflow: hidden;
        }

        /* Hover: Bottom Side Border */
        .deviceType-box:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.7);
            border-bottom: 4px solid #00AEEF;
            box-shadow: 0 12px 25px rgba(0, 0, 0, 0.08);
        }

        /* Tablet View */
        @media (max-width: 991px) {
            .deviceType-box { flex: 0 1 calc(45% - 20px); }
        }

        /* PERFECT MOBILE VIEW: 2 CARDS PER ROW */
        @media (max-width: 576px) {
            .device-type-items { gap: 10px; } /* Tighter gap for small screens */
            .deviceType-box { 
                flex: 0 1 calc(50% - 10px); /* Exact split for 2 cards */
                min-width: 140px; 
                padding: 15px 8px; 
                border-radius: 15px;
            }
            .deviceType-box figure { height: 80px; }
            .deviceType-box a { font-size: 0.65rem; padding: 6px 5px; }
            .device-type-section h3 { margin-bottom: 15px; }
        }

        .deviceType-box figure {
            width: 100%;
            height: 100px;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .deviceType-box figure img {
            max-width: 75%;
            max-height: 100%;
            object-fit: contain;
            filter: drop-shadow(0 5px 10px rgba(0,0,0,0.08));
        }

        /* Button Styling */
        .deviceType-box a {
            width: 90%;
            padding: 7px 10px;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-weight: 800;
            text-align: center;
            border-radius: 20px;
            background: white;
            border: 1.5px solid #00AEEF;
            color: #00AEEF !important;
           
        }

        .deviceType-box:hover a {
            background: #00AEEF;
            color: white !important;
            box-shadow: 0 3px 0 #005f87;
        }

        /* Form Pattern */
        .ToggleOtherOptionForm {
            padding-top: 30px;
            display: none;
        }

        .from-sec {
            background: white;
            border-radius: 20px;
            padding: 25px;
            border: 1px solid #eef2f6;
            max-width: 850px;
            margin: 0 auto;
            box-shadow: 0 15px 30px rgba(0,0,0,0.05);
        }

        /* GOOGLE BUTTON - Mobile Optimized */
        .google-review-wrapper {
            padding: 30px 0 50px;
            display: flex;
            justify-content: center;
        }

        .cool-google-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: white;
            padding: 10px 20px;
            border-radius: 50px;
            border: 1.5px solid #4285F4;
            color: #1a3a5c;
            font-weight: 700;
            font-size: 0.9rem;
            box-shadow: 0 5px 15px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
        }

        @media (max-width: 576px) {
            .google-review-wrapper { padding: 20px 15px 40px; }
            .cool-google-btn {
                width: 100%;
                justify-content: center;
                font-size: 0.8rem;
                padding: 10px;
            }
            .stars { font-size: 0.75rem; }
        }

        .stars {
            display: flex;
            gap: 2px;
            color: #fbbc05;
        }
    </style>
</head>
<body>

@php
    try {
        $gr = \App\Models\GoogleReviewsSetting::getSingleton();
        $rating = isset($gr->rating) ? (float) $gr->rating : 4.9;
        $reviewCount = isset($gr->reviews_count) ? (int) $gr->reviews_count : 1247;
        $reviewUrl = !empty($gr->review_url) ? $gr->review_url : '#';
    } catch (\Throwable $e) { $rating = 4.9; $reviewCount = 1247; $reviewUrl = '#'; }

    $rounded = round($rating * 2) / 2.0;
    $full = (int) floor($rounded);
    $half = (($rounded - $full) >= 0.5) ? 1 : 0;
@endphp

<livewire:components.mega-nav />

<section class="device-type-head">
    <div class="cust-container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('categories') }}">Device Type</a></li>
            </ol>
        </nav>
        <div class="progress">
            <div class="progress-bar progress-bar-custom" role="progressbar">
                <span class="progress-end-dot"></span>
            </div>
        </div>
    </div>
</section>

<div class="custom-deviceType-page">
    <div class="cust-container">
        <div class="device-type-section">
            <h3>{!! $webContent->repair_page_heading_3 ?? 'Select Category' !!}</h3>
            
            <div class="device-type-items">
                @php $cardCount = 0; @endphp

                @forelse($categories as $category)
                    @if ($category->name != 'Apple iPad' && $cardCount < 4)
                        @php $cardCount++; @endphp
                        <div class="deviceType-box" onclick="window.location.href='{{ route('device-types', $category->slug) }}'">
                            <figure><img src="{{ $category->file ?? '' }}" alt="{{ $category->name }}"></figure>
                            <a href="{{ route('device-types', $category->slug) }}">{{ $category->name }}</a>
                        </div>
                    @endif
                @empty
                    <div class="deviceType-box">
                        <figure><img src="https://cdn-icons-png.flaticon.com/512/644/644458.png" alt="Mobile"></figure>
                        <a href="#">Mobile Phone</a>
                    </div>
                @endforelse

                <div class="deviceType-box" id="otherCard">
                    <figure><img src="https://thumbs.dreamstime.com/b/d-white-man-red-questionmark-computer-generated-image-isolated-68105896.jpg" alt="Other"></figure>
                    <a id="otherButton">Other Device</a>
                </div>
            </div>

            <div class="ToggleOtherOptionForm" id="otherFormSection">
                <div class="from-sec">
                    <form wire:submit.prevent="sendCustomerEmail">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <input class="form-control mb-2" type="text" placeholder="Brand Name" wire:model="brand">
                                <input class="form-control mb-2" type="text" placeholder="Model Name" wire:model="model">
                                <textarea class="form-control" rows="2" placeholder="Describe issue..." wire:model="additionalDescription"></textarea>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex flex-wrap gap-2">
                                    <input class="form-control" type="text" placeholder="First Name" wire:model="firstName">
                                    <input class="form-control" type="text" placeholder="Phone Number" wire:model="phone">
                                </div>
                                <div class="text-center mt-3">
                                    <button class="btn btn-primary w-100 py-2 fw-bold" style="background:#00AEEF; border:none; border-radius:30px;" type="submit">Get Fast Quote</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="google-review-wrapper">
    <a class="cool-google-btn" href="{{ $reviewUrl }}" target="_blank">
        <img src="https://www.gstatic.com/images/branding/product/1x/googleg_48dp.png" alt="G" width="22">
        <span>Trusted Google Reviews</span>
        <div class="stars">
            @for($i=0; $i<$full; $i++) <i class="fa-solid fa-star"></i> @endfor
            @if($half) <i class="fa-solid fa-star-half-stroke"></i> @endif
            <small style="color:#666; margin-left:5px">({{ $reviewCount }})</small>
        </div>
    </a>
</div>

<script>
    function toggleVisibility() {
        const formDiv = document.getElementById('otherFormSection');
        formDiv.style.display = (formDiv.style.display === 'none' || formDiv.style.display === '') ? 'block' : 'none';
        if(formDiv.style.display === 'block') {
            formDiv.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    document.getElementById('otherCard').addEventListener('click', toggleVisibility);
</script>
</body>
</html>