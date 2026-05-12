<div>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <title>Repair Booking | Device Service</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://kit.fontawesome.com/09d3c3a997.js" crossorigin="anonymous"></script>
    @livewireStyles
</head>
<body style="margin:0; padding:0; background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%);">

<div style="margin-top: 0;">


    <livewire:components.mega-nav theme="white" />
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { background: linear-gradient(135deg, #f5f7fa 0%, #ffffff 100%); font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif; min-height: 100vh; color: #1a1f36; }
        .cust-container { max-width: 1280px; margin: 0 auto; padding: 12px 24px 40px 24px; }

        .stepper { display: flex; align-items: center; margin-bottom: 10px; overflow-x: auto; background: transparent; margin-top: 0; }
        .step { display: flex; align-items: center; justify-content: center; padding: 10px 20px; font-size: 12px; font-weight: 700; position: relative; clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 50%, calc(100% - 12px) 100%, 0 100%, 12px 50%); flex: 1; cursor: pointer; white-space: nowrap; text-transform: uppercase; letter-spacing: 0.5px; transition: all 0.3s ease; }
        .step:first-child { clip-path: polygon(0 0, calc(100% - 12px) 0, 100% 50%, calc(100% - 12px) 100%, 0 100%); }
        .step.active { background: linear-gradient(135deg, #00aeef 0%, #1097c9 100%); color: #ffffff; box-shadow: 0 4px 12px rgba(0, 82, 204, 0.2); }
        .step.inactive { background: #f1f5f9; color: #94a3b8; }
        .step.completed { background: #00a86b; color: #ffffff; }

        .summary-header-wrap { margin-bottom: 10px; }
        .summary-title { font-size: 28px; font-weight: 700; color: #1a1f36; margin-bottom: 4px; letter-spacing: -0.5px; }
        .summary-subtitle { font-size: 14px; color: #6b7280; margin-bottom: 8px; }
        .go-back-link { color: #6b7280; font-size: 13px; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 8px; transition: all 0.2s; cursor: pointer; margin-bottom: 18px; }
        .go-back-link:hover { color: #0052cc; transform: translateX(-2px); }

        .repair-grid { display: grid; grid-template-columns: 1.2fr 1.6fr 1.2fr; gap: 32px; align-items: start; margin-bottom: 20px; }

        .info-section { display: flex; flex-direction: column; gap: 24px; margin-top: 12px; }
        .info-point { display: flex; align-items: flex-start; gap: 14px; padding: 6px 0; }
        .point-icon { width: 44px; height: 44px; background: linear-gradient(135deg, #0052cc 0%, #0066ff 100%); border-radius: 12px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .point-icon i { color: white; font-size: 18px; }
        .point-label { font-size: 10px; font-weight: 700; color: #0052cc; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 5px; }
        .point-value { font-size: 17px; font-weight: 600; color: #1a1f36; display: block; line-height: 1.3; }

        .device-section { display: flex; flex-direction: column; align-items: center; justify-content: flex-start; margin-top: -50px; }
        .device-image-wrapper { position: relative; width: 100%; max-width: 320px; margin: 0 auto; -webkit-mask-image: radial-gradient(circle, black 85%, rgba(0,0,0,0) 98%); mask-image: radial-gradient(circle, black 85%, rgba(0,0,0,0) 98%); }
        .device-image-wrapper img { width: 100%; height: auto; display: block; border-radius: 28px; transition: transform 0.3s ease; }
        .device-image-wrapper:hover img { transform: translateY(-5px); }

        .right-section { display: flex; flex-direction: column; gap: 20px; margin-top: -15px; }

        .price-section { background: linear-gradient(135deg, #1a1f36 0%, #0f1419 100%); border-radius: 16px; padding: 14px 20px; text-align: left; box-shadow: 0 8px 20px rgba(0,0,0,0.08); width: auto; max-width: 180px; margin-left: 0; margin-right: auto; }
        .price-label { font-size: 10px; font-weight: 600; color: #a0aec0; text-transform: uppercase; letter-spacing: 1.5px; display: block; margin-bottom: 6px; }
        .price-amount { font-size: 34px; font-weight: 800; color: #ffffff; display: inline-flex; align-items: baseline; gap: 4px; letter-spacing: -0.5px; line-height: 1; }
        .price-currency { font-size: 28px; font-weight: 700; display: inline-block; vertical-align: baseline; position: relative; top: -2px; margin-right: 2px; }
        .price-number { font-size: 34px; font-weight: 800; display: inline-block; }

        /* ✅ Addon styles */
        .addon-box { width: 100%; }
        .addon-title { font-size: 11px; font-weight: 700; color: #0052cc; text-transform: uppercase; letter-spacing: 1px; margin-bottom: 10px; display: block; }
        .addon-item { display: flex; align-items: center; gap: 10px; padding: 10px 14px; background: #f8f9fc; border-radius: 12px; cursor: pointer; margin-bottom: 8px; transition: all 0.3s; border: 1.5px solid transparent; }
        .addon-item:hover { background: #ffffff; border-color: #0052cc; box-shadow: 0 4px 12px rgba(0,82,204,0.1); }
        .addon-item.selected { background: #eff6ff; border-color: #0052cc; box-shadow: 0 4px 12px rgba(0,82,204,0.1); }
        .addon-item input[type="checkbox"] { width: 16px; height: 16px; cursor: pointer; accent-color: #0052cc; flex-shrink: 0; }
        .addon-item-name { font-size: 13px; font-weight: 600; color: #1a1f36; display: block; }
        .addon-item-price { font-size: 12px; color: #6b7280; display: block; }

        .right-info-stack { display: flex; flex-direction: column; gap: 12px; width: 100%; }
        .right-point { display: flex; align-items: center; gap: 12px; padding: 10px 14px; background: #f8f9fc; border-radius: 12px; transition: all 0.3s ease; width: 100%; }
        .right-point:hover { background: #ffffff; box-shadow: 0 4px 12px rgba(0,0,0,0.05); transform: translateX(4px); }
        .right-point-icon { width: 36px; height: 36px; background: linear-gradient(135deg, #0052cc 0%, #0066ff 100%); border-radius: 10px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; }
        .right-point-icon i { color: white; font-size: 16px; }
        .right-point-label { font-size: 10px; font-weight: 700; color: #0052cc; text-transform: uppercase; letter-spacing: 1px; display: block; margin-bottom: 3px; }
        .right-point-value { font-size: 14px; font-weight: 600; color: #1a1f36; }

        .action-wrapper { display: flex; justify-content: flex-end; margin-top: 8px; width: 100%; }
        .btn-continue { background: linear-gradient(135deg, #0052cc 0%, #0066ff 100%); color: #ffffff; border: none; padding: 12px 28px; border-radius: 14px; font-size: 14px; font-weight: 600; cursor: pointer; transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); display: inline-flex; align-items: center; justify-content: center; gap: 10px; letter-spacing: 0.3px; box-shadow: 0 6px 16px rgba(0,82,204,0.3); position: relative; overflow: hidden; z-index: 1; }
        .btn-continue:before { content: ''; position: absolute; top: 50%; left: 50%; width: 0; height: 0; border-radius: 50%; background: rgba(255,255,255,0.35); transform: translate(-50%, -50%); transition: width 0.5s, height 0.5s; z-index: -1; }
        .btn-continue:hover:before { width: 280px; height: 280px; }
        .btn-continue:hover { transform: translateY(-3px); box-shadow: 0 12px 28px rgba(0,82,204,0.45); background: linear-gradient(135deg, #0040b3 0%, #0052cc 100%); }
        .btn-continue:active { transform: translateY(0px); }
        .btn-continue i { transition: transform 0.25s ease; }
        .btn-continue:hover i { transform: translateX(5px); }

        @media (max-width: 1024px) {
            .repair-grid { grid-template-columns: 1fr; gap: 30px; }
            .device-section { margin-top: 0; order: 1; }
            .info-section { order: 2; margin-top: 0; }
            .right-section { order: 3; margin-top: 0; align-items: flex-start; }
            .price-section { max-width: 200px; margin-left: 0; }
            .action-wrapper { justify-content: center; margin-top: 12px; }
            .stepper { margin-bottom: 24px; }
            .addon-box { max-width: 100%; }
        }
        @media (max-width: 640px) {
            .price-currency { font-size: 24px; top: -1px; }
            .price-number { font-size: 28px; }
            .price-amount { font-size: 28px; }
            .price-section { max-width: 160px; padding: 12px 16px; }
            .summary-title { font-size: 24px; }
            .device-image-wrapper { max-width: 260px; }
            .device-section { margin-top: -20px; }
            .step { font-size: 10px; padding: 8px 12px; }
            .btn-continue { padding: 10px 24px; font-size: 13px; }
            .right-point { padding: 8px 12px; }
        }
        .form-step { animation: fadeIn 0.4s ease; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(8px); } to { opacity: 1; transform: translateY(0); } }
    </style>

    <div class="custom-repair-tabs">
        <div class="cust-container">

            {{-- Arrow Stepper --}}
            <div class="stepper">
                <div class="step active" data-step="0">Repair Info</div>
                <div class="step inactive" data-step="1">Select Repair</div>
                <div class="step inactive" data-step="2">Personal Detail</div>
                <div class="step inactive" data-step="3">Book Repair</div>
            </div>

            <div id="multi-step-form">

                {{-- STEP 0: Repair Info --}}
                <div id="repair-info-section" class="form-step">
                    <div class="summary-header-wrap">
                        <h1 class="summary-title">Repair Summary</h1>
                        <p class="summary-subtitle">Review your device repair details before proceeding</p>
                        <a id="back-button" class="go-back-link">
                            <i class="fa-solid fa-arrow-left"></i> Go Back
                        </a>
                    </div>

                    <div class="repair-grid">

                        {{-- Left: Info Points --}}
                        <div class="info-section">
                            <div class="info-point">
                                <div class="point-icon"><i class="fa-solid fa-mobile-screen-button"></i></div>
                                <div class="point-content">
                                    <span class="point-label">Device Model</span>
                                    <span class="point-value">{{ $data['modal']['name'] ?? '' }}</span>
                                </div>
                            </div>
                            <div class="info-point">
                                <div class="point-icon"><i class="fa-solid fa-screwdriver-wrench"></i></div>
                                <div class="point-content">
                                    <span class="point-label">Repair Service</span>
                                    <span class="point-value">{{ $data['repair_type']['name'] ?? '' }}</span>
                                </div>
                            </div>
                            <div class="info-point">
                                <div class="point-icon"><i class="fa-regular fa-clock"></i></div>
                                <div class="point-content">
                                    <span class="point-label">Estimated Wait Time</span>
                                    <span class="point-value">Approximately 30 minutes</span>
                                </div>
                            </div>
                        </div>

                        {{-- Center: Device Image --}}
                        <div class="device-section">
                            <div class="device-image-wrapper">
                                <img src="{{ asset($data['modal']['file'] ?? '') }}"
                                     onerror="this.src='https://ik.imagekit.io/qml3d7tgz/iphone1_9JHn-8RLU.jpg'"
                                     alt="Device Preview">
                            </div>
                        </div>

                        {{-- Right: Price + Addons + Info --}}
                        <div class="right-section">

                            {{-- ✅ Total Price Box - reactive --}}
                            <div class="price-section">
                                <span class="price-label">Total Price</span>
                                <div class="price-amount">
                                    <span class="price-currency">£</span>
                                    <span class="price-number">{{ number_format($totalPrice ?? 0, 2) }}</span>
                                </div>
                            </div>

                            {{-- ✅ Add-ons --}}
                            @if($showProtector || $showCover)
                            <div class="addon-box">
                                <span class="addon-title">Add-ons</span>

                                @if($showProtector)
                                <label class="addon-item {{ $protectorSelected ? 'selected' : '' }}">
                                    <input type="checkbox"
                                           wire:click="toggleProtector"
                                           {{ $protectorSelected ? 'checked' : '' }}>
                                    <div>
                                        <span class="addon-item-name">Glass Protector</span>
                                        <span class="addon-item-price">Add at half price (+£{{ number_format($protectorPrice, 2) }})</span>
                                    </div>
                                </label>
                                @endif

                                @if($showCover)
                                <label class="addon-item {{ $coverSelected ? 'selected' : '' }}">
                                    <input type="checkbox"
                                           wire:click="toggleCover"
                                           {{ $coverSelected ? 'checked' : '' }}>
                                    <div>
                                        <span class="addon-item-name">Phone Cover</span>
                                        <span class="addon-item-price">Add at half price (+£{{ number_format($coverPrice, 2) }})</span>
                                    </div>
                                </label>
                                @endif
                            </div>
                            @endif

                            {{-- Right Info --}}
                            <div class="right-info-stack">
                                <div class="right-point">
                                    <div class="right-point-icon"><i class="fa-solid fa-shield-alt"></i></div>
                                    <div class="right-point-content">
                                        <span class="right-point-label">Warranty</span>
                                        <span class="right-point-value">Lifetime Coverage</span>
                                    </div>
                                </div>
                                <div class="right-point">
                                    <div class="right-point-icon"><i class="fa-solid fa-microchip"></i></div>
                                    <div class="right-point-content">
                                        <span class="right-point-label">Part Quality</span>
                                        <span class="right-point-value">Premium OEM Grade</span>
                                    </div>
                                </div>
                            </div>

                            <div class="action-wrapper">
                                <button id="next-button" class="btn-continue">
                                    Continue to Booking <i class="fa-solid fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>

                    </div>
                </div>

                {{-- STEP 1: Select Repair --}}
                <section id="form-section-2" class="form-step" style="display:none;">
                    <livewire:guest.components.form-toggle :data="$data" :key="uniqid()" />
                </section>

                {{-- STEP 2: Personal Detail --}}
                <section id="form-section-1" class="form-step" style="display:none;">
                    <livewire:guest.components.patient-detail-form :key="uniqid()" />
                </section>

                {{-- STEP 3: Book Repair --}}
                <section id="book-repair-section" class="form-step" style="display:none;">
                    <livewire:guest.components.book-repair :data="$data" :key="uniqid()" />
                </section>

            </div>
        </div>
    </div>

    <script>
       $(document).ready(function () {

    const steps = [
        'repair-info-section',
        'form-section-2',
        'form-section-1',
        'book-repair-section'
    ];

    let currentStep = {{ $currentStep ?? 0 }};

    if (currentStep < 0) currentStep = 0;
    if (currentStep >= steps.length) currentStep = 0;

    // UPDATE STEPPER UI
    function updateStepperUI(stepIndex) {

        $('.step').each(function(idx) {

            const $this = $(this);

            if (idx < stepIndex) {

                $this.removeClass('active inactive')
                     .addClass('completed');

            } else if (idx === stepIndex) {

                $this.removeClass('completed inactive')
                     .addClass('active');

            } else {

                $this.removeClass('active completed')
                     .addClass('inactive');
            }
        });
    }

    // SHOW STEP
    function showStep(stepIndex) {

        if (stepIndex < 0 || stepIndex >= steps.length) return;

        $('.form-step').hide();

        $('#' + steps[stepIndex]).fadeIn(280);

        updateStepperUI(stepIndex);

        // ===== SCROLL TO TOP =====
        $('html, body').animate({
            scrollTop: 0
        }, 500);
    }

    // BACK BUTTON
    $('#back-button').on('click', function (e) {

        e.preventDefault();

        if (currentStep > 0) {

            currentStep--;

            showStep(currentStep);

        } else {

            window.history.back();
        }
    });

    // NEXT BUTTON
    $('#next-button').on('click', function (e) {

        e.preventDefault();

        if (currentStep < steps.length - 1) {

            currentStep++;

            showStep(currentStep);
        }
    });

    // STEP CLICK
    $('.step').on('click', function () {

        const stepIndex = parseInt($(this).data('step'));

        if (!isNaN(stepIndex) && stepIndex <= currentStep) {

            currentStep = stepIndex;

            showStep(currentStep);
        }
    });

    // LIVEWIRE
    document.addEventListener('livewire:load', function () {

        if (window.livewire) {

            window.livewire.on('formSubmitted', function () {

                if (currentStep < steps.length - 1) {

                    currentStep++;

                    showStep(currentStep);
                }
            });
        }
    });

    // FALLBACK
    if (typeof window.livewire !== 'undefined') {

        window.livewire.on('formSubmitted', function () {

            if (currentStep < steps.length - 1) {

                currentStep++;

                showStep(currentStep);
            }
        });
    }

    // INITIAL STEP
    showStep(currentStep);

});
    </script>
</div>
@livewireScripts
</body>
</html>
</div>