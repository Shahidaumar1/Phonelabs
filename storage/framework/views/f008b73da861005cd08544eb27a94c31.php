<div>
    
    <?php if($success): ?>
        <div class="container mt-4">
            <div class="alert" style="background:#e6f4ff; border:1px solid #91caff; border-radius:12px; padding:20px;">
                <h5 style="color:#003a8c; font-weight:700;">🎉 Order Placed Successfully!</h5>
                <p style="color:#003a8c; margin-bottom:0;">Check your email for details. Thank you for choosing PhoneLabs.</p>
            </div>
        </div>
    <?php endif; ?>

    <?php
        use App\Models\PaymentMethodSetting;

        $paypalRow = PaymentMethodSetting::where('payment_method_', 'Paypal')->first();
        $stripeRow = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();
        $klarnaRow = PaymentMethodSetting::where('payment_method_', 'Klarna')->first();

        $paypalSettings = $paypalRow ? json_decode($paypalRow->settings, true) : null;
        $stripeSettings = $stripeRow ? json_decode($stripeRow->settings, true) : null;
        $klarnaSettings = $klarnaRow ? json_decode($klarnaRow->settings, true) : null;

        $paypalEnabled   = (bool) ($paypalSettings['enabled'] ?? false);
        $stripeEnabled   = (bool) ($stripeSettings['enabled'] ?? false);
        $klarnaEnabled   = (bool) ($klarnaSettings['enabled'] ?? false);
        $offlineEnabled  = (bool) ($stripeSettings['enable_offline_pay'] ?? true);
        $stripePublicKey = $stripeSettings['public_key'] ?? ($stripeSettings['public'] ?? '');

        // Set default payment method to 'drop_at' (Store Repair)
        if(!$pm) { $pm = 'drop_at'; }

        $paywithcardtext = 'Pay at Store';
        if (in_array(session('form_type'), ['postal_form', 'collection_form', 'fix_form'])) {
            $paywithcardtext = "I'll Pay after Delivery";
        }
    ?>

    <style>
        :root { --pl-blue: #0070CD; --pl-light-blue: #F8FBFF; }
        
        .payment-title { font-family: 'Manrope', sans-serif; font-weight: 800; color: #00234D; margin-bottom: 30px; }
        
        /* Summary Card Styling */
        .summary-card { background: var(--pl-blue); border-radius: 12px; color: white; padding: 25px; height: 100%; position: relative; overflow: hidden; }
        .summary-card h3 { font-size: 1.4rem; font-weight: 700; border-bottom: 1px solid rgba(255,255,255,0.2); padding-bottom: 15px; margin-bottom: 20px; }
        .summary-item { display: flex; justify-content: space-between; margin-bottom: 12px; font-size: 0.95rem; opacity: 0.9; }
        .summary-total { border-top: 1px solid rgba(255,255,255,0.3); padding-top: 15px; margin-top: 20px; font-size: 1.2rem; font-weight: 700; }

        /* Payment Card Styling */
        .bpm-card { border: 1px solid #E2E8F0; border-radius: 12px; margin-bottom: 15px; transition: all 0.3s ease; background: #fff; overflow: hidden; }
        .bpm-card.selected { border-color: var(--pl-blue); box-shadow: 0 4px 12px rgba(0,112,205,0.1); }
        
        .bpm-header { display: flex; justify-content: space-between; align-items: center; padding: 20px; cursor: pointer; }
        
        /* 3D Radio Button Look */
        .radio-container { position: relative; width: 22px; height: 22px; flex-shrink: 0; }
        .bpm-dot { 
            width: 22px; height: 22px; border-radius: 50%; border: 2px solid #CBD5E0; 
            background: #fff; display: block; position: relative; transition: 0.2s;
            box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
        }
        .bpm-card.selected .bpm-dot { border-color: var(--pl-blue); }
        .bpm-card.selected .bpm-dot::after {
            content: ''; position: absolute; top: 4px; left: 4px; width: 10px; height: 10px;
            border-radius: 50%; background: var(--pl-blue);
            box-shadow: 0 2px 4px rgba(0,112,205,0.4);
        }

        .bpm-price { font-weight: 700; color: var(--pl-blue); }
        .bpm-body { padding: 0 20px 20px 20px; font-size: 0.9rem; }

        /* Location Info Box (Matches Image) */
        .info-box { background: #F8FAFC; border: 1px solid #E2E8F0; border-radius: 10px; padding: 15px; margin-top: 5px; }
        .info-row { display: flex; align-items: center; gap: 12px; margin-bottom: 10px; color: #475569; }
        .info-row:last-child { margin-bottom: 0; }
        .info-row i { color: var(--pl-blue); font-size: 1.1rem; width: 20px; text-align: center; }

        /* Buttons */
        .btn-pl-primary { 
            background: var(--pl-blue); color: #fff; font-weight: 700; padding: 14px; 
            border-radius: 8px; width: 100%; border: none; transition: 0.3s;
            display: flex; align-items: center; justify-content: center; gap: 10px;
        }
        .btn-pl-primary:hover { background: #00569e; transform: translateY(-1px); }
    </style>

    <div class="container mb-5 mt-4">
        <h2 class="text-center payment-title">How would you like to Pay?</h2>

        <div class="row g-4 justify-content-center">
            
            <div class="col-lg-4 col-md-5">
                <div class="summary-card">
                    <div class="mb-3"><i class="bi bi-cart-check fs-3"></i></div>
                    <h3>Repair Summary</h3>
                    <div class="summary-item"><span>Model</span><span class="fw-bold"><?php echo e($data['modal']['name'] ?? 'Apple iPad Pro'); ?></span></div>
                    <div class="summary-item"><span>Type</span><span class="fw-bold"><?php if(session('form_type') == 'postal_form'): ?> Post Delivery <?php else: ?> Buy In Store <?php endif; ?></span></div>
                    
                    <div class="summary-total">
                        <span>Total Price</span>
                        <span class="float-end">£<?php echo e(number_format($price ?? 0, 2)); ?></span>
                    </div>
                    
                    <div style="position: absolute; bottom: -20px; right: -20px; opacity: 0.1;">
                        <i class="bi bi-phone" style="font-size: 150px;"></i>
                    </div>
                </div>
            </div>

            
            <div class="col-lg-6 col-md-7">
                <div class="bg-white p-4 border-radius-12 shadow-sm border">
                    <p class="fw-bold mb-4 text-center text-muted">Select your payment option</p>

                    
                    <?php if($offlineEnabled): ?>
                        <div class="bpm-card <?php echo e($pm === 'drop_at' ? 'selected' : ''); ?>">
                            <div class="bpm-header" wire:click="changePm('drop_at')">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="radio-container"><span class="bpm-dot"></span></div>
                                    <div class="d-flex align-items-center gap-2">
                                        <i class="bi bi-shop fs-5" style="color: var(--pl-blue);"></i>
                                        <span class="fw-bold text-dark"><?php echo e($paywithcardtext); ?></span>
                                    </div>
                                </div>
                                <span class="bpm-price">£0</span>
                            </div>
                            <?php if($pm === 'drop_at'): ?>
                                <div class="bpm-body">
                                    <p class="text-center fw-bold mb-2 text-dark">Pay at our store when you visit us at the location below.</p>
                                    
                                    <div class="info-box">
                                        <div class="info-row">
                                            <i class="bi bi-geo-alt-fill"></i>
                                            <span><?php echo e($name ?? 'PhoneLabs'); ?>, <?php echo e($address_line_1 ?? '64 St James\'s St'); ?>, <?php echo e($town_city ?? 'Burnley'); ?>, <?php echo e($post_code ?? 'BB11 1NH'); ?></span>
                                        </div>
                                        <div class="info-row">
                                            <i class="bi bi-envelope-fill"></i>
                                            <span><?php echo e($email ?? 'info@phonelabsburnley.co.uk'); ?></span>
                                        </div>
                                        <div class="info-row">
                                            <i class="bi bi-telephone-fill"></i>
                                            <span><?php echo e($landline_number ?? '01282 932199'); ?></span>
                                        </div>
                                    </div>

                                    <button class="btn-pl-primary mt-4" wire:click="BuyDevice">
                                        <i class="bi bi-shield-lock"></i> Continue to Payment
                                    </button>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    
                    <?php if($klarnaEnabled): ?>
                        <div class="bpm-card <?php echo e($pm === 'klarna' ? 'selected' : ''); ?>">
                            <div class="bpm-header" wire:click="changePm('klarna')">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="radio-container"><span class="bpm-dot"></span></div>
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/a/a2/Klarna_Logo.svg/1200px-Klarna_Logo.svg.png" height="20" alt="Klarna">
                                    <span class="fw-bold text-dark">Pay with Klarna</span>
                                </div>
                                <i class="bi bi-chevron-right text-muted"></i>
                            </div>
                        </div>
                    <?php endif; ?>

                    
                    <?php if($stripeEnabled): ?>
                        <div class="bpm-card <?php echo e($pm === 'stripe' ? 'selected' : ''); ?>">
                            <div class="bpm-header" wire:click="changePm('stripe')">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="radio-container"><span class="bpm-dot"></span></div>
                                    <div class="fw-bold text-dark"><i class="bi bi-credit-card me-2"></i>Pay with Card</div>
                                </div>
                                <span class="bpm-price">£<?php echo e(number_format($price ?? 0, 2)); ?></span>
                            </div>
                            <?php if($pm === 'stripe'): ?>
                                <div class="bpm-body">
                                    <div id="acc-card-element" class="form-control mb-2"></div>
                                    <button id="acc-stripe-submit" class="btn-pl-primary mt-2">Pay Securely Now</button>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="text-center mt-4 small text-muted">
                        <i class="bi bi-shield-fill-check text-success"></i> 100% Secure Checkout
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://js.stripe.com/v3/"></script>
    <script>var _accStripePublicKey = '<?php echo e($stripePublicKey); ?>';</script>
    
    <script>
        (function () {
            function initAccStripe() {
                if (!document.getElementById('acc-card-element')) return;
                var stripe = Stripe(window._accStripePublicKey);
                var elements = stripe.elements();
                var card = elements.create('card', { style: { base: { fontSize: '16px', color: '#32325d' } } });
                card.mount('#acc-card-element');
                
                document.getElementById('acc-stripe-submit').onclick = function() {
                    stripe.createToken(card).then(function(result) {
                        if (result.token) window.livewire.emit('tokenCreated', result.token.id);
                    });
                };
            }
            document.addEventListener('livewire:load', () => {
                Livewire.hook('message.processed', () => setTimeout(initAccStripe, 100));
                initAccStripe();
            });
        })();
    </script>
    
</div><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea (9)\resources\views/livewire/guest/accessories/book-repair.blade.php ENDPATH**/ ?>