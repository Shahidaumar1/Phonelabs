<?php
    $siteSetting = \App\Models\SiteSetting::first();
?>

<?php
    use App\Models\PaymentMethodSetting;

    $form_name       = 'Call Out Repair';
    $paywithcardtext = 'Pay in Store';

    $paypalRow = PaymentMethodSetting::where('payment_method_', 'Paypal')->first();
    $stripeRow = PaymentMethodSetting::where('payment_method_', 'Stripe')->first();
    $klarnaRow = PaymentMethodSetting::where('payment_method_', 'Klarna')->first();

    $paypalSettings = $paypalRow ? json_decode($paypalRow->settings, true) : null;
    $stripeSettings = $stripeRow ? json_decode($stripeRow->settings, true) : null;
    $klarnaSettings = $klarnaRow ? json_decode($klarnaRow->settings, true) : null;

    $paypalEnabled  = (bool) ($paypalSettings['enabled'] ?? false);
    $stripeEnabled  = (bool) ($stripeSettings['enabled'] ?? false);
    $klarnaEnabled  = (bool) ($klarnaSettings['enabled'] ?? false);
    $offlineEnabled = (bool) ($stripeSettings['enable_offline_pay'] ?? true);

    if (session('form_type') == 'postal_form') {
        $form_name       = 'Post Your Device';
        $paywithcardtext = 'Pay At our Store';
    } elseif (session('form_type') == 'collection_form') {
        $form_name       = 'We Collect Your Device';
        $paywithcardtext = "I'll Pay after Repair";
    } elseif (session('form_type') == 'clinic_form') {
        $form_name       = 'Store Repair';
        $paywithcardtext = "I'll Pay after Repair";
    } elseif (session('form_type') == 'fix_form') {
        $form_name       = 'Call Out Repair';
        $paywithcardtext = "I'll Pay after Repair";
    }

    $basePrice     = (float) ($price ?? 0);
    $serviceCharge = 0.0;

    if (isset($formType) && $formType === 'postal_form') {
        $serviceCharge = (float) ($condition1Price ?? 0);
    } elseif (isset($formType) && $formType === 'collection_form') {
        $serviceCharge = (float) ($condition2Price ?? 0);
    } elseif (isset($formType) && $formType === 'fix_form') {
        $serviceCharge = (float) ($condition3Price ?? 0);
    }

    if (!empty($price)) {
        $basePrice = (float) $price - (float) $serviceCharge;
    }
?>

<?php if(session('success')): ?>
    <div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="successModalLabel">Congratulations! Your repair has been booked.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p><?php echo e(session('success')); ?></p>
                    <div class="alert alert-success" role="alert">
                        <p>Check your email for more instructions.</p>
                        <hr>
                        <p class="mb-0">Thank you for choosing us. Questions? Reach out anytime.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <script>
        window.onload = function () {
            var successModal = new bootstrap.Modal(document.getElementById('successModal'));
            successModal.show();
        };
    </script>
<?php endif; ?>

<div>
    <?php $storedInputValue = Session::get('storedInputValue'); ?>
    <?php if($storedInputValue): ?>
        <p>Delivery Charges For Postal Repair: &pound;<?php echo e($storedInputValue); ?></p>
    <?php endif; ?>

    <?php $storedCollectionRepairPrice = Session::get('collectionRepairPrice'); ?>
    <?php if($storedCollectionRepairPrice): ?>
        <p style="font-size:1vw">Delivery Charges For Collection Repair: &pound;<?php echo e($storedCollectionRepairPrice); ?></p>
    <?php endif; ?>

    <style>
        .repair-payment-sec { margin-top: 30px; padding: 0 15px; }
        .cust-container { max-width: 1140px; margin: 0 auto; }
        .payment-box-heading, .summry-heading {
            font-size: 32px; line-height: 60px; font-weight: 700;
            color: #00AEEF; font-family: "Manrope", sans-serif;
            font-style: normal; margin: 0 !important;
            padding-bottom: 0px; letter-spacing: -0.33px;
        }
        @media (max-width: 768px) {
            .payment-box-heading, .summry-heading { font-size: 25px; line-height: 32px; padding-bottom: 40px; }
        }
        @media (max-width: 480px) { .repair-payment-sec { margin-top: 0; } }
    </style>

    <div class="repair-payment-sec">
        <div class="cust-container mb-5 pb-md-4 pb-lg-5 rounded">
            <div class="z">
                <div class="col-md-12">

                    <?php if (isset($component)) { $__componentOriginal5194778a3a7b899dcee5619d0610f5cf = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.alert','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('alert'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $attributes = $__attributesOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__attributesOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf)): ?>
<?php $component = $__componentOriginal5194778a3a7b899dcee5619d0610f5cf; ?>
<?php unset($__componentOriginal5194778a3a7b899dcee5619d0610f5cf); ?>
<?php endif; ?>

                    <?php if($pm == 'pay_at_store'): ?>
                        <div class="d-flex justify-content-between align-items-center">
                            <?php if($success): ?>
                                <div class="alert alert-success" role="alert">
                                    <h4 class="alert-heading">Congratulations! Your repair has been booked.</h4>
                                    <p>Check your email for more instructions.</p>
                                    <hr>
                                    <p class="mb-0">Thank you for choosing us. Questions? Reach out anytime.</p>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="row align-items-stretch" style="row-gap: 30px;">

                        
                        <div class="col-lg-5 d-flex">
                            <div class="w-100" style="box-shadow: 0 2px 5px rgba(0,0,0,0.1); border:1px solid #ddd; border-radius:8px;">
                                <table id="repair-summary" class="table table-striped border repair-summary">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-center">
                                                <h2 class="summry-heading">Repair Summary</h2>
                                            </th>
                                        </tr>
                                        <tr>
                                            <td>Model</td>
                                            <td class="text-end"><?php echo e($data['modal']['name']); ?></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Type</td>
                                            <td class="text-end"><?php echo e($form_name); ?></td>
                                        </tr>

                                        <?php if($form_name === 'Store Repair'): ?>
                                            <tr>
                                                <td><?php echo e($data['repair_type']['name']); ?></td>
                                                <td class="text-end">&pound; <?php echo e(number_format($basePrice ?? $price, 2)); ?></td>
                                            </tr>

                                            <?php if(data_get($addons, 'protector_selected') || data_get($addons, 'cover_selected')): ?>
                                                <?php if(data_get($addons, 'protector_selected')): ?>
                                                    <tr>
                                                        <td>Protector</td>
                                                        <td class="text-end">&pound; <?php echo e(number_format((float) data_get($addons, 'protector_price', 0), 2)); ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                <?php if(data_get($addons, 'cover_selected')): ?>
                                                    <tr>
                                                        <td>Cover</td>
                                                        <td class="text-end">&pound; <?php echo e(number_format((float) data_get($addons, 'cover_price', 0), 2)); ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                            <?php endif; ?>

                                            <tr>
                                                <td>Total Price</td>
                                                <td class="text-end">&pound; <?php echo e(number_format($price, 2)); ?></td>
                                            </tr>
                                        <?php endif; ?>

                                        <tr>
                                            <td>Repair Time</td>
                                            <td class="text-end"><?php echo e($siteSetting->repair_time ?? '30 mins'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Warranty</td>
                                            <td class="text-end"><?php echo e($siteSetting->warranty ?? '6 Months'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                       
<div class="col-lg-6 col-12 d-flex">
    <div class="w-100 p-2 p-lg-3 payment-box"
        style="border-radius:10px; border:2px solid #00AEEF;">

        <h2 class="payment-box-heading pb-2 text-center">
            How would you like to Pay?
        </h2>

        <p class="text-center mt-3 fw-bold">
            Select your payment option
        </p>

        
        <?php if($offlineEnabled): ?>
            <section class="accordion">
                <div class="tab">

                    
                    <input
                        type="radio"
                        checked
                        name="accordion-1"
                        id="cb4"
                        wire:model="pm"
                        value="pay_at_store"
                        style="display:none;"
                    >

                    
                    <label
                        for="cb4"
                        class="tab__label"
                        style="
                            border:1px solid #00AEEF;
                            width:100%;
                            height:80px;
                            border-radius:10px;
                            display:flex;
                            align-items:center;
                            justify-content:space-between;
                            padding:0 25px;
                            cursor:pointer;
                        "
                    >
                        <div style="font-weight:600;">
                            <?php echo e($paywithcardtext); ?>

                        </div>

                        <h4 class="text-danger fw-bold">
                            &pound;<?php echo e(number_format($price ?? 0, 2)); ?>

                        </h4>
                    </label>

                    
                    <div class="tab__content text-center mt-3">

                        <p class="fw-bold">
                            Pay at store when you visit our location below
                        </p>

                        <p>
                            <?php echo e($name); ?>,
                            <?php echo e($address_line_1); ?>,
                            <?php echo e($town_city); ?>,
                            <?php echo e($post_code); ?>

                        </p>

                        <p><?php echo e($email); ?></p>

                        <p><?php echo e($landline_number); ?></p>

                        <button class="btn submit-btn mt-3"
    data-bs-toggle="modal"
    onclick="callBookRepair()"
    style="
        border:1px solid #00AEEF;
        width:120px;
        height:45px;
        background:#00AEEF;
        color:#fff;
    ">
    Submit
</button>
                     

                    </div>
                </div>
            </section>
        <?php endif; ?>

    </div>
</div>
                                
                                <?php if($stripeEnabled): ?>
                                    <section class="accordion mt-2">
                                        <div class="tab">
                                            <input class="form-check-input" type="radio"
                                                wire:click="changePm('stripe')" name="accordion-1" id="cb3">
                                            <label for="cb3" class="tab__label responsive"
                                                style="border:1px solid #00AEEF; width:100%; height:80px; border-radius:10px;">
                                                <div class="flex space-between mysetting col-12"
                                                    style="display:flex; align-items:center; justify-content:space-between;">
                                                    <div class="text-start">
                                                        <div style="font-weight:800;">Pay With Card</div>
                                                        <img class="img-fluid" style="width:30%;"
                                                            src="https://ik.imagekit.io/4csyk445b/2560px-Stripe_Logo__revised_2016%205.png?updatedAt=1711551636602"
                                                            alt="Stripe">
                                                    </div>
                                                    <div class="text-end">
                                                        <h4 class="text-danger fw-bold" style="margin-right:50px !important;">
                                                            &pound;<?php echo e(number_format($price ?? 0, 2)); ?>

                                                        </h4>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="tab__content col-12 d-flex justify-content-center align-items-center">
                                                <?php if($pm == 'stripe'): ?>
                                                    <div class="mt-2">
                                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('payment-methods.stripe', ['price' => $price,'color' => 'success','service' => 'Repair'])->html();
} elseif ($_instance->childHasBeenRendered('l2518182692-0')) {
    $componentId = $_instance->getRenderedChildComponentId('l2518182692-0');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2518182692-0');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2518182692-0');
} else {
    $response = \Livewire\Livewire::mount('payment-methods.stripe', ['price' => $price,'color' => 'success','service' => 'Repair']);
    $html = $response->html();
    $_instance->logRenderedChild('l2518182692-0', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>
                                <?php endif; ?>

                                
                                <?php if($paypalEnabled): ?>
                                    <section class="accordion mt-2">
                                        <div class="tab">
                                            <input class="form-check-input" type="radio"
                                                wire:click="changePm('paypal')" name="accordion-1" id="cb1" style="display:none;">
                                            <label for="cb1" class="tab__label responsive"
                                                style="border:1px solid #00AEEF; width:100%; height:80px; border-radius:10px;">
                                                <div class="flex space-between mysetting col-12"
                                                    style="display:flex; align-items:center; justify-content:space-between;">
                                                    <div class="text-start">
                                                        <img class="img-fluid"
                                                            src="https://upload.wikimedia.org/wikipedia/commons/a/a4/Paypal_2014_logo.png"
                                                            alt="PayPal" style="width:50px; height:auto;">
                                                    </div>
                                                    <div class="text-end">
                                                        <h4 class="text-danger fw-bold" style="margin-right:50px !important;">
                                                            &pound;<?php echo e(number_format($price ?? 0, 2)); ?>

                                                        </h4>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="tab__content col-12 d-flex justify-content-center align-items-center">
                                                <?php if($pm == 'paypal'): ?>
                                                    <div>
                                                        <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('payment-methods.paypal', ['price' => $price,'color' => 'success','service' => 'Repair'])->html();
} elseif ($_instance->childHasBeenRendered('l2518182692-1')) {
    $componentId = $_instance->getRenderedChildComponentId('l2518182692-1');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2518182692-1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2518182692-1');
} else {
    $response = \Livewire\Livewire::mount('payment-methods.paypal', ['price' => $price,'color' => 'success','service' => 'Repair']);
    $html = $response->html();
    $_instance->logRenderedChild('l2518182692-1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                    </div>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>
                                <?php endif; ?>

                                
                                <?php if($klarnaEnabled): ?>
                                    <section class="accordion mt-2">
                                        <div class="tab">
                                            <input class="form-check-input" type="radio"
                                                wire:click="changePm('klarna')" name="accordion-1" id="cb2">
                                            <label for="cb2" class="tab__label responsive"
                                                style="border:1px solid #00AEEF; width:100%; height:80px; border-radius:10px;">
                                                <div class="flex space-between mysetting col-12"
                                                    style="display:flex; align-items:center; justify-content:space-between;">
                                                    <div>
                                                        <h4>&nbsp;&nbsp;
                                                            <img class="img-fluid myklarna"
                                                                src="https://upload.wikimedia.org/wikipedia/commons/thumb/4/40/Klarna_Payment_Badge.svg/2560px-Klarna_Payment_Badge.svg.png"
                                                                alt="Klarna" style="width:50px; height:auto; object-fit:cover;">
                                                        </h4>
                                                    </div>
                                                    <div class="text-center">
                                                        <p class="klarna-resp meri-marzi">
                                                            Make 3 payments of <b class="fw-bolder">Klarna</b>
                                                            &pound;<?php echo e(number_format(($price ?? 0) / 3, 2)); ?> in installments.
                                                            Terms and conditions apply.
                                                        </p>
                                                    </div>
                                                    <div class="text-end">
                                                        <h4 class="text-danger fw-bold" style="margin-right:50px !important;">
                                                            &pound;<?php echo e(number_format($price ?? 0, 2)); ?>

                                                        </h4>
                                                    </div>
                                                </div>
                                            </label>
                                            <div class="tab__content col-12 d-flex justify-content-center align-items-center">
                                                <?php if($pm == 'klarna'): ?>
                                                    <?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('payment-methods.klarna', ['price' => $price,'color' => 'success','service' => 'Repair'])->html();
} elseif ($_instance->childHasBeenRendered('l2518182692-2')) {
    $componentId = $_instance->getRenderedChildComponentId('l2518182692-2');
    $componentTag = $_instance->getRenderedChildComponentTagName('l2518182692-2');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('l2518182692-2');
} else {
    $response = \Livewire\Livewire::mount('payment-methods.klarna', ['price' => $price,'color' => 'success','service' => 'Repair']);
    $html = $response->html();
    $_instance->logRenderedChild('l2518182692-2', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </section>
                                <?php endif; ?>

                            </div>
                        </div>

                    </div>

                    <div class="gap-2">
                        <?php if($form_type == 'clinic_form'): ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
        </div>
    </div>

    
    <div class="modal fade" id="bookConfirmModal" tabindex="-1" aria-labelledby="bookConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookConfirmModalLabel">Congratulations! Your repair has been booked.</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-success mb-0" role="alert">
                        <p class="mb-2">Check your email for more instructions.</p>
                        <hr>
                        <p class="mb-0">Thank you for choosing us. Questions? Reach out anytime.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-secondary">Cancel</a>

                    
                    <button type="button"
                        class="btn btn-primary"
                        onclick="callBookRepair()"
                        data-bs-dismiss="modal">
                        Confirm
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Store this component's Livewire ID so we can target it directly
        // window.livewire.find('<?php echo e($_instance->id); ?>').id gives the current component's wire:id — always correct
        window.bookRepairComponentId = '<?php echo e($this->id); ?>';

        function callBookRepair() {
            // Find this exact component instance and call BookRepair on it
            var component = window.livewire.find(window.bookRepairComponentId);
            if (component) {
                component.call('BookRepair');
            } else {
                console.error('BookRepair component not found. ID:', window.bookRepairComponentId);
            }
        }
    </script>

</div><?php /**PATH /home/phonelabs/public_html/resources/views/livewire/guest/components/book-repair.blade.php ENDPATH**/ ?>