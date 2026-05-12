@php
use App\Models\FormStatus;
use App\Http\SeoUrl;
$formStatuses = FormStatus::where('name', 'services')->first();
@endphp

<div class="store-details-wrapper">
    <div class="bg-layer-top"></div>
    
    <div class="map-bg-overlay">
        @if($map_link)
            {!! $map_link !!}
        @else
            <iframe src="https://maps.google.com/maps?q={{ urlencode($branch->post_code) }}&t=&z=13&ie=UTF8&iwloc=&output=embed" width="100%" height="100%" style="border: 0" allowfullscreen="" loading="lazy"></iframe>
        @endif
    </div>

    <livewire:components.top-bar />
    <livewire:components.mega-nav />

    <div class="container py-5 content-layer">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                
                <div class="glass-card overflow-hidden">
                    <div class="row g-0">
                        <div class="col-md-7 p-4 p-lg-5">
                            <h1 class="display-5 fw-bold site-title mb-2">{{ $branch->name }}</h1>
                            <p class="text-muted mb-4">
                                <i class="bi bi-geo-alt-fill me-2"></i>
                                {{ $branch->address_line_1 }}, {{ $branch->town_city }}, {{ $branch->post_code }}
                            </p>
                            
                            <div class="row mb-4">
                                <div class="col-sm-6 mb-3">
                                    <h6 class="fw-bold text-uppercase small text-primary-gradient">Contact Details</h6>
                                    <p class="mb-1 small"><strong>Email:</strong> {{ $branch->email }}</p>
                                    <p class="mb-0 small"><strong>Call:</strong> {{ $branch->mobile_number }}</p>
                                </div>
                                <div class="col-sm-6 mb-3">
                                    <h6 class="fw-bold text-uppercase small text-primary-gradient">Opening Hours</h6>
                                    @foreach ($timeSlots as $timeSlot)
                                        <div class="d-flex justify-content-between small border-bottom py-1">
                                            <span>{{ $timeSlot->day }}</span>
                                            <span class="text-end">
                                                @if($timeSlot->status) 
                                                    {{ date('h:i a', strtotime($timeSlot->opening_time)) }} - {{ date('h:i a', strtotime($timeSlot->closing_time)) }} 
                                                @else 
                                                    <span class="text-danger">Closed</span> 
                                                @endif
                                            </span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                @if($formStatuses->sell)
                                    <a href="{{ route('guest-sell-categories') }}" class="btn btn-primary-custom flex-grow-1">SELL DEVICE</a>
                                @endif
                                @if($formStatuses->buy)
                                    <a href="{{ route('guest-buy-products') }}" class="btn btn-primary-custom flex-grow-1">BUY DEVICE</a>
                                @endif
                                @if($formStatuses->repair)
                                    <a href="{{ route('categories') }}" class="btn btn-primary-custom flex-grow-1">BOOK REPAIR</a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-5 d-none d-md-block">
                            <div class="store-image-container h-100">
                                <img src="{{ $branch->image ? $branch->image : 'https://ik.imagekit.io/qml3d7tgz/118771222_3248867385205903_5573724224360234256_n_nW6iVMHYK.jpg' }}" alt="{{ $branch->name }}">
                            </div>
                        </div>
                    </div>
                </div>

              

            </div>
        </div>
    </div>
</div>

<style>
    :root {
        --blue-grad: linear-gradient(135deg, #00AEEF 0%, #007bb0 100%);
        --soft-blue: #f0f9ff;
        --blur-grey-shadow: rgba(160, 180, 200, 0.4);
    }

    .store-details-wrapper {
        position: relative;
        min-height: 100vh;
        background: #ffffff;
        /* Ensure the wrapper doesn't let background elements bleed out */
        overflow-x: hidden; 
    }

    /* Top blue fade */
    .bg-layer-top {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 500px;
        background: linear-gradient(to bottom, var(--soft-blue) 0%, #ffffff 100%);
        z-index: 1;
    }

    /* Bottom Map Overlay - Set to Absolute so it stays behind content and doesn't cover footer */
    .map-bg-overlay {
        position: absolute; 
        bottom: 0; left: 0; width: 100%; height: 600px;
        z-index: 1;
        opacity: 0.6;
        mask-image: linear-gradient(to top, black 30%, transparent 100%);
        -webkit-mask-image: linear-gradient(to top, black 30%, transparent 100%);
        pointer-events: none;
    }

    .content-layer { position: relative; z-index: 2; }

    /* Glassmorphism Card - Strictly applied here only */
    .glass-card {
        background: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        border-radius: 24px;
        box-shadow: 0 12px 30px var(--blur-grey-shadow);
        border: 1px solid rgba(255, 255, 255, 0.8);
    }

    .site-title { color: #00AEEF; }
    .text-primary-gradient { color: #00AEEF; font-weight: 700; }

    .store-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    /* Blue Buttons */
    .btn-primary-custom {
        background: var(--blue-grad);
        color: white !important;
        border: none;
        padding: 12px 15px;
        border-radius: 10px;
        font-weight: 600;
        transition: 0.3s ease;
        text-decoration: none;
        text-align: center;
        box-shadow: 0 8px 18px var(--blur-grey-shadow);
    }

    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 12px 22px var(--blur-grey-shadow);
    }

    .about-content { line-height: 1.7; }

    @media (max-width: 768px) {
        .display-5 { font-size: 1.8rem; }
        .glass-card { border-radius: 16px; }
    }
</style>