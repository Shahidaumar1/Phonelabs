<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <title>Device Models | Repair Service</title>
    <!-- Google Fonts + Font Awesome + Bootstrap (lightweight grid) -->
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Manrope', sans-serif;
            background: radial-gradient(circle at top right, #ffffff, #f2f4f5, #e1eff2);
            min-height: 100vh;
        }

        /* remove default link underline */
        a {
            text-decoration: none;
            color: inherit;
        }

        /* container refinement */
        .cust-container {
            max-width: 1280px;
            margin: 0 auto;
            padding: 0 24px;
        }

        /* ----- HEADER SECTION: breadcrumb + title in one line ----- */
        .device-type-head {
            width: 100%;
            margin-top: 8px;
        }

        .top-bar-flex {
            display: flex;
            flex-wrap: wrap;
            align-items: baseline;
            justify-content: space-between;
            gap: 16px;
            padding: 12px 0 8px 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.06);
            margin-bottom: 12px;
        }

        .breadcrumb-custom {
            background: transparent;
            padding: 0;
            margin: 0;
            font-size: 0.85rem;
            font-weight: 500;
        }

        .breadcrumb-custom .breadcrumb-item a {
            color: #2c6280;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }

        .breadcrumb-custom .breadcrumb-item a:hover {
            color: #00AEEF;
        }

        .breadcrumb-custom .breadcrumb-item.active {
            color: #1a2c38;
            font-weight: 600;
        }

        .heading-search-wrapper {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 24px;
        }

.model-heading {
    margin: 0;
    font-size: 26px;
    font-weight: 800;
    letter-spacing: -0.3px;
    background: linear-gradient(135deg, #1a2c38, #005c7a);
    background-clip: text;
    -webkit-background-clip: text;
    color: transparent;
    
    /* ADD THESE LINES */
    display: flex;
    align-items: center;
    gap: 12px;      /* Spacing between icon and text */
    padding-left: 4px; 
    line-height: 1.2;
}

/* Ensure the icon itself isn't clipped by the text-gradient effect */
.model-heading i {
    color: #1a2c38; /* Give the icon a solid color so it doesn't disappear */
    -webkit-text-fill-color: #1a2c38; 
}

        .search-mini-wrapper {
            max-width: 320px;
            width: 100%;
        }

        .search-mini-wrapper .input-group {
            border-radius: 60px;
            background: white;
            box-shadow: 0 2px 8px rgba(0,0,0,0.02), 0 1px 2px rgba(0,0,0,0.03);
            transition: all 0.2s;
        }

        .search-mini-wrapper .input-group:focus-within {
            box-shadow: 0 4px 12px rgba(0,174,239,0.12);
        }

        .search-mini-wrapper input {
            border: 1px solid #e2e8f0;
            border-radius: 60px 0 0 60px !important;
            font-size: 14px;
            padding: 10px 18px;
            height: 46px;
            background: #fff;
            font-weight: 500;
        }

        .search-mini-wrapper input:focus {
            border-color: #00AEEF;
            outline: none;
            box-shadow: none;
        }

        .search-mini-wrapper button {
            background-color: #00AEEF;
            border: none;
            border-radius: 0 60px 60px 0 !important;
            width: 52px;
            color: white;
            font-size: 1rem;
            transition: background 0.2s;
        }

        .search-mini-wrapper button:hover {
            background-color: #008bbf;
        }

        /* card grid - amazing cards */
        .device-brands {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 28px;
            margin: 28px 0 20px;
        }

        /* card style - modern, elevated, clean */
        .deviceBrand-link {
            display: block;
            transition: transform 0.25s ease, box-shadow 0.25s;
        }

        .deviceBrand-box {
            background: #ffffff;
            border-radius: 28px;
            padding: 28px 16px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.2, 0, 0, 1);
            cursor: pointer;
            border: 1px solid rgba(0, 0, 0, 0.04);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.02), 0 2px 4px rgba(0, 0, 0, 0.02);
            backdrop-filter: blur(0px);
        }

        .deviceBrand-box:hover {
            transform: translateY(-6px);
            border-color: rgba(0, 174, 239, 0.4);
            box-shadow: 0 24px 36px -12px rgba(0, 174, 239, 0.2), 0 6px 14px rgba(0, 0, 0, 0.04);
            background: #ffffff;
        }

        .deviceBrand-box figure {
            width: 100%;
            margin: 0 0 16px 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100px;
        }

        .deviceBrand-box figure img {
            max-width: 100%;
            max-height: 85px;
            object-fit: contain;
            transition: transform 0.2s;
        }

        .deviceBrand-box:hover figure img {
            transform: scale(1.02);
        }

        .deviceBrand-box h6 {
            font-size: 1rem;
            font-weight: 700;
            color: #121926;
            margin: 8px 0 0 0 !important;
            letter-spacing: -0.2px;
            font-family: 'Manrope', sans-serif;
        }

        /* "Other Model" special card */
        .deviceBrand-box:active {
            transform: scale(0.98);
        }

        /* No results */
        .no-results {
            text-align: center;
            padding: 48px 20px;
            background: #f8fafc;
            border-radius: 36px;
            font-weight: 500;
            color: #4a627a;
            grid-column: 1 / -1;
        }

        /* Form area - clean and reduced margin/padding */
        .ToggleOtherOptionForm {
            margin-top: 32px;
            padding-top: 0;
        }

        .ToggleOtherOptionForm .from-sec {
            background: #ffffff;
            border-radius: 32px;
            padding: 36px 40px;
            box-shadow: 0 12px 30px rgba(0, 0, 0, 0.04);
            border: 1px solid #eef2f6;
            transition: all 0.2s;
        }

        .ToggleOtherOptionForm .text-center small {
            font-size: 13px;
            font-weight: 700;
            letter-spacing: 1px;
            color: #00AEEF;
            text-transform: uppercase;
            display: block;
        }

        .ToggleOtherOptionForm .text-center h3 {
            font-size: 28px;
            font-weight: 800;
            margin-top: 6px !important;
            color: #111;
        }

        .from-sec label {
            font-weight: 600;
            font-size: 13px;
            color: #2c3e44;
            margin-bottom: 6px;
        }

        .from-sec input, .from-sec textarea, .from-sec .form-check-input {
            border-radius: 14px;
            border: 1px solid #e2edf2;
            padding: 10px 14px;
            font-size: 14px;
            background-color: #fefefe;
        }

        .from-sec input:focus, .from-sec textarea:focus {
            border-color: #00AEEF;
            outline: none;
            box-shadow: 0 0 0 3px rgba(0,174,239,0.12);
        }

        .submit-btn {
            background-color: #00AEEF;
            border: none;
            padding: 12px 36px;
            border-radius: 40px;
            font-weight: 700;
            font-size: 16px;
            color: white;
            transition: all 0.2s;
            font-family: 'Manrope', sans-serif;
        }

        .submit-btn:hover {
            background-color: #0091c4;
            transform: scale(1.02);
            box-shadow: 0 8px 18px rgba(0,174,239,0.25);
        }

        /* Review banner - same theme */
        .review-banner-btn {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            background: white;
            padding: 12px 28px;
            border-radius: 60px;
            border: 1.5px solid rgba(0,174,239,0.4);
            font-weight: 600;
            font-size: 15px;
            color: #1a2c38;
            transition: all 0.2s;
            box-shadow: 0 2px 6px rgba(0,0,0,0.02);
        }

        .review-banner-btn:hover {
            background-color: #00AEEF;
            border-color: #00AEEF;
            color: white;
        }

        .review-banner-btn .google-icon {
            width: 22px;
            height: 22px;
        }

        .banner-stars i {
            font-size: 13px;
            letter-spacing: 1px;
        }

        /* reduced spacing helpers */
        .gap-reduced {
            row-gap: 20px;
        }

        .mb-2-custom {
            margin-bottom: 12px;
        }

        /* Responsive */
        @media (max-width: 800px) {
            .cust-container {
                padding: 0 20px;
            }
            .heading-search-wrapper {
                flex-direction: column;
                align-items: flex-start;
            }
            .search-mini-wrapper {
                max-width: 100%;
            }
            .device-brands {
                gap: 18px;
                grid-template-columns: repeat(auto-fill, minmax(155px, 1fr));
            }
            .deviceBrand-box {
                padding: 20px 12px;
            }
            .deviceBrand-box figure {
                min-height: 80px;
            }
            .deviceBrand-box figure img {
                max-height: 65px;
            }
            .ToggleOtherOptionForm .from-sec {
                padding: 28px 24px;
            }
        }

        @media (max-width: 560px) {
            .device-brands {
                grid-template-columns: repeat(auto-fill, minmax(135px, 1fr));
                gap: 14px;
            }
            .deviceBrand-box h6 {
                font-size: 0.85rem;
            }
            .model-heading {
                font-size: 22px;
            }
            .review-banner-btn {
                padding: 8px 18px;
                font-size: 13px;
            }
        }

        .error {
            color: #e25c5c;
            font-size: 11px;
            margin-top: 4px;
            display: block;
            font-weight: 500;
        }

        .alert-success {
            background: #e0f7ef;
            border: none;
            border-radius: 28px;
            color: #0c6b58;
        }
    </style>
</head>
<body>

@php
    // Prefer new singleton table
    try {
        $gr = \App\Models\GoogleReviewsSetting::getSingleton();
        $rating      = isset($gr->rating)        ? (float) $gr->rating        : null;
        $reviewCount = isset($gr->reviews_count) ? (int)   $gr->reviews_count : null;
        $reviewUrl   = !empty($gr->review_url)   ?          $gr->review_url    : null;
    } catch (\Throwable $e) {
        $rating = $reviewCount = $reviewUrl = null;
    }

    // Fallback to old site_settings if new row missing
    if ($rating === null || $reviewCount === null || $reviewUrl === null) {
        $settings    = \App\Models\SiteSetting::getSiteSettings();
        $rating      = $rating      ?? (isset($settings->google_rating) ? (float) $settings->google_rating : 5.0);
        $reviewCount = $reviewCount ?? (
            isset($settings->google_reviews_count) ? (int)$settings->google_reviews_count
              : (isset($settings->google_review_count) ? (int)$settings->google_review_count : 0)
        );
        $reviewUrl   = $reviewUrl   ?? (!empty($settings->google_review_url) ? $settings->google_review_url : '#');
    }

    // stars compute
    $clamped = max(0, min(5, (float) $rating));
    $rounded = round($clamped * 2) / 2.0;
    $full    = (int) floor($rounded);
    $half    = (($rounded - $full) >= 0.5) ? 1 : 0;
    $empty   = 5 - $full - $half;
@endphp

{{-- <livewire:components.top-bar /> --}}
<livewire:components.mega-nav />

<section class="device-type-head">
    <div class="cust-container">
        <!-- ONE-LINE: breadcrumb + heading + search aligned -->
        <div class="top-bar-flex">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('categories') }}">Device Type</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('device-types', $device->category_id ?? null) }}">Brands</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Models</li>
                </ol>
            </nav>
        </div>

        <div class="heading-search-wrapper">
            <h2 class="model-heading">
              <i class="fa-solid fa-magnifying-glass"></i>
                 Select your model</h2>
            <div class="search-mini-wrapper">
                <div class="input-group">
                    <input type="text" id="modalSearch" class="form-control" placeholder="iPhone 13, Galaxy S21, Pixel...">
                    <button type="button" onclick="searchModals()"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="custom-deviceType-page">
    <div class="cust-container">
        <div class="device-type-section">
            <!-- model grid -->
            <div class="device-brands" id="deviceBrandsContainer">
                @forelse($modals as $key => $modal)
                    <a href="{{ route('repair-types', ['device' => $device->id, 'modal' => $modal->id]) }}" class="deviceBrand-link">
                        <div class="deviceBrand-box">
                            <figure>
                                <img src="{{ $modal->file ?? '' }}" alt="{{ $modal->name }}" class="img-fluid" loading="lazy">
                            </figure>
                            <h6>{{ $modal->name }}</h6>
                        </div>
                    </a>
                @empty
                    <div class="no-results">✨ No models found</div>
                @endforelse

                <!-- Other Model Card (trigger form) -->
                <div class="deviceBrand-link" onclick="toggleVisibility()" style="cursor:pointer;">
                    <div class="deviceBrand-box">
                        <figure>
                            <img src="https://thumbs.dreamstime.com/b/d-white-man-red-questionmark-computer-generated-image-isolated-68105896.jpg"
                                 alt="Other model" style="width: auto; max-height: 70px;">
                        </figure>
                        <h6>Other Model</h6>
                    </div>
                </div>
            </div>

            <!-- Other Model Form (toggle) -->
            <div class="ToggleOtherOptionForm" id="otherFormToggle" style="display: none;">
                <div class="text-center mb-3">
                    <small>Get A Quote</small>
                    <h3>Can't Find Your Model?</h3>
                    <p class="text-muted small" style="max-width: 500px; margin: 8px auto 0;">Tell us about your device, and we’ll get back fast.</p>
                </div>
                <div class="from-sec">
                    <form wire:submit.prevent="sendCustomerEmail">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="brand">Brand *</label>
                                    <input class="form-control" type="text" id="brand" wire:model="brand"
                                           placeholder="e.g., Apple, Samsung">
                                    @error('brand') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="model">Model *</label>
                                    <input class="form-control" type="text" id="model" wire:model="model"
                                           placeholder="e.g., iPhone 14 Pro">
                                    @error('model') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div>
                                    <label class="form-label" for="additionalDescription">Additional Information</label>
                                    <textarea class="form-control" rows="4" id="additionalDescription" wire:model="additionalDescription"
                                              placeholder="Describe the issue in detail..."></textarea>
                                    @error('additionalDescription') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="row mb-3 align-items-center">
                                    <div class="col-8">
                                        <label class="form-label mb-0">Broken Screen</label>
                                    </div>
                                    <div class="col-4 text-end">
                                        <input class="form-check-input" type="checkbox" id="checkbox1"
                                               wire:model="checkboxes" value="Broken Screen">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-8">
                                        <label class="form-label mb-0">Battery Replacement</label>
                                    </div>
                                    <div class="col-4 text-end">
                                        <input class="form-check-input" type="checkbox" id="checkbox2"
                                               wire:model="checkboxes" value="Battery Replacement">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-8">
                                        <label class="form-label mb-0">Charging Port Repair</label>
                                    </div>
                                    <div class="col-4 text-end">
                                        <input class="form-check-input" type="checkbox" id="checkbox3"
                                               wire:model="checkboxes" value="Charging Port Repair">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-8">
                                        <label class="form-label mb-0">Housing Issue</label>
                                    </div>
                                    <div class="col-4 text-end">
                                        <input class="form-check-input" type="checkbox" id="checkbox4"
                                               wire:model="checkboxes" value="Housing Issue">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-8">
                                        <label class="form-label mb-0">Audio Fault</label>
                                    </div>
                                    <div class="col-4 text-end">
                                        <input class="form-check-input" type="checkbox" id="checkbox5"
                                               wire:model="checkboxes" value="Audio Fault">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-8">
                                        <label class="form-label mb-0">Water Damage</label>
                                    </div>
                                    <div class="col-4 text-end">
                                        <input class="form-check-input" type="checkbox" id="checkbox6"
                                               wire:model="checkboxes" value="Water Damage">
                                    </div>
                                </div>

                                <div class="row mb-3 align-items-center">
                                    <div class="col-8">
                                        <label class="form-label mb-0">Other Issue</label>
                                    </div>
                                    <div class="col-4 text-end">
                                        <input class="form-check-input" type="checkbox" id="otherCheckbox"
                                               wire:model="checkboxes" value="Other">
                                    </div>
                                </div>

                                @if (in_array('Other', $checkboxes))
                                    <div class="mt-2">
                                        <label class="form-label" for="otherText">Please specify:</label>
                                        <input class="form-control" type="text" id="otherText"
                                               wire:model="otherText" placeholder="Describe the issue">
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="row g-4 mt-2">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="firstName">First Name *</label>
                                    <input class="form-control" type="text" id="firstName"
                                           wire:model="firstName" placeholder="John">
                                    @error('firstName') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="lastName">Last Name *</label>
                                    <input class="form-control" type="text" id="lastName" wire:model="lastName"
                                           placeholder="Doe">
                                    @error('lastName') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="email">Email *</label>
                                    <input class="form-control" type="email" id="email" wire:model="email"
                                           placeholder="hello@example.com">
                                    @error('email') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label" for="phone">Phone *</label>
                                    <input class="form-control" type="text" id="phone" wire:model="phone"
                                           placeholder="(555) 123-4567">
                                    @error('phone') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label d-block">Are you an existing customer?</label>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="existingCustomerYes"
                                                   name="existingCustomer" value="yes" wire:model="existingCustomer">
                                            <label class="form-check-label" for="existingCustomerYes">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="existingCustomerNo"
                                                   name="existingCustomer" value="no" wire:model="existingCustomer">
                                            <label class="form-check-label" for="existingCustomerNo">No</label>
                                        </div>
                                    </div>
                                    @error('existingCustomer') <span class="error">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label d-block">Are you a business?</label>
                                    <div class="d-flex gap-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="isBusinessYes"
                                                   name="isBusiness" value="yes" wire:model="isBusiness">
                                            <label for="isBusinessYes">Yes</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" id="isBusinessNo"
                                                   name="isBusiness" value="no" wire:model="isBusiness">
                                            <label for="isBusinessNo">No</label>
                                        </div>
                                    </div>
                                    @error('isBusiness') <span class="error">{{ $message }}</span> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-center mt-4">
                            <button class="submit-btn" type="submit">Request Quote →</button>
                        </div>
                    </form>

                    @if (session()->has('emailSent'))
                        <div class="alert alert-success mt-4 text-center">
                            <i class="fas fa-check-circle me-2"></i> Thank you! The information has been sent to your email.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Google Review Banner -->
<section class="cust-container px-3 pb-5 pt-2">
    <div class="row">
        <div class="col-md-12 d-flex justify-content-center">
            <a class="review-banner-btn" href="{{ $reviewUrl }}" target="_blank" rel="noopener">
                <span>Review us on</span>
                <img src="https://www.gstatic.com/images/branding/product/1x/googleg_48dp.png"
                     alt="Google" class="google-icon">
                <span class="banner-stars">
                    <strong>{{ number_format($rounded, 1) }}</strong>
                    @for($i=0; $i<$full; $i++)
                        <i class="fa-solid fa-star"></i>
                    @endfor
                    @if($half)
                        <i class="fa-solid fa-star-half-stroke"></i>
                    @endif
                    @for($i=0; $i<$empty; $i++)
                        <i class="fa-regular fa-star"></i>
                    @endfor
                    <strong>({{ (int) $reviewCount }})</strong>
                </span>
            </a>
        </div>
    </div>
</section>

<script>
    function searchModals() {
        let input, filter, container, boxes, i, title, linkWrapper;
        input = document.getElementById('modalSearch');
        if (!input) return;
        filter = input.value.toUpperCase().trim();
        container = document.getElementById('deviceBrandsContainer');
        if (!container) return;
        let items = container.querySelectorAll('.deviceBrand-link');
        let anyVisible = false;

        items.forEach(item => {
            const box = item.querySelector('.deviceBrand-box');
            if (!box) return;
            const titleEl = box.querySelector('h6');
            let match = false;
            if (titleEl) {
                let txt = titleEl.innerText || titleEl.textContent;
                match = txt.toUpperCase().indexOf(filter) > -1;
            }
            if (filter === "") match = true;
            if (match) {
                item.style.display = '';
                anyVisible = true;
            } else {
                item.style.display = 'none';
            }
        });

        // optional: show no-results message if needed but we already have default message fallback
        let noResultsDiv = container.querySelector('.no-results');
        if (!anyVisible && !document.querySelector('.deviceBrand-link[style*="display: none;"] ~ .no-results')) {
            if (!noResultsDiv) {
                let msgDiv = document.createElement('div');
                msgDiv.className = 'no-results';
                msgDiv.innerText = '🔍 No matching models found. Try another keyword.';
                container.appendChild(msgDiv);
            } else {
                noResultsDiv.style.display = 'flex';
            }
        } else if (anyVisible && noResultsDiv) {
            noResultsDiv.style.display = 'none';
        }
    }

    function toggleVisibility() {
        const formDiv = document.getElementById('otherFormToggle');
        if (formDiv) {
            if (formDiv.style.display === 'none' || formDiv.style.display === '') {
                formDiv.style.display = 'block';
                setTimeout(() => {
                    formDiv.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            } else {
                formDiv.style.display = 'none';
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('modalSearch');
        if (searchInput) {
            searchInput.addEventListener('input', searchModals);
        }
        // ensure that no-results behavior on load if any
        searchModals();
    });
</script>

<!-- Bootstrap JS (optional for toggles but not mandatory) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>