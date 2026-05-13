<div>
    
    <?php if($success): ?>
        <div class="container mt-4">
            <div class="alert" style="background:#d4edda; border:1px solid #c3e6cb; border-radius:8px; padding:24px 28px;">
                <h5 style="color:#155724; font-weight:700; font-size:1.2rem;">
                    ðŸŽ‰ Congratulations! Your order has been placed.
                </h5>
                <p style="color:#155724; margin-bottom:8px;">Check your email for more instructions.</p>
                <hr style="border-color:#c3e6cb;">
                <p style="color:#155724; margin-bottom:0;">Thank you for choosing us. Questions? Reach out anytime.</p>
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

        $paywithcardtext = 'Buy at store';
        if (session('form_type') == 'postal_form')     $paywithcardtext = "I'll Pay after Delivery";
        if (session('form_type') == 'collection_form') $paywithcardtext = "I'll Pay after Delivery";
        if (session('form_type') == 'fix_form')        $paywithcardtext = "I'll Pay after Delivery";
    ?>

    <style>
        .bpm-card {
            border: 1px solid #EA1555;
            border-radius: 10px;
            margin-bottom: 10px;
            overflow: hidden;
        }
        .bpm-card.selected {
            border: 2px solid #EA1555;
        }
        .bpm-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 14px 18px;
            cursor: pointer;
            background: #fff;
            user-select: none;
            min-height: 70px;
        }
        .bpm-header:hover { background: #fff9fb; }
        .bpm-dot {
            width: 18px;
            height: 18px;
            border-radius: 50%;
            border: 2px solid #EA1555;
            background: #fff;
            display: inline-block;
            flex-shrink: 0;
            transition: background 0.2s;
        }
        .bpm-card.selected .bpm-dot { background: #EA1555; }
        .bpm-price {
            font-size: 1.15rem;
            color: #EA1555;
            font-weight: 700;
            white-space: nowrap;
            margin-left: 10px;
        }
        .bpm-body {
            padding: 14px 18px 18px 18px;
            border-top: 1px solid #f5c6d3;
            background: #fffafa;
        }
        .bpm-submit-btn {
            background-color: #EA1555;
            border: 1px solid #EA1555;
            color: #fff;
            font-weight: 700;
            padding: 10px 28px;
            border-radius: 8px;
            font-size: 16px;
        }
        .bpm-submit-btn:hover {
            background-color: #fff;
            color: #EA1555;
        }
        
        :root {
            --primary: #00AEEF;
            --primary-dark: #008fc4;
        }
        
        .alert {
            background: #e6f7fd !important;
            border: 1px solid #b3e5f7 !important;
        }
        
        .alert h5,
        .alert p {
            color: var(--primary) !important;
        }
        
        .alert hr {
            border-color: #b3e5f7 !important;
        }
        
        h2 {
            color: var(--primary) !important;
        }
        
        .bpm-card {
            border: 1px solid var(--primary);
        }
        
        .bpm-card.selected {
            border: 2px solid var(--primary);
        }
        
        .bpm-header:hover {
            background: #f0fbff;
        }
        
        .bpm-dot {
            border: 2px solid var(--primary);
        }
        
        .bpm-card.selected .bpm-dot {
            background: var(--primary);
        }
        
        .bpm-price {
            color: var(--primary);
        }
        
        .bpm-body {
            border-top: 1px solid #b3e5f7;
            background: #f4fbfe;
        }
        
        .bpm-submit-btn {
            background-color: var(--primary);
            border: 1px solid var(--primary);
        }
        
        .bpm-submit-btn:hover {
            background-color: #fff;
            color: var(--primary);
        }
        
        div[style*="border:2px solid #EA1555"] {
            border: 2px solid var(--primary) !important;
        }
        
        table h2 {
            color: var(--primary) !important;
        }
        
        .btn-success {
            background-color: var(--primary) !important;
            border-color: var(--primary) !important;
        }
        
        .btn-success:hover {
            background-color: var(--primary-dark) !important;
            border-color: var(--primary-dark) !important;
        }
        
        #buy-card-errors {
            color: var(--primary);
        }
    </style>

    <div class="container mb-5">
        <h2 class="text-center" style="color:#EA1555; font-family:Manrope; font-weight:700;">
            How would you like to Pay
        </h2>

        <div class="row justify-content-between" style="row-gap:30px;">

            
            <div class="col-lg-5">
                <table class="table table-striped border mt-4" style="box-shadow:0 2px 5px rgba(0,0,0,0.1); max-width:500px; margin:0 auto;">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center">
                                <h2 style="font-size:32px; font-weight:700; color:#EA1555; font-family:Manrope;">Buy Summary</h2>
                            </th>
                        </tr>
                        <tr>
                            <td>Model</td>
                            <td class="text-end"><?php echo e($data['modal']['name'] ?? '-'); ?></td>
                        </tr>
                    </thead>
                    <tbody>
                        
        <?php if(!empty($data['memory_size'])): ?>
                        <tr>
                            <td>Category</td>
                            <td class="text-end"><?php echo e($data['memory_size']); ?></td>
                        </tr>
                        <?php endif; ?>

                        <?php if(!empty($data['color'])): ?>
                        <tr>
                            <td>Color</td>
                            <td class="text-end"><?php echo e($data['color']); ?></td>
                        </tr>
                        <?php endif; ?>

                        <?php if(!empty($data['grade'])): ?>
                        <tr>
                            <td>Grade</td>
                            <td class="text-end"><?php echo e($data['grade']); ?></td>
                        </tr>
                        <?php endif; ?>

                        <tr>
                            <td>Quantity</td>
                            <td class="text-end"><?php echo e($data['quantity'] ?? 1); ?></td>
                        </tr>

                        <tr>
                            <td>Type</td>
                            <td class="text-end">
                                <?php if(session('form_type') == 'postal_form'): ?> Post Delivery <?php else: ?> Buy In Store <?php endif; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Total Price</th>
                            <th class="text-end">£<?php echo e(number_format($price ?? 0, 2)); ?></th>
                        </tr>
                    </tbody>
                </table>
            </div>

            
            <div class="col-lg-6 col-12">
                <?php if (isset($component)) { $__componentOriginalb5e767ad160784309dfcad41e788743b = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalb5e767ad160784309dfcad41e788743b = $attributes; } ?>
<?php $component = App\View\Components\Alert::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\Alert::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $attributes = $__attributesOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__attributesOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalb5e767ad160784309dfcad41e788743b)): ?>
<?php $component = $__componentOriginalb5e767ad160784309dfcad41e788743b; ?>
<?php unset($__componentOriginalb5e767ad160784309dfcad41e788743b); ?>
<?php endif; ?>

                <div class="p-2 p-lg-3" style="border-radius:10px; border:2px solid #EA1555;">
                    <p class="text-center mt-3"
                        style="font-family:Manrope; font-size:18px; font-weight:700; line-height:40px;">
                        Select your payment option
                    </p>

                    
                    <?php if($offlineEnabled && $form_type == 'clinic_form'): ?>
                        <div class="bpm-card <?php echo e($pm === 'drop_at' ? 'selected' : ''); ?>">
                            <div class="bpm-header" wire:click="changePm('drop_at')">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="bpm-dot"></span>
                                    <span style="font-size:1.05rem; font-weight:500;"><?php echo e($paywithcardtext); ?></span>
                                </div>
                                <span class="bpm-price">£<?php echo e(number_format($price ?? 0, 2)); ?></span>
                            </div>
                            <?php if($pm === 'drop_at'): ?>
                                <div class="bpm-body">
                                    <p class="fw-bold text-center mb-2">Pay at store when you visit our location below</p>
                                    <p class="mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-geo-alt-fill me-1" viewBox="0 0 16 16"><path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6"/></svg>
                                        <?php echo e($name ?? ''); ?>, <?php echo e($address_line_1 ?? ''); ?>, <?php echo e($address_line_2 ?? ''); ?><?php echo e(($address_line_2 ?? '') != '' ? ', ' : ''); ?><?php echo e($town_city ?? ''); ?>, <?php echo e($post_code ?? ''); ?>

                                    </p>
                                    <p class="mb-1">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-envelope me-1" viewBox="0 0 16 16"><path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2zm2-1a1 1 0 0 0-1 1v.217l7 4.2 7-4.2V4a1 1 0 0 0-1-1zm13 2.383-4.708 2.825L15 11.105zm-.034 6.876-5.64-3.471L8 9.583l-1.326-.795-5.64 3.47A1 1 0 0 0 2 13h12a1 1 0 0 0 .966-.741M1 11.105l4.708-2.897L1 5.383z"/></svg>
                                        <?php echo e($email ?? ''); ?>

                                    </p>
                                    <div class="d-flex justify-content-between align-items-center mt-2">
                                        <p class="mb-0">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-telephone me-1" viewBox="0 0 16 16"><path d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z"/></svg>
                                            <?php echo e($landline_number ?? ''); ?>

                                        </p>
                                        <button class="btn bpm-submit-btn" type="button" wire:click="BuyDevice">Submit</button>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    
                    <?php if($stripeEnabled): ?>
                        <div class="bpm-card <?php echo e($pm === 'stripe' ? 'selected' : ''); ?>">
                            <div class="bpm-header" wire:click="changePm('stripe')">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="bpm-dot"></span>
                                    <div>
                                        <div style="font-weight:500; font-size:1rem;">Pay With Card</div>
                                        <img src="https://ik.imagekit.io/4csyk445b/2560px-Stripe_Logo__revised_2016%205.png?updatedAt=1711551636602"
                                            alt="Stripe" style="height:22px; margin-top:2px;">
                                    </div>
                                </div>
                                <span class="bpm-price">£<?php echo e(number_format($price ?? 0, 2)); ?></span>
                            </div>

                            <?php if($pm === 'stripe'): ?>
                                <div class="bpm-body">
                                    <p class="text-center" style="font-size:15px;">
                                        Securely pay with your card using Stripe!
                                    </p>
                                    <div wire:ignore id="buy-stripe-wrapper">
                                        <div id="buy-card-element"
                                            style="border:1px solid #ced4da; padding:12px; border-radius:6px; background:#fff; min-height:44px; margin-bottom:10px;">
                                        </div>
                                        <div id="buy-card-errors" role="alert"
                                            style="color:red; font-size:13px; margin-bottom:8px; min-height:18px;"></div>
                                        <button id="buy-stripe-submit" class="btn btn-success w-100" type="button">
                                            Submit Payment
                                        </button>
                                    </div>
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" checked id="buy-terms-check">
                                        <label class="form-check-label" for="buy-terms-check">
                                            <a href="<?php echo e(route('privacy-and-policy')); ?>">I Agree to Privacy Policy</a>
                                            And <a href="<?php echo e(route('terms-and-conditions')); ?>">Terms &amp; Conditions</a>
                                        </label>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    
                    <?php if($paypalEnabled): ?>
                        <div class="bpm-card <?php echo e($pm === 'paypal' ? 'selected' : ''); ?>">
                            <div class="bpm-header" wire:click="changePm('paypal')">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="bpm-dot"></span>
                                    <img src="https://ik.imagekit.io/4csyk445b/PayPal_horizontally_Logo_2014.png?updatedAt=1709738114776"
                                        alt="PayPal" style="height:30px;">
                                </div>
                                <span class="bpm-price">£<?php echo e(number_format($price ?? 0, 2)); ?></span>
                            </div>
                            <?php if($pm === 'paypal'): ?>
                                <div class="bpm-body d-flex justify-content-center">
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('payment-methods.paypal', ['price' => $price,'color' => 'success','service' => 'Buy'])->html();
} elseif ($_instance->childHasBeenRendered('buy-paypal-'.$pm)) {
    $componentId = $_instance->getRenderedChildComponentId('buy-paypal-'.$pm);
    $componentTag = $_instance->getRenderedChildComponentTagName('buy-paypal-'.$pm);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('buy-paypal-'.$pm);
} else {
    $response = \Livewire\Livewire::mount('payment-methods.paypal', ['price' => $price,'color' => 'success','service' => 'Buy']);
    $html = $response->html();
    $_instance->logRenderedChild('buy-paypal-'.$pm, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    
                    <?php if($klarnaEnabled): ?>
                        <div class="bpm-card <?php echo e($pm === 'klarna' ? 'selected' : ''); ?>">
                            <div class="bpm-header" wire:click="changePm('klarna')">
                                <div class="d-flex align-items-center gap-3">
                                    <span class="bpm-dot"></span>
                                    <div class="d-flex align-items-center gap-2">
                                        <img src="https://ik.imagekit.io/4csyk445b/download__13_-removebg-preview%207%20(1).png?updatedAt=1711553724733"
                                            alt="Klarna" style="height:26px;">
                                        <div>
                                            <small style="font-size:11px; display:block; white-space:nowrap;">
                                                make 3 payments of £<?php echo e(number_format(($price ?? 0) / 3, 2)); ?> <b>Klarna</b>
                                            </small>
                                            <small style="font-size:10px;">Terms and conditions apply</small>
                                        </div>
                                    </div>
                                </div>
                                <span class="bpm-price">£<?php echo e(number_format($price ?? 0, 2)); ?></span>
                            </div>
                            <?php if($pm === 'klarna'): ?>
                                <div class="bpm-body d-flex justify-content-center">
                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('payment-methods.klarna', ['price' => $price,'color' => 'success','service' => 'Buy'])->html();
} elseif ($_instance->childHasBeenRendered('buy-klarna-'.$pm)) {
    $componentId = $_instance->getRenderedChildComponentId('buy-klarna-'.$pm);
    $componentTag = $_instance->getRenderedChildComponentTagName('buy-klarna-'.$pm);
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('buy-klarna-'.$pm);
} else {
    $response = \Livewire\Livewire::mount('payment-methods.klarna', ['price' => $price,'color' => 'success','service' => 'Buy']);
    $html = $response->html();
    $_instance->logRenderedChild('buy-klarna-'.$pm, $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>

    
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        var _buyStripePublicKey = '<?php echo e($stripePublicKey); ?>';
    </script>
    
    <script>
        (function () {
            var _stripePublicKey = window._buyStripePublicKey || '';
            var _stripeObj  = null;
            var _cardObj    = null;

            function initBuyStripe() {
                var wrapper = document.getElementById('buy-stripe-wrapper');
                if (!wrapper) return;

                if (!_stripePublicKey) {
                    console.error('[BuyStripe] Public key missing!');
                    return;
                }

                if (_cardObj) {
                    try { _cardObj.destroy(); } catch(e) {}
                    _cardObj = null;
                }

                _stripeObj = Stripe(_stripePublicKey);
                var elements = _stripeObj.elements();
                _cardObj = elements.create('card', {
                    hidePostalCode: true,
                    style: { base: { fontSize: '16px' } }
                });

                var cardEl = document.getElementById('buy-card-element');
                if (cardEl) {
                    _cardObj.mount('#buy-card-element');
                } else {
                    console.error('[BuyStripe] #buy-card-element not found');
                }

                var submitBtn = document.getElementById('buy-stripe-submit');
                if (submitBtn) {
                    submitBtn.onclick = function () {
                        submitBtn.disabled = true;
                        submitBtn.textContent = 'Processing...';

                        _stripeObj.createToken(_cardObj).then(function (result) {
                            if (result.error) {
                                var errEl = document.getElementById('buy-card-errors');
                                if (errEl) errEl.textContent = result.error.message;
                                submitBtn.disabled = false;
                                submitBtn.textContent = 'Submit Payment';
                            } else {
                                window.livewire.emit('tokenCreated', result.token.id);
                            }
                        });
                    };
                }
            }

            document.addEventListener('livewire:load', function () {
                Livewire.hook('message.processed', function (message, component) {
                    setTimeout(initBuyStripe, 100);
                });
                setTimeout(initBuyStripe, 300);
            });
        })();
    </script>
    

</div><?php /**PATH C:\Users\AL-RASHEEED\Downloads\idea (9)\resources\views/livewire/guest/buy/book-repair.blade.php ENDPATH**/ ?>