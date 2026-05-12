@php
use App\Helpers\SeoUrl;
@endphp

<div>
    <livewire:components.mega-nav />

    <div class="booking-wrapper">
        <div class="bg-layer-top"></div>
        
        <div class="map-bg-overlay">
            @if($map_link)
                {!! $map_link !!}
            @else
                {!! $siteBranch->map_link !!}
            @endif
        </div>

        <div class="container py-5 content-layer">
            <h2 class="text-center mb-4 fw-bold site-title">PHONE LABS</h2>
            
            <div class="step-indicator mb-5">
                <div class="step-item active" id="step-1">
                    <div class="step-bubble">1</div>
                    <div class="step-label">Enter Post Code</div>
                </div>
                <div class="step-line" id="line-1"></div>
                <div class="step-item" id="step-2">
                    <div class="step-bubble">2</div>
                    <div class="step-label">Choose Branch</div>
                </div>
                <div class="step-line" id="line-2"></div>
                <div class="step-item" id="step-3">
                    <div class="step-bubble">3</div>
                    <div class="step-label">Confirmation</div>
                </div>
            </div>

            <div class="row g-4 justify-content-center align-items-stretch">
                
                <div class="col-lg-4 d-flex">
                    <div class="glass-card text-center p-4 w-100 d-flex flex-column">
                        <div class="flex-grow-1">
                            <h4 class="mb-3">Enter your Post Code</h4>
                            <div class="px-2">
                                <input type="text" class="form-control custom-input mb-3" id="postalCode" placeholder="e.g. SW1A 1AA">
                                <button type="button" class="btn btn-primary-custom px-4" id="searchBtn" onclick="handlePostcodeSearch()">
                                    Next
                                </button>
                            </div>
                        </div>
                        <div id="resultContainer" class="small mt-3" style="min-height: 20px;"></div>
                    </div>
                </div>

                <div class="col-lg-4 d-flex">
                    <div class="glass-card p-4 w-100 d-flex flex-column align-items-center">
                        <div class="flex-grow-1 w-100">
                            <div class="inner-branch-card w-100 mb-3 shadow-sm p-3">
                                <div class="d-flex align-items-start gap-2">
                                    <img src="https://ik.imagekit.io/8qyy56iye/Google_Maps_Logo_PNG_Vector__CDR__Free_Download-removebg-preview.png?updatedAt=1776339012558" alt="Location" class="small-map-image mt-1">
                                    <div class="text-start branch-info-with-map">
                                        <strong class="text-dark d-block mb-1">{{ $siteBranch->name }}</strong>
                                        <p class="small text-muted mb-0">{{ $siteBranch->address_line_1 }}</p>
                                        <p class="small text-muted mb-0">{{ $siteBranch->town_city }}, {{ $siteBranch->post_code }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('store-details', ['branchSlug' => SeoUrl::encodeUrl($siteBranch->town_city)]) }}" 
                           class="btn btn-primary-custom px-4 mt-3" 
                           onclick="updateStep(3)">
                            Visit Branch
                        </a>
                    </div>
                </div>

                <div class="col-lg-4 d-flex">
                    <div class="glass-card p-4 w-100 d-flex flex-column align-items-center">
                        <div class="flex-grow-1 w-100">
                            <div class="inner-branch-card w-100 mb-3 shadow-sm p-3">
                                <div class="d-flex align-items-start gap-2">
                                    <img src="https://ik.imagekit.io/8qyy56iye/Google_Maps_Logo_PNG_Vector__CDR__Free_Download-removebg-preview.png?updatedAt=1776339012558" alt="Location" class="small-map-image mt-1">
                                    <div class="text-start branch-info-with-map">
                                        @php $secondBranch = $branches->where('id', '!=', $siteBranch->id)->first(); @endphp
                                        @if($secondBranch)
                                            <strong class="text-dark d-block mb-1">{{ $secondBranch->name }}</strong>
                                            <p class="small text-muted mb-0">{{ $secondBranch->address_line_1 }}</p>
                                            <p class="small text-muted mb-0">{{ $secondBranch->town_city }}, {{ $secondBranch->post_code }}</p>
                                        @else
                                            <strong class="text-dark d-block mb-1">Nexgen Secondary</strong>
                                            <p class="small text-muted mb-0">Coming Soon</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ $secondBranch ? route('store-details', ['branchSlug' => SeoUrl::encodeUrl($secondBranch->town_city)]) : '#' }}" 
                           class="btn btn-primary-custom px-4 mt-3"
                           onclick="updateStep(3)">
                            Visit Branch
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function updateStep(stepNumber) {
        for(let i=1; i<=3; i++) {
            const step = document.getElementById(`step-${i}`);
            const line = document.getElementById(`line-${i}`);
            if(step) step.classList.remove('active');
            if(line) line.classList.remove('filled');
        }
        
        for(let i=1; i<=stepNumber; i++) {
            const step = document.getElementById(`step-${i}`);
            const line = document.getElementById(`line-${i}`);
            if(step) step.classList.add('active');
            if(line && i < stepNumber) {
                line.classList.add('filled');
            }
        }
    }

    async function handlePostcodeSearch() {
        const pcInput = document.getElementById("postalCode");
        const res = document.getElementById("resultContainer");
        const btn = document.getElementById("searchBtn");
        const pcValue = pcInput.value.trim().toUpperCase();
        
        // Simple UK Postcode Regex for basic validation
        const postcodeRegEx = /^[A-Z]{1,2}[0-9]{1,2}[A-Z]?\s?[0-9][A-Z]{2}$/i;

        if(!pcValue) {
            res.innerHTML = '<span class="text-danger fw-bold">Please enter a postcode</span>';
            pcInput.classList.add('is-invalid');
            return;
        }

        // Show loading state
        res.innerHTML = '<span class="text-info"><i class="fas fa-spinner fa-spin"></i> Locating...</span>';
        btn.disabled = true;
        pcInput.classList.remove('is-invalid');

        // Simulate an API delay
        setTimeout(() => {
            btn.disabled = false;
            
            if(!postcodeRegEx.test(pcValue)) {
                // Failed validation/location
                res.innerHTML = '<span class="text-danger fw-bold">We couldn\'t locate you. Please enter again.</span>';
                pcInput.classList.add('is-invalid');
                updateStep(1); // Keep at step 1
            } else {
                // Success
                res.innerHTML = '<span class="text-success fw-bold">Location set! Choose a branch.</span>';
                pcInput.classList.remove('is-invalid');
                pcInput.classList.add('is-valid');
                updateStep(2);
            }
        }, 1000);
    }
</script>
@endpush

<style>
    :root {
        --blue-grad: linear-gradient(135deg, #00AEEF 0%, #007bb0 100%);
        --soft-blue: #f0f9ff;
        --blur-grey-shadow: rgba(160, 180, 200, 0.5);
    }

    .booking-wrapper {
        position: relative;
        min-height: 100vh;
        background: #ffffff;
        overflow: hidden;
    }

    .bg-layer-top {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 50%;
        background: linear-gradient(to bottom, var(--soft-blue) 0%, #ffffff 100%);
        z-index: 1;
    }

    .map-bg-overlay {
        position: absolute;
        bottom: 0; left: 0; width: 100%; height: 60%;
        z-index: 1;
        opacity: 0.7;
        mask-image: linear-gradient(to top, black 50%, transparent 100%);
        -webkit-mask-image: linear-gradient(to top, black 50%, transparent 100%);
    }

    .map-bg-overlay iframe { width: 100%; height: 100%; border: none; }
    .content-layer { position: relative; z-index: 2; }

    /* Step Indicators */
    .step-indicator { display: flex; align-items: center; justify-content: center; }
    
    .step-bubble {
        width: 40px; height: 40px;
        background: #f0f0f0; color: #aaa;
        border-radius: 50%; display: flex;
        align-items: center; justify-content: center;
        font-weight: bold; transition: 0.3s; z-index: 3;
        box-shadow: 0 5px 10px var(--blur-grey-shadow);
    }

    .step-item.active .step-bubble {
        background: var(--blue-grad);
        color: white;
        box-shadow: 0 8px 15px var(--blur-grey-shadow);
    }

    .step-line {
        height: 3px; background: #f0f0f0;
        width: 70px; margin: 0 -2px 18px -2px;
        z-index: 2; transition: 0.3s;
    }

    .step-line.filled { background: #00AEEF; }
    .step-label { font-size: 11px; margin-top: 5px; font-weight: 600; color: #000; text-align: center;}

    /* Card Styling */
    .glass-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 10px 40px var(--blur-grey-shadow);
        border: 1px solid #f1f1f1;
    }

    .inner-branch-card {
        background: #f8fbfd;
        border-radius: 12px;
        border: 1px solid #eef2f6;
    }

    .small-map-image {
        width: 60px;
        height: 60px;
        border-radius: 4px;
        object-fit: cover;
    }
    
    .branch-info-with-map {
        margin-left: 10px;
    }

    .custom-input.is-invalid {
        border-color: #dc3545;
        background-color: #fff8f8;
    }

    /* Button Styling */
    .btn-primary-custom {
        background: var(--blue-grad);
        color: white; border: none;
        padding: 10px 0;
        min-width: 140px;
        border-radius: 8px;
        font-weight: 600;
        transition: 0.3s ease;
        text-decoration: none;
        box-shadow: 0 8px 20px var(--blur-grey-shadow);
        display: inline-block;
    }

    .btn-primary-custom:hover:not(:disabled) {
        transform: translateY(-2px);
        color: white;
        box-shadow: 0 12px 25px var(--blur-grey-shadow);
    }

    .btn-primary-custom:disabled {
        opacity: 0.7;
        cursor: not-allowed;
    }

    .site-title { color: #00AEEF; }

    .text-primary-gradient {
        color: #00AEEF;
        font-weight: bold;
    }
</style>